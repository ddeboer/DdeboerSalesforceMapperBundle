<?php

namespace Ddeboer\Salesforce\MapperBundle;

use Ddeboer\Salesforce\MapperBundle\Persisters\BasicEntityPersister;

class UnitOfWork
{
    private $entityInsertions = array();

    /**
     * @var Mapper
     */
    private $entityManager;

    private $identityMap = array();

    private $persisters = array();

    private $originalEntityData = array();

    private $entityIdentifiers = array();

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Tries to find an entity with the given identifier in the identity map of
     * this UnitOfWork.
     *
     * @param mixed $id The entity identifier to look for.
     * @param string $rootClassName The name of the root class of the mapped entity hierarchy.
     * @return mixed Returns the entity with the specified identifier if it exists in
     *               this UnitOfWork, FALSE otherwise.
     */
    public function tryGetById($id, $rootClassName)
    {
        return isset($this->identityMap[$rootClassName][$id])
            ? $this->identityMap[$rootClassName][$id]
            : false;
    }

    public function registerManaged($entity, $id, array $data)
    {
        $oid = spl_object_hash($entity);
        $this->originalEntityData[$oid] = $data;
        $this->entityIdentifiers[$oid] = $id;
        $this->addToIdentityMap($entity);
    }

    public function addToIdentityMap($entity)
    {
        $classMetadata = $this->entityManager->getClassMetadata($entity);
        $oid = spl_object_hash($entity);
        $id = $this->entityIdentifiers[$oid];
        $this->identityMap[$classMetadata->entityName][$id] = $entity;

        return true;
    }

    public function getEntityPersister($className)
    {
        if (!isset($this->persisters[$className])) {
            $class = $this->entityManager->getClassMetadata($className);
            $this->persisters[$className] =
                new BasicEntityPersister($this->entityManager, $class);
        }

        return $this->persisters[$className];
    }

    private function executeInserts($class)
    {
        
    }

    public function persist($entity)
    {
        if (!is_object($entity)) {
            throw new \InvalidArgumentException('Entity must be an object');
        }

        
    }
}