<?php

namespace Ddeboer\Salesforce\MapperBundle;

class UnitOfWork
{
    private $entityInsertions = array();

    /**
     * @var Mapper
     */
    private $entityManager;

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