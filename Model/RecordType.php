<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Salesforce standard record type object
 *
 * @Salesforce\Object(name="RecordType")
 */
class RecordType extends AbstractModel
{
    /**
     * @var string
     * @Salesforce\Field(name="DeveloperName")
     */
    protected $developerName;

    /**
     * @var boolean
     * @Salesforce\Field(name="IsActive")
     */
    protected $isActive;

    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;

    /**
     * @var string
     * @Salesforce\Field(name="SobjectType")
     */
    protected $sObjectType;

    public function getDeveloperName()
    {
        return $this->developerName;
    }

    public function setDeveloperName($developerName)
    {
        $this->developerName = $developerName;
    }

    public function isActive()
    {
        return $this->isActive;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSObjectType()
    {
        return $this->sObjectType;
    }

    public function setSObjectType($sObjectType)
    {
        $this->sObjectType = $sObjectType;
    }
}

