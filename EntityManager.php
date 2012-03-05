<?php

namespace Ddeboer\Salesforce\MapperBundle;

use Doctrine\Common\Persistence\ObjectManager;
use Ddeboer\Salesforce\ClientBundle\ClientInterface;
use Ddeboer\Salesforce\MapperBundle\Mapping\ClassMetadataFactory;
use Ddeboer\Salesforce\MapperBundle\Mapping\Driver\AnnotationDriver;

class EntityManager implements ObjectManager
{
    /**
     * Salesforce API client
     *
     * @var ClientInterface
     */
    private $client;

    /**
     * @var array
     */
    private $repositories = array();

    /**
     * @var ClassMetadataFactory
     */
    private $metadataFactory;

    /**
     * @var UnitOfWork
     */
    private $unitOfWork;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        $this->metadataFactory = new ClassMetadataFactory(new AnnotationDriver());
        $this->unitOfWork = new UnitOfWork($this);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function find($className, $id)
    {
        return $this->getRepository($className)->find($id);
    }

    public function persist($object)
    {

    }

    public function remove($object)
    {

    }

    public function merge($object)
    {
    }

    public function detach($object)
    {

    }

    public function refresh($object)
    {
    }

    public function flush()
    {
        
    }

    public function initializeObject($obj)
    {
        
    }

    public function contains($obj)
    {
        
    }


    public function getRepository($className)
    {
        
        if (!isset($this->repositories[$className])) {
            // @todo Add support for custom repositories
            $metadata = $this->getClassMetadata($className);
            $repository = new EntityRepository($this, $metadata);
            $this->repositories[$className] = $repository;            
        }

        return $this->repositories[$className];
    }

    /**
     * {@inheritdoc}
     */
    public function getClassMetadata($className)
    {
         return $this->metadataFactory->getMetadataFor($className);
    }

    public function getMetadataFactory()
    {
        return $this->metadataFactory;
    }

    /**
     *
     * @return UnitOfWork
     */
    public function getUnitOfWork()
    {
        return $this->unitOfWork;
    }
}
