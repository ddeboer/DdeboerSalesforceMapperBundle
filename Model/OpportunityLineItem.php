<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * OpportunityLineItem proxy object
 * 
 * @Salesforce\Object(name="OpportunityLineItem")
 */
class OpportunityLineItem extends AbstractModel
{
    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;
    
    /**
     * @var boolean
     */
    protected $isDeleted;
    
    /**
     * @var double
     * @Salesforce\Field(name="ListPrice")
     */
    protected $listPrice;
    
    /**
     * @var Opportunity
     * @Salesforce\Relation(field="OpportunityId", name="Opportunity",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Opportunity")
     */
    protected $opportunity;
    
    /**
     * @var string
     * @Salesforce\Field(name="OpportunityId")
     */
    protected $opportunityId;
    
    /**
     * @var PricebookEntry
     * @Salesforce\Relation(field="PricebookEntryId", name="PricebookEntry",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\PricebookEntry")
     */
    protected $pricebookEntry;
    
    /**
     * @var string
     * @Salesforce\Field(name="PricebookEntryId")
     */
    protected $pricebookEntryId;
    
    /**
     * @var PricebookEntry
     * @Salesforce\Relation(field="productId", name="Product2",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Product")
     */
    protected $product;
    
    /**
     * @var string
     * @Salesforce\Field(name="Product2Id")
     */
    protected $productId;
    
    /**
     * @var double
     * @Salesforce\Field(name="Quantity")
     */
    protected $quantity;
    
    /**
     * @var \DateTime
     */
    protected $serviceDate;
    
    /**
     * @var int
     */
    protected $sortOrder;
    
    /**
     * @var double
     * @Salesforce\Field(name="TotalPrice")
     */
    protected $totalPrice;
    
    /**
     * @var double
     * @Salesforce\Field(name="UnitPrice")
     */
    protected $unitPrice;

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function isDeleted()
    {
        return $this->isDeleted;
    }

    public function getListPrice()
    {
        return $this->listPrice;
    }

    public function setListPrice($listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }

    public function getOpportunity()
    {
        return $this->opportunity;
    }

    public function setOpportunity($opportunity)
    {
        $this->opportunity = $opportunity;
        $this->opportunityId = $opportunity->getId();
        return $this;
    }

    public function getOpportunityId()
    {
        return $this->opportunityId;
    }

    public function setOpportunityId($opportunityId)
    {
        $this->opportunityId = $opportunityId;
        return $this;
    }

    public function getPricebookEntry()
    {
        return $this->pricebookEntry;
    }

    public function setPricebookEntry($pricebookEntry)
    {
        $this->pricebookEntry = $pricebookEntry;
        return $this;
    }

    public function getPricebookEntryId()
    {
        return $this->pricebookEntryId;
    }

    public function getProduct()
    {
        return $this->product;
    }
    
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }
    
    public function setPricebookEntryId($pricebookEntryId)
    {
        $this->pricebookEntryId = $pricebookEntryId;
        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getServiceDate()
    {
        return $this->serviceDate;
    }

    public function setServiceDate(\DateTime $serviceDate)
    {
        $this->serviceDate = $serviceDate;
        return $this;
    }

    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }

    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }
}