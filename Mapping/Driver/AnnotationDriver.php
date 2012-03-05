<?php

namespace Ddeboer\Salesforce\MapperBundle\Mapping\Driver;

use Ddeboer\Salesforce\MapperBundle\Mapping\ClassMetadata;
use Doctrine\Common\Annotations\AnnotationReader;

class AnnotationDriver
{
    static private $documentAnnotationClass = 
        'Ddeboer\\Salesforce\\MapperBundle\\Annotation\\Object';

    public function __construct()
    {
        $this->reader = new AnnotationReader();
    }

    public function loadMetadataForClass($className, ClassMetadata $class)
    {
        $reflClass = $class->getReflectionClass();
        $objectAnnotation = $this->reader->getClassAnnotation(
            $reflClass, self::$documentAnnotationClass);

        $class->setObject($objectAnnotation->name);

        foreach ($reflClass->getProperties()  as $reflProperty) {
            $propertyAnnotations = $this->reader->getPropertyAnnotations(
                $reflProperty, 'Ddeboer\Salesforce\MapperBundle\Annotation'
            );
        }
//
//
//            foreach ($propertyAnnotations as $key => $propertyAnnotation) {
//                if ($propertyAnnotation instanceof Relation) {
//                    $salesforceProperties['relations'][$reflProperty->getName()] =
//                            $propertyAnnotation;
//
//                } elseif ($propertyAnnotation instanceof Field) {
//                    $salesforceProperties['fields'][$reflProperty->getName()] =
//                            $propertyAnnotation;
//                }
//            }
//        }
//
//        if ($reflClass->getParentClass()) {
//            $properties = $this->getSalesforcePropertiesFromReflectionClass(
//                $reflClass->getParentClass()
//            );
//
//            $salesforceProperties['object'] = ($salesforceProperties['object'])
//                                              ? $salesforceProperties['object']
//                                              : $properties['object'];
//
//            $salesforceProperties['fields'] = array_merge(
//                $properties['fields'],
//                $salesforceProperties['fields']
//            );
//
//            $salesforceProperties['relations'] = array_merge(
//                $properties['relations'],
//                $salesforceProperties['relations']
//
////        $class->setObject



    }

    /**
     * Gets the names of all mapped classes known to this driver.
     *
     * @return array The names of all mapped classes known to this driver.
     */
    public function getAllClassNames()
    {

    }

    /**
     * Whether the class with the specified name should have its metadata loaded.
     * This is only the case if it is either mapped as an Entity or a
     * MappedSuperclass.
     *
     * @param string $className
     * @return boolean
     */
    public function isTransient($className)
    {

    }

     /**
     * Get Salesforce fields from model
     *
     * @param string $model Model class name
     * @return Field[]      Array of field annotations
     */
    public function getSalesforceFields($modelClass)
    {
        $properties = $this->getSalesforceProperties($modelClass);
        return new ArrayCollection($properties['fields']);
    }

    /**
     * Get Salesforce field
     *
     * @param mixed $model  Domain model object
     * @param string $field Field name
     * @return Field
     */
    public function getSalesforceField($model, $field)
    {
        $properties = $this->getSalesforceProperties($model);
        if (isset($properties['fields'][$field])) {
            return $properties['fields'][$field];
        }
    }

    public function getSalesforceRelations($model)
    {
        $properties = $this->getSalesforceProperties($model);
        return $properties['relations'];
    }

    /**
     * Get Salesforce object annotation
     *
     * @param string $model
     * @return Object
     */
    public function getSalesforceObject($model)
    {
        $properties = $this->getSalesforceProperties($model);
        return $properties['object'];
    }

    /**
     * Get Salesforce properties
     *
     * @param string $modelClass    Model class name
     * @return array                With keys 'object', 'relations' and 'fields'
     */
    public function getSalesforceProperties($modelClass)
    {
        $reflClass = new \ReflectionClass($modelClass);
        return $this->getSalesforcePropertiesFromReflectionClass($reflClass);
    }

    protected function getSalesforcePropertiesFromReflectionClass(\ReflectionClass $reflClass)
    {
        $salesforceProperties = array(
            'object'    => null,
            'relations' => array(),
            'fields'    => array()
        );
    }
}
