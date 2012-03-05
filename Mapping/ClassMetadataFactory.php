<?php

namespace Ddeboer\Salesforce\MapperBundle\Mapping;

class ClassMetadataFactory implements \Doctrine\Common\Persistence\Mapping\ClassMetadataFactory
{
    private $loadedMetadata = array();
    private $driver;

    public function __construct(Driver\AnnotationDriver $driver)
    {
        $this->driver = $driver;
    }
    
    /**
     * Forces the factory to load the metadata of all classes known to the underlying
     * mapping driver.
     *
     * @return array The ClassMetadata instances of all mapped classes.
     */
    public function getAllMetadata()
    {

    }

    /**
     * Gets the class metadata descriptor for a class.
     *
     * @param string $className The name of the class.
     * @return ClassMetadata
     */
    public function getMetadataFor($className)
    {
        if (!isset($this->loadedMetadata[$className])) {
            $classMetadata = new ClassMetadata($className);
            $this->driver->loadMetadataForClass($className, $classMetadata);
            $this->loadedMetadata[$className] = $classMetadata;
        }

        return $this->loadedMetadata[$className];
        
    }

    /**
     * Checks whether the factory has the metadata for a class loaded already.
     *
     * @param string $className
     * @return boolean TRUE if the metadata of the class in question is already loaded, FALSE otherwise.
     */
    public function hasMetadataFor($className)
    {

    }

    /**
     * Sets the metadata descriptor for a specific class.
     *
     * @param string $className
     * @param ClassMetadata $class
     */
    public function setMetadataFor($className, $class)
    {
        
    }

    public function isTransient($className)
    {

    }
}