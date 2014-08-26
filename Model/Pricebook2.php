<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;



/**
 * Represents a product entry (an association between a Pricebook2 and Product2)
 * in a price book
 *
 * @Salesforce\Object(name="Pricebook2")
 */
class Pricebook2 extends AbstractModel
{

    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;

    /**
     * @var boolean
     * @Salesforce\Field(name="IsActive")
     */
    protected $isActive;

    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

}
