<?php

namespace Ddeboer\Salesforce\MapperBundle;

use Doctrine\Common\Persistence\ObjectRepository;

class EntityRepository implements ObjectRepository
{
    private $em;
    private $class;

    public function __construct(EntityManager $em, Mapping\ClassMetadata $class)
    {
        $this->em = $em;
        $this->class = $class;
    }

    public function find($id)
    {
        var_dump($this->class);die;
        $this->em->getClient()->query();
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
}