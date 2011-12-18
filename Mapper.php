<?php

namespace Ddeboer\Salesforce\MapperBundle;

use Ddeboer\Salesforce\ClientBundle\Client;
use Ddeboer\Salesforce\MapperBundle\Annotation\AnnotationReader;
use Ddeboer\Salesforce\MapperBundle\Annotation;
use Ddeboer\Salesforce\MapperBundle\Response\MappedRecordIterator;
use Ddeboer\Salesforce\ClientBundle\Response;
use Doctrine\Common\Cache\Cache;

/**
 * This mapper makes interaction with the Salesforce API using full objects
 * much easier
 *
 * Working with the mapper requires you to annotate your objects. A set of
 * standard objects is included in the Model directory. If you need access
 * to custom properties on these objects, it is recommended to
 * extend the standard objects, add the properties and annotate them
 * (using @Salesforce\Field annotations). If you want this mapper to accept
 * completely custom objects, you can extend from Model/AbstractModel, and add
 * a @Salesforce\Object annotation.
 *
 * @author David de Boer <david@ddeboer.nl>
 */
class Mapper
{
    /**
     * Salesforce client
     * 
     * @var Client
     */
    private $client;

    /**
     * Salesforce annotations reader
     *
     * @var AnnotationReader
     */
    private $annotationReader;

    /**
     * Cache
     * 
     * @var Cache
     */
    private $cache;

    /**
     * Construct mapper
     *
     * @param SoapClient $soapClient
     * @param AnnotationReader $annotationReader
     * @param Cache $cache
     */
    public function __construct(Client $client, AnnotationReader $annotationReader, Cache $cache)
    {
        $this->client = $client;
        $this->annotationReader = $annotationReader;
        $this->cache = $cache;
    }

    /**
     * Get object count
     *
     * @param string $modelClass     Model class name
     * @param boolean $includeDeleted
     * @param array $criteria
     * @return int
     */
    public function count($modelClass, $includeDeleted = false, array $criteria = array())
    {
        $object = $this->annotationReader->getSalesforceObject($modelClass);
        if (null === $object) {
            throw new \UnexpectedValueException('Model has no Salesforce annotation');
        }

        $query = trim("select count() from {$object->name} "
                 . $this->getQueryWherePart($criteria, $modelClass));

        if (true === $includeDeleted) {
            $result = $this->client->queryAll($query);
        } else {
            $result = $this->client->query($query);
        }

        if ($result) {
            return $result->count();
        }
    }

    /**
     * Delete one or more records from Salesforce
     *
     * @param array $models
     * @return array
     */
    public function delete(array $models)
    {
        $ids = array();
        foreach ($models as $model) {
            $ids[] = $model->getId();
        }

        return $this->client->delete($ids);
    }

    /**
     * Find one object by id
     *
     * @param mixed $model  Model object or class name
     * @param string $id    Object id
     * @param int $related  Number of levels of related records to include
     * @return object       Mapped domain object
     */
    public function find($model, $id, $related = 1)
    {
        $criteria = array('Id' => $id);
        $query = $this->getQuerySelectPart($model, $related)
               . $this->getQueryWherePart($criteria, $model);

        $result = $this->client->query($query);
        $mappedRecordIterator = new MappedRecordIterator($result, $this, $model);
        
        return $mappedRecordIterator->first();
    }

    /**
     * Find multiple objects by criteria and return result as an iterator
     *
     * @param mixed $model    Model object or class name
     * @param array $criteria Criteria as key/value pairs
     * @param array $order    Order to sort by as key/value pairs
     * @param int $related    Number of levels of related records to include
     * @param bool $deleted   Whether to include deleted records
     * @return MappedRecordIterator
     */
    public function findBy($model, array $criteria, array $order = array(),
        $related = 1, $deleted = false)
    {
        $query = $this->getQuerySelectPart($model, $related)
               . $this->getQueryWherePart($criteria, $model)
               . $this->getQueryOrderByPart($order);

        if (true === $deleted) {
            $result = $this->client->queryAll($query);
        } else {
            $result = $this->client->query($query);
        }
        
        return new MappedRecordIterator($result, $this, $model);
    }

    /**
     * Fetch all objects of a certain type
     *
     * @param object $model     Model object or class name
     * @param array $order      Order to sort by as key/value pairs
     * @param boolean $related  Number of levels of related records to include
     * @param boolean $deleted  Whether to include deleted records
     * @return MappedRecordIterator
     */
    public function findAll($model, array $order = array(), $related = 1,
        $deleted = false)
    {
        return $this->findBy($model, array(), $order, $related, $deleted);
    }

    /**
     * Get object description, if possible from cache
     *
     * @param object $model     Model object or class name
     * @return DescribeSObjectResult
     * @throws \InvalidArgumentException
     */
    public function getObjectDescription($model)
    {
        $object = $this->annotationReader->getSalesforceObject($model);
        return $this->doGetObjectDescription($object->name);
    }

    /**
     * Save one or more domain models to Salesforce
     *
     * @param mixed $model  One model or array of models
     * @return Response\SaveResult[]
     */
    public function save($model)
    {
        $models = is_array($model) ? $model : array($model);
        $objectsToBeCreated = array();
        $objectsToBeUpdated = array();

        foreach ($models as $model) {
            $object = $this->annotationReader->getSalesforceObject($model);
            $sObject = $this->mapToSalesforceObject($model);
            if (isset($sObject->Id) && null !== $sObject->Id) {
                $objectsToBeUpdated[$object->name][] = $sObject;
            } else {
                $objectsToBeCreated[$object->name][] = $sObject;
            }
        }

        $results = array();
        foreach ($objectsToBeCreated as $objectName => $sObjects) {
            $results[] = $this->client->create($sObjects, $objectName);
        }

        foreach ($objectsToBeUpdated as $objectName => $sObjects) {
            $results[] = $this->client->update($sObjects, $objectName);
        }

        return $results;
    }

    /**
     * Map a Salesforce object to a domain model object
     *
     * Uses reflection instead of setters because read-only properties on
     * ojects should not need a setter.
     *
     * @param object $sObject
     * @param string $modelClass Model class name
     * @return object A mapped instantiation of the model class
     */
    public function mapToDomainObject($sObject, $modelClass)
    {
        $model = new $modelClass();
        $reflObject = new \ReflectionObject($model);

        // Set Salesforce property values on domain object
        $fields = $this->annotationReader->getSalesforceFields($modelClass);
        foreach ($fields as $name => $field) {
            if (isset($sObject->{$field->name})) {
                // Use reflection to set the protected/private properties
                $reflProperty = $reflObject->getProperty($name);
                $reflProperty->setAccessible(true);
                $reflProperty->setValue($model, $sObject->{$field->name});
            }
        }

        // Set Salesforce relations on domain object
        $relations = $this->annotationReader->getSalesforceRelations($modelClass);
        foreach ($relations as $property => $relation) {
            if (isset($sObject->{$relation->field})) {
                $relatedObject = $this->mapToDomainObject(
                    $sObject->{$relation->field}, $relation->class
                );

                $reflProperty = $reflObject->getProperty($property);
                $reflProperty->setAccessible(true);
                $reflProperty->setValue($model, $sObject->{$relation->field});
            }
        }

        return $model;
    }

    /**
     * Map a PHP model object to a Salesforce object
     *
     * The PHP object must be properly annoated
     *
     * @param mixed $model  PHP model object
     * @return \stdClass
     */
    public function mapToSalesforceObject($model)
    {
        $sObject = new \stdClass;
        $sObject->fieldsToNull = array();

        $objectDescription = $this->getObjectDescription($model);
        $propertyMappings = $this->annotationReader->getSalesforceFields($model);
        $reflClass = new \ReflectionClass($model);

        foreach ($propertyMappings as $property => $mapping) {
            $fieldDescription = $objectDescription->getField($mapping->name);
            if (!$fieldDescription) {
                throw new \InvalidArgumentException(spritnf(
                    'Field %s does not exist on %s',
                    $mapping->name,
                    $objectDescription->getName()
                ));
            }

            // Only add ID fields and updateable fields to the SObject
            if ($fieldDescription->isUpdateable() || $fieldDescription->isIdLookup()) {
                // Get value through reflection
                $reflProperty = $reflClass->getProperty($property);
                $reflProperty->setAccessible(true);
                $value = $reflProperty->getValue($model);

                if (null === $value || (is_string($value) && $value === '')) {
                    // Do not set fieldsToNull on create
                    if ($model->getId()) {
                        $sObject->fieldsToNull[] = $mapping->name;
                    }
                } else {
                    $sObject->{$mapping->name} = $value;
                }
            }
        }

        return $sObject;
    }

    /**
     * Get object description for Salesforce object
     *
     * @param string $objectName        Name of the Salesforce object
     * @return DescribeSObjectResult
     * @throws \InvalidArgumentException
     */
    private function doGetObjectDescription($objectName)
    {
        $cacheId = sprintf('ddeboer_salesforce_mapper.object_description.%s',
            $objectName);
        if ($this->cache->contains($cacheId)) {
            return $this->cache->fetch($cacheId);
        }

        $descriptions = $this->client->describeSObjects(array($objectName));
        if (count($descriptions) === 0) {
            throw new \InvalidArgumentException('Salesforce object does not exist');
        }

        $description = /* @var $description DescribeSObjectResult */ $descriptions[0];
        $this->cache->save($cacheId, $description);
        return $description;
    }


    /**
     * Get query basis
     *
     * @param string $modelClass Model class name
     * @param int $related       Number of levels of related records to include
     *                           in query
     *                           0: do not include related records
     *                           1: include one level of related records, for
     *                              instance owner on opportunity
     *                           2: include two levels, for instance owner and
     *                              account owner on opportunity.
     * @return string
     */
    private function getQuerySelectPart($modelClass, $related)
    {
        $object = $this->annotationReader->getSalesforceObject($modelClass);
        $fields = $this->getFields($modelClass, $related);

        return 'select ' . implode(',', $fields) . " from $object->name ";
    }

    /**
     * Get SOQL where query part based on criteria array
     *
     * @param array $criteria
     * @return string
     */
    private function getQueryWherePart(array $criteria, $model)
    {
        $whereParts = array();
        $object = $this->annotationReader->getSalesforceObject($model);
        $fields = $this->annotationReader->getSalesforceFields($model);
        $objectDescription = $this->doGetObjectDescription($object->name);

        foreach ($criteria as $key => $value) {

            // Check if the criterion has an operator
            $keyParts = explode(' ', $key);

            // Criterion key has an operator part
            if (isset($keyParts[1])) {
                $operator = $keyParts[1];
            } else {
                // Criterion key has no operator, so add it ourselves
                $operator = '=';
            }

            $name = ucfirst($keyParts[0]);
            $field = $fields->filter(function($field) use ($name) {
                return $field->name == $name;
            })->first();

            $whereParts[] = sprintf('%s %s %s',
                $field->name,
                $operator,
                $this->getQuotedWhereValue($field, $value, $objectDescription)
            );
        }

        if (!empty($whereParts)) {
            return ' where ' . implode(' and ', $whereParts);
        }
    }

    /**
     * Get quoted where value
     * 
     * @param Annotation\Field $field
     * @param mixed $value
     * @param DescribeSObjectResult $description
     * @return string
     * @throws \InvalidArgumentException
     */
    private function getQuotedWhereValue(Annotation\Field $field, $value, 
        Response\DescribeSObjectResult $description)
    {
        $fieldDescription = $description->getField($field->name);
        if (!$fieldDescription) {
            throw new \InvalidArgumentException(
                sprintf('‘%s’ on object %s is not a valid field',
                    $field->name,
                    $description->getName()
                )
            );
        }

        switch ($fieldDescription->getType()) {
            case 'date':
                if ($value instanceof \DateTime) {
                    return $value->format('Y-m-d');
                }
            case 'datetime':
                if ($value instanceof \DateTime) {
                    $value = $value->setTimeZone(new \DateTimeZone('UTC'));
                    return $value->format('Y-m-d\TH:i:sP');
                }               
            case 'boolean':
                return $value ? 'true' : 'false';
            default:
                return "'" . addslashes($value) . "'";
        }
    }

    /**
     * Get SOQL order by query part from order by array
     *
     * @param array $orderBy
     * @return string
     */
    private function getQueryOrderByPart(array $orderBy)
    {
        $orderParts = array();
        foreach ($orderBy as $field => $direction) {
            $orderParts[] = "$field $direction";
        }

        if (!empty($orderParts)) {
            return ' order by ' . implode(',', $orderParts);
        }
    }

    /**
     * Get Salesforce fields and its relations from a Salesforce-annotated model
     *
     * @param string $modelClass
     * @param int $includeRelatedLevels
     * @return array
     */
    private function getFields($modelClass, $includeRelatedLevels)
    {
        $fields = array();

        foreach ($this->annotationReader->getSalesforceFields($modelClass) as $field) {
            $fields[] = $field->name;
        }

        $description = $this->getObjectDescription($modelClass);

        if ($includeRelatedLevels > 0) {
            foreach($this->annotationReader->getSalesforceRelations($modelClass) as $relation) {
                
                if (!$relation->field) {
                    continue;
                }

                // Check whether we can find this relation
                $relationshipField = $description->getRelationshipField($relation->field);
                if (!$relationshipField) {
                    throw new \InvalidArgumentException(
                        'Field ' . $relation->field . ' does not exist on ' . $description->getName());
                }

                $relatedFields = $this->getFields($relation->class, --$includeRelatedLevels);
                foreach ($relatedFields as $relatedField) {
                    $fields[] = sprintf('%s.%s', $relationshipField->getRelationshipName(), $relatedField);
                }
            }
        }

        return $fields;
    }
}