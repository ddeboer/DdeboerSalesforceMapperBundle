<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Salesforce standard contract object
 *
 * You can extend this class to incorporate custom fields on the object.
 *
 * @Salesforce\Object(name="Contract")
 */
class Contract extends AbstractModel
{
    /**
     * @var Account
     * @Salesforce\Relation(field="AccountId", name="Account",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Account")
     */
    protected $account;
    
    /**
     * @var string
     * @Salesforce\Field(name="AccountId")
     */
    protected $accountId;

    /**
     * @var string
     * @Salesforce\Field(name="BillingCity")
     */
    protected $billingCity;

    /**
     * @var string
     * @Salesforce\Field(name="BillingCountry")
     */
    protected $billingCountry;

    /**
     * @var float
     * @Salesforce\Field(name="BillingLatitude")
     */
    protected $billingLatitude;

    /**
     * @var float
     * @Salesforce\Field(name="BillingLongitude")
     */
    protected $billingLongitude;

    /**
     * @var string
     * @Salesforce\Field(name="BillingPostalCode")
     */
    protected $billingPostalCode;

    /**
     * @var string
     * @Salesforce\Field(name="BillingState")
     */
    protected $billingState;

    /**
     * @var string
     * @Salesforce\Field(name="BillingStreet")
     */
    protected $billingStreet;

    /**
     * @var string
     * @Salesforce\Field(name="ContractNumber")
     */
    protected $contractNumber;

    /**
     * @var int
     * @Salesforce\Field(name="ContractTerm")
     */
    protected $contractTerm;

    /**
     * @var Contact
     * @Salesforce\Relation(field="CustomerSignedId", name="CustomerSigned",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Contact")
     */
    protected $customerSigned;

    /**
     * @var datetime
     * @Salesforce\Field(name="CustomerSignedDate")
     */
    protected $customerSignedDate;

    /**
     * @var string
     * @Salesforce\Field(name="CustomerSignedId")
     */
    protected $customerSignedId;
    
    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;

    /**
     * @Salesforce\Field(name="EndDate")
     */
    protected $endDate;

    /**
     * @var boolean
     * @Salesforce\Field(name="IsDeleted")
     */
    protected $isDeleted;

    /**
     * @var string
     * @Salesforce\Field(name="ShippingCity")
     */
    protected $shippingCity;

    /**
     * @var string
     * @Salesforce\Field(name="ShippingCountry")
     */
    protected $shippingCountry;

    /**
     * @var float
     * @Salesforce\Field(name="ShippingLatitude")
     */
    protected $shippingLatitude;

    /**
     * @var float
     * @Salesforce\Field(name="ShippingLongitude")
     */
    protected $shippingLongitude;

    /**
     * @var string
     * @Salesforce\Field(name="ShippingPostalCode")
     */
    protected $shippingPostalCode;

    /**
     * @var string
     * @Salesforce\Field(name="ShippingState")
     */
    protected $shippingState;

    /**
     * @var string
     * @Salesforce\Field(name="ShippingStreet")
     */
    protected $shippingStreet;

    /**
     * @var string
     * @Salesforce\Field(name="SpecialTerms")
     */
    protected $specialTerms;

    /**
     * @Salesforce\Field(name="StartDate")
     */
    protected $startDate;

    /**
     * @var string
     * @Salesforce\Field(name="Status")
     */
    protected $status;

    /**
     * @var string
     * @Salesforce\Field(name="StatusCode")
     */
    protected $statusCode;

    /**
     * @var MappedRecordIterator
     * @Salesforce\Relation(name="Tasks",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Task")
     */
    protected $tasks;
}