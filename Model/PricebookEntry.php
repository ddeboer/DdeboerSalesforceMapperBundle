<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;
use DateTime;

/**
 * Represents a product entry (an association between a Pricebook2 and Product2)
 * in a price book
 *
 * @Salesforce\Object(name="PricebookEntry")
 * @link http://www.salesforce.com/us/developer/docs/api/Content/sforce_api_objects_pricebookentry.htm
 */
class PricebookEntry extends AbstractModel
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
     * @var Product
     * @Salesforce\Relation(field="Product2Id", name="Product2",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Product")
     */
    protected $product;

    /**
     * @var string
     * @Salesforce\Field(name="Product2Id")
     */
    protected $productId;

    /**
     * @var Product
     * @Salesforce\Relation(field="Pricebook2Id", name="Pricebook2",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Pricebook2")
     */
    protected $pricebook;

    /**
     * @var string
     * @Salesforce\Field(name="Pricebook2Id")
     */
    protected $pricebookId;

    /**
     * @var float
     * @Salesforce\Field(name="UnitPrice")
     */
    public $unitPrice;

    /**
     * @var boolean
     * @Salesforce\Field(name="UseStandardPrice")
     */
    public $useStandardPrice;

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

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function getPricebook()
    {
        return $this->pricebook;
    }
    
    public function setPricebook($pricebook)
    {
        $this->pricebook = $pricebook;
        return $this;
    }
    
    public function getPricebookId()
    {
        return $this->pricebookId;
    }
    
    public function setPricebookId($pricebookId)
    {
        $this->pricebookId = $pricebookId;
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
    
    public function getUseStandardPrice()
    {
        return $this->useStandardPrice;
    }
    
    public function setUseStandardPrice($useStandardPrice)
    {
        $this->useStandardPrice = $useStandardPrice;
        return $this;
    }
    
}