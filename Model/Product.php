<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;
use Ddeboer\Salesforce\MapperBundle\Response\MappedRecordIterator;
use Serializable;

/**
 * Salesforce standard task object
 *
 * @Salesforce\Object(name="Product2")
 */
class Product extends AbstractModel implements Serializable
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

    public function serialize() {
        $vars = array(
            'description' => $this->description,
            'name' => $this->name,
            'family' => $this->family,
            'isActive' => $this->isActive,
            'priceUnit' => $this->priceUnit,
            'parent' => parent::serialize()
        );

        if($this->pricebookEntries instanceof MappedRecordIterator) {
            $arr = array();
            foreach($this->pricebookEntries as $pe) {
                $arr[] = $pe->serialize();
            }
            $vars['pricebookEntries'] = $arr;
        }

        return serialize($vars);
    }

    public function unserialize($serialized) {
        $vars = unserialize($serialized);
        $this->description = $vars['description'];
        $this->name = $vars['name'];
        $this->family = $vars['family'];
        $this->isActive = $vars['isActive'];
        $this->priceUnit = $vars['priceUnit'];

        if(array_key_exists('pricebookEntries', $vars)) {
            $arr = array();
            foreach($vars['pricebookEntries'] as $pe) {
                $price = new PricebookEntry();
                $price->unserialize($pe);
                $arr[] = $price;
            }
            $this->pricebookEntries = array();
        }

        parent::unserialize($vars['parent']);
    }
}