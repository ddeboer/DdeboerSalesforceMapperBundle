<?php
namespace Ddeboer\Salesforce\MapperBundle;

use Ddeboer\Salesforce\MapperBundle\Annotation\AnnotationReader;

class UnitOfWork
{
    protected $mapper;
    protected $annotationReader;
    protected $identityMap = array();

    public function __construct(Mapper $mapper, AnnotationReader $annotationReader)
    {
        $this->mapper = $mapper;
        $this->annotationReader = $annotationReader;
    }

    public function find($modelClass, $id)
    {
        $sObjectName = $this->getObjectName($modelClass);

        if (isset($this->identityMap[$sObjectName][$id])) {
            return $this->identityMap[$sObjectName][$id];
        }
    }

    public function addToIdentityMap($model)
    {
        $this->getObjectName($model);
        $this->identityMap[$this->getObjectName($model)][$model->getId()] = $model;
    }

    protected function getObjectName($model)
    {
        $description = $this->mapper->getObjectDescription($model);

        return $description->getName();
    }
}