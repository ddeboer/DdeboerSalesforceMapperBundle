<?php

namespace Ddeboer\Salesforce\MapperBundle\Annotation;

use ReflectionClass;
use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Annotations\Reader;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Reads Salesforce annotations
 * 
 * This class encapsulates the Doctrine annotation reader.
 */
class AnnotationReader
{
    /**
     *
     * @var \Doctrine\Common\Annotations\Reader
     */
    protected $reader;
    
    /**
     * @var \Doctrine\Common\Cache\Cache
     */
    protected $annotationCache;
    
    
    
    /**
     * 
     * @param \Doctrine\Common\Annotations\Reader $reader
     * @param \Doctrine\Common\Cache\Cache $annotationCache
     */
    public function __construct(Reader $reader, Cache $annotationCache = null)
    {
        $this->reader = $reader;
        $this->annotationCache = ($annotationCache ?: new ArrayCache(spl_object_hash($this)));
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
        $modelClass = $this->sanitiseModelClass($modelClass);
        
        if (($properties = $this->getSalesforcePropertiesFromCache($modelClass)) !== null) {
            return $properties;
        }
        
        return $this->getSalesforcePropertiesFromReflectionClass(new ReflectionClass($modelClass));
    }
    
    /**
     * Sanitises a model object or class name, returning an object's class name
     * if an object is given, or the class name string as given otherwise
     * 
     * @param string|object $modelClass
     * @return string
     */
    public function sanitiseModelClass($modelClass)
    {
        return (is_object($modelClass) ? get_class($modelClass) : $modelClass);;
    }
    
    /**
     * 
     * @param string $modelClass
     * @return null
     */
    protected function getSalesforcePropertiesFromCache($modelClass)
    {
        if ($this->annotationCache->contains($modelClass)) {
            return $this->annotationCache->fetch($modelClass);
        }
        
        return null;
    }
    
    /**
     * 
     * @param \ReflectionClass $reflClass
     * @return array
     */
    protected function getSalesforcePropertiesFromReflectionClass(ReflectionClass $reflClass)
    {
        // Critical SF properties
        $salesforceProperties = array(
            'object'    => null,
            'relations' => array(),
            'fields'    => array()
        );
        
        // Object annotations
        $classAnnotation = $this->reader->getClassAnnotation($reflClass, 
            'Ddeboer\Salesforce\MapperBundle\Annotation\Object'
        );
        if (isset($classAnnotation->name)) {
            $salesforceProperties['object'] = $classAnnotation;
        }
        
        $reflProperties = $reflClass->getProperties();
        foreach ($reflProperties as $reflProperty) {         
            $propertyAnnotations = $this->reader->getPropertyAnnotations(
                $reflProperty, 'Ddeboer\Salesforce\MapperBundle\Annotation'
            );
            
            // Field and Relation annotations against class properties/fields
            foreach ($propertyAnnotations as $key => $propertyAnnotation) {
                if ($propertyAnnotation instanceof Relation) {
                    $salesforceProperties['relations'][$reflProperty->getName()] =
                            $propertyAnnotation;
                    
                } elseif ($propertyAnnotation instanceof Field) {
                    $salesforceProperties['fields'][$reflProperty->getName()] = 
                            $propertyAnnotation;
                }
            }
        }
        
        // Recursively call for each superclass, using clashing subclass values as the superior values
        if (($parentClass = $reflClass->getParentClass()) instanceof ReflectionClass) {
            $properties = $this->getSalesforcePropertiesFromReflectionClass($parentClass);
            
            $salesforceProperties['object'] = ($salesforceProperties['object'])
                                              ? $salesforceProperties['object']
                                              : $properties['object'];

            foreach (array('fields', 'relations') as $attribute) {
                $salesforceProperties[$attribute] = array_merge(
                    $properties[$attribute],
                    $salesforceProperties[$attribute]
                );
            }
        }
        
        // Override annotations - if any are set
        $overrideRelationsAnnotation = $this->reader->getClassAnnotation(
            $reflClass,
            'Ddeboer\Salesforce\MapperBundle\Annotation\ObjectRelationOverrides'
        );
        
        if ($overrideRelationsAnnotation instanceof ObjectRelationOverrides) {
            
            // Field override annotations
            if (is_array(($overrideFields = $overrideRelationsAnnotation->fields))) {
                foreach ($overrideFields as $overrideField) {
                    $property = $overrideField->property;

                    if (isset($salesforceProperties['relations'][$property])) {
                        $overrideField->doOverride($salesforceProperties['relations'][$property]);
                    }
                }
            }
            
            // Relation override annotations
            if (is_array(($overrideRelations = $overrideRelationsAnnotation->relations))) {
                foreach ($overrideRelations as $overrideRelation) {
                    $property = $overrideRelation->property;

                    if (isset($salesforceProperties['relations'][$property])) {
                        $overrideRelation->doOverride($salesforceProperties['relations'][$property]);
                    }
                }
            }
        }
        
        // Store this definition in the all important cache
        $this->annotationCache->save($reflClass->getName(), $salesforceProperties);
        
        // And return the properties
        return $salesforceProperties;
    }
}