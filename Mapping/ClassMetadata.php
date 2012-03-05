<?php

namespace Ddeboer\Salesforce\MapperBundle\Mapping;

use ReflectionClass;

class ClassMetadata implements \Doctrine\Common\Persistence\Mapping\ClassMetadata
{
    public $customRepositoryClassName;

    public $fieldMappings;

    public $object;

    public $entityName;

    /**
     * @var \ReflectionClass
     */
    private $reflectionClass;

    public function __construct($entityName)
    {
        $this->entityName = $entityName;
        $this->reflectionClass = new ReflectionClass($entityName);
    }

    public function getName()
    {
        
    }

    public function getIdentifier()
    {
        
    }

    public function getReflectionClass()
    {
        return $this->reflectionClass;
    }

    public function isIdentifier($fieldName)
    {
        
    }

    public function hasField($fieldName)
    {
        
    }

    public function hasAssociation($fieldName)
    {
        
    }

    /**
     * Checks if the given field is a mapped single valued association for this class.
     *
     * @param string $fieldName
     * @return boolean
     */
    public function isSingleValuedAssociation($fieldName)
    {

    }

    /**
     * Checks if the given field is a mapped collection valued association for this class.
     *
     * @param string $fieldName
     * @return boolean
     */
    public function isCollectionValuedAssociation($fieldName)
    {

    }

    /**
     * Get Salesforce field names
     * 
     * A numerically indexed list of field names of this persistent class.
     *
     * This array includes identifier fields if present on this class.
     *
     * @return array
     */
    public function getFieldNames()
    {
        return array_keys($this->fieldMappings);
    }

    /**
     * A numerically indexed list of association names of this persistent class.
     *
     * This array includes identifier associations if present on this class.
     *
     * @return array
     */
    public function getAssociationNames()
    {

    }

    /**
     * Returns a type name of this field.
     *
     * This type names can be implementation specific but should at least include the php types:
     * integer, string, boolean, float/double, datetime.
     *
     * @param string $fieldName
     * @return string
     */
    public function getTypeOfField($fieldName)
    {

    }

    /**
     * Returns the target class name of the given association.
     *
     * @param string $assocName
     * @return string
     */
    public function getAssociationTargetClass($assocName)
    {
        
    }

    public function setObject($object)
    {
        $this->object = $object;
    }

    public function getAssociationMappedByTargetField($assocName)
    {

    }

    public function getIdentifierFieldNames()
    {

    }

    public function getIdentifierValues($object)
    {

    }

    public function isAssociationInverseSide($assocName)
    {

    }
}
