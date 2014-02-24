<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Salesforce standard task object
 *
 * @Salesforce\Object(name="Product2")
 */
class Product extends AbstractModel
{
    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;

    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;
    
    /**
     * Product family 
     * 
     * @var string
     * @Salesforce\Field(name="Family")
     */
    protected $family;

    /**
     * @var boolean
     * @Salesforce\Field(name="IsActive")
     */
    protected $isActive;

    /**
     * @var string
     * @Salesforce\Field(name="PriceUnit__c")
     */
    protected $priceUnit;

    /**
     * @var MappedRecordIterator
     * @Salesforce\Relation(name="PricebookEntries",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\PricebookEntry")
     */
    protected $pricebookEntries;


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getFamily()
    {
        return $this->family;
    }

    public function setFamily($family)
    {
        $this->family = $family;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function isActive()
    {
        return $this->getIsActive();
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function getPriceUnit() {
        return $this->priceUnit;
    }

    public function setPriceUnit($priceUnit) {
        $this->priceUnit = $priceUnit;
    }

    public function getPricebookEntries()
    {
        return $this->pricebookEntries;
    }
    
    public function setPricebookEntries($pricebookEntries)
    {
        $this->pricebookEntries = $pricebookEntries;
        return $this;
    }
}