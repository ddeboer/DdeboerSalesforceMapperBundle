<?php

namespace Ddeboer\Salesforce\MapperBundle;

use Doctrine\Common\Persistence\ObjectRepository;

class EntityRepository implements ObjectRepository
{
    private $em;
    private $uow;
    private $class;

    public function __construct(EntityManager $em, Mapping\ClassMetadata $class)
    {
        $this->em = $em;
        $this->class = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        $length = strlen($id);
        if ($length != 15 && $length != 18) {
            throw new \InvalidArgumentException(
                'Salesforce id must be either 15 or 18 characters long'
            );
        }

        // Try to get object from unit of work’s identity map
        $entity = $this->em->getUnitOfWork()->tryGetById($id, $this->class->entityName);
        if ($entity) {
            die('hit in unitofwork');
            return $entity;
        }

        return $this->em->getUnitOfWork()
            ->getEntityPersister($this->class->entityName)->load(array(
                'id' => $id
            ));
    }

    public function findAll()
    {
        
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
    }

    public function findOneBy(array $criteria)
    {
    }

    public function getClassName()
    {
        return $this->class->getReflectionClass()->name;
    }
}