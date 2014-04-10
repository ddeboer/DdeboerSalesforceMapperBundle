<?php
namespace Ddeboer\Salesforce\MapperBundle;

use Ddeboer\Salesforce\MapperBundle\Annotation\AnnotationReader;
use Ddeboer\Salesforce\MapperBundle\Model\AbstractModel;

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
    
    public function removeFromIdentityMap(AbstractModel $model)
    {
        $sObjectName = $this->getObjectName($model);
        $id = $model->getId();
        
        if (isset($this->identityMap[$sObjectName][$id])) {
            unset($this->identityMap[$sObjectName][$id]);
        }
    }

    protected function getObjectName($model)
    {
        $description = $this->mapper->getObjectDescription($model);

        return (is_object($model) ? get_class($model) : $model) . "-" . $description->getName();
    }
}