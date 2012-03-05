<?php

namespace Ddeboer\Salesforce\MapperBundle\Persisters;

use Ddeboer\Salesforce\MapperBundle\EntityManager;
use Ddeboer\Salesforce\MapperBundle\Mapping\ClassMetadata;

class BasicEntityPersister
{
    private $entityManager;
    private $classMetadata;

    public function __construct(EntityManager $em, ClassMetadata $class)
    {
        $this->em = $em;
        $this->classMetadata = $class;
    }

    public function load(array $criteria, $entity = null, array $sort = null)
    {
        $criteria = $this->prepareQuery($criteria);
        $this->em->getClient()->query('select Name from Opportunity where Id=\'1\'');
        die('loading');        
    }

    private function prepareQuery(array $criteria)
    {
        
    }
}