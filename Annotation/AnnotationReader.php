<?php

namespace Ddeboer\Salesforce\MapperBundle\Annotation;

use Doctrine\Common\Annotations\Reader;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Reads Salesforce annotations
 * 
 * This class encapsulates the Doctrine annotation reader.
 */
class AnnotationReader
{
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
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
        
        if ($reflClass->getParentClass()) {
            $properties = $this->getSalesforcePropertiesFromReflectionClass(
                $reflClass->getParentClass()
            );
            
            $salesforceProperties['object'] = ($salesforceProperties['object'])
                                              ? $salesforceProperties['object']
                                              : $properties['object'];

            $salesforceProperties['fields'] = array_merge(
                $properties['fields'],
                $salesforceProperties['fields']
            );
            
            $salesforceProperties['relations'] = array_merge(
                $properties['relations'],
                $salesforceProperties['relations']
            );
        }
        
        return $salesforceProperties;
    }
}