<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;
use Ddeboer\Salesforce\MapperBundle\Response\MappedRecordIterator;

/**
 * Salesforce standard account object
 * 
 * You can extend this class to incorporate custom fields on the object.
 * 
 * @Salesforce\Object(name="Account")
 */
class Account extends AbstractModel
{
    /**
     * @var MappedRecordIterator
     * @Salesforce\Relation(name="AccountContactRoles",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\AccountContactRole")
     */
    protected $accountContactRoles;
    
    /**
     * @var float
     * @Salesforce\Field(name="AnnualRevenue")
     */
    protected $annualRevenue;
    
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
     * @var @Salesforce\Field(name="BillingPostalCode")
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
     * @var ResultIterator
     * @Salesforce\Relation(name="Contacts", class="Ddeboer\Salesforce\MapperBundle\Model\Contact")
     */
    protected $contacts = array();
    
    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;
    
    /**
     * @var string
     * @Salesforce\Field(name="Fax")
     */
    protected $fax;
    
    /**
     * @var string
     */
    protected $histories;
    
    /**
     * @var string
     * @Salesforce\Field(name="Industry")
     */
    protected $industry;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsDeleted")
     */
    protected $isDeleted;
    
    /**
     * @var string
     */
    protected $jigsaw;
    
    /**
     * @var \DateTime
     * @Salesforce\FIeld(name="LastActivityDate")
     */
    protected $lastActivityDate;
    
    /**
     * @var 
     */
    protected $masterRecord;
    
    /**
     * @var string
     */
    protected $masterRecordId;
    
    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;
    
    /**
     * @var ResultIterator
     */
    protected $notes;
    
    /**
     * @var ResultIterator
     */
    protected $notesAndAttachments;
    
    /**
     * @var int
     */
    protected $numberOfEmployees;
    
    /**
     * @var ResultIterator
     */
    protected $openActivities;
    
    /**
     * @var ResultIterator
     */
    protected $opportunities;
    
    /**
     * @var tnsQueryResult
     */
    protected $opportunityPartnersTo;
    
    /**
     * @var User
     * @Salesforce\Relation(field="OwnerId", name="Owner",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\User")
     */
    protected $owner;
    
    /**
     * @var string
     * @Salesforce\Field(name="OwnerId")
     */
    protected $ownerId;
    
    /**
     * @var string
     */
    protected $parent;
    
    /**
     * @var string
     */
    protected $parentId;
    
    /**
     * @var tnsQueryResult
     */
    protected $partnersFrom;
    
    /**
     * @var tnsQueryResult
     */
    protected $partnersTo;
    
    /**
     * @var string
     * @Salesforce\Field(name="Phone")
     */
    protected $phone;
    
    /**
     * @var tnsQueryResult
     */
    protected $processInstances;
    
    /**
     * @var tnsQueryResult
     */
    protected $processSteps;
    
    /**
     * @var ensRecordType
     */
    protected $recordType;
    
    /**
     * @var id
     */
    protected $recordTypeId;
    
    /**
     * @var tnsQueryResult
     */
    protected $shares;
    
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
     * @var string
     * @Salesforce\Field(name="ShippingPostalCode")
     */
    protected $shippingPostalCode;
    
    /**
     * @var string
     */
    protected $shippingState;
    
    /**
     * @var string
     * @Salesforce\Field(name="ShippingStreet")
     */
    protected $shippingStreet;
    
    /**
     * @var tnsQueryResult
     */
    protected $tags;
    
    /**
     * @var tnsQueryResult
     */
    protected $tasks;
    
    /**
     * @var string
     * @Salesforce\Field(name="Type")
     */
    protected $type;
    
    /**
     * @var string
     * @Salesforce\Field(name="Website")
     */
    protected $website;

    /**
     * Get contact roles for the account
     * 
     * @return MappedRecordIterator
     */
    public function getAccountContactRoles()
    {
        return $this->accountContactRoles;
    }

    public function getAnnualRevenue()
    {
        return $this->annualRevenue;
    }

    public function setAnnualRevenue($annualRevenue)
    {
        $this->annualRevenue = $annualRevenue;
    }

    public function getBillingCity()
    {
        return $this->billingCity;
    }

    public function setBillingCity($billingCity)
    {
        $this->billingCity = $billingCity;
    }

    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    public function setBillingCountry($billingCountry)
    {
        $this->billingCountry = $billingCountry;
    }

    public function getBillingPostalCode()
    {
        return $this->billingPostalCode;
    }

    public function setBillingPostalCode($billingPostalCode)
    {
        $this->billingPostalCode = $billingPostalCode;
    }

    public function getBillingState()
    {
        return $this->billingState;
    }

    public function setBillingState($billingState)
    {
        $this->billingState = $billingState;
    }

    public function getBillingStreet()
    {
        return $this->billingStreet;
    }

    public function setBillingStreet($billingStreet)
    {
        $this->billingStreet = $billingStreet;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }

    public function addContact($contact)
    {
        $contact->setAccount($this);
        $this->contacts[] = $contact;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    public function getHistories()
    {
        return $this->histories;
    }

    public function setHistories($histories)
    {
        $this->histories = $histories;
    }

    public function getIndustry()
    {
        return $this->industry;
    }

    public function setIndustry($industry)
    {
        $this->industry = $industry;
    }

    public function isDeleted()
    {
        return $this->isDeleted;
    }

    public function getJigsaw()
    {
        return $this->jigsaw;
    }

    public function setJigsaw($jigsaw)
    {
        $this->jigsaw = $jigsaw;
    }

    public function getLastActivityDate()
    {
        return $this->lastActivityDate;
    }

    public function getMasterRecord()
    {
        return $this->masterRecord;
    }

    public function setMasterRecord($masterRecord)
    {
        $this->masterRecord = $masterRecord;
    }

    public function getMasterRecordId()
    {
        return $this->masterRecordId;
    }

    public function setMasterRecordId($masterRecordId)
    {
        $this->masterRecordId = $masterRecordId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    public function getNotesAndAttachments()
    {
        return $this->notesAndAttachments;
    }

    public function setNotesAndAttachments($notesAndAttachments)
    {
        $this->notesAndAttachments = $notesAndAttachments;
    }

    public function getNumberOfEmployees()
    {
        return $this->numberOfEmployees;
    }

    public function setNumberOfEmployees($numberOfEmployees)
    {
        $this->numberOfEmployees = $numberOfEmployees;
    }

    public function getOpenActivities()
    {
        return $this->openActivities;
    }

    public function setOpenActivities($openActivities)
    {
        $this->openActivities = $openActivities;
    }

    public function getOpportunities()
    {
        return $this->opportunities;
    }

    public function setOpportunities($opportunities)
    {
        $this->opportunities = $opportunities;
    }

    public function getOpportunityPartnersTo()
    {
        return $this->opportunityPartnersTo;
    }

    public function setOpportunityPartnersTo($opportunityPartnersTo)
    {
        $this->opportunityPartnersTo = $opportunityPartnersTo;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;
        $this->ownerId = $owner->getId();
    }

    public function getOwnerId()
    {
        return $this->ownerId;
    }

    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function getParentId()
    {
        return $this->parentId;
    }

    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
        return $this;
    }

    public function getPartnersFrom()
    {
        return $this->partnersFrom;
    }

    public function setPartnersFrom($partnersFrom)
    {
        $this->partnersFrom = $partnersFrom;
        return $this;
    }

    public function getPartnersTo()
    {
        return $this->partnersTo;
    }

    public function setPartnersTo($partnersTo)
    {
        $this->partnersTo = $partnersTo;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getProcessInstances()
    {
        return $this->processInstances;
    }

    public function setProcessInstances($processInstances)
    {
        $this->processInstances = $processInstances;
        return $this;
    }

    public function getProcessSteps()
    {
        return $this->processSteps;
    }

    public function setProcessSteps($processSteps)
    {
        $this->processSteps = $processSteps;
        return $this;
    }

    public function getRecordType()
    {
        return $this->recordType;
    }

    public function setRecordType($recordType)
    {
        $this->recordType = $recordType;
        return $this;
    }

    public function getRecordTypeId()
    {
        return $this->recordTypeId;
    }

    public function setRecordTypeId($recordTypeId)
    {
        $this->recordTypeId = $recordTypeId;
        return $this;
    }

    public function getShares()
    {
        return $this->shares;
    }

    public function setShares($shares)
    {
        $this->shares = $shares;
        return $this;
    }

    public function getShippingCity()
    {
        return $this->shippingCity;
    }

    public function setShippingCity($shippingCity)
    {
        $this->shippingCity = $shippingCity;
        return $this;
    }

    public function getShippingCountry()
    {
        return $this->shippingCountry;
    }

    public function setShippingCountry($shippingCountry)
    {
        $this->shippingCountry = $shippingCountry;
        return $this;
    }

    public function getShippingPostalCode()
    {
        return $this->shippingPostalCode;
    }

    public function setShippingPostalCode($shippingPostalCode)
    {
        $this->shippingPostalCode = $shippingPostalCode;
        return $this;
    }

    public function getShippingState()
    {
        return $this->shippingState;
    }

    public function setShippingState($shippingState)
    {
        $this->shippingState = $shippingState;
        return $this;
    }

    public function getShippingStreet()
    {
        return $this->shippingStreet;
    }

    public function setShippingStreet($shippingStreet)
    {
        $this->shippingStreet = $shippingStreet;
        return $this;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    public function getTasks()
    {
        return $this->tasks;
    }

    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    public function serialize()
    {
        return serialize(array(
            'accountContactRoles' => $this->accountContactRoles,
            'annualRevenue' => $this->annualRevenue,
            'billingCity' => $this->billingCity,
            'billingCountry' => $this->billingCountry,
            'billingPostalCode' => $this->billingPostalCode,
            'billingState' => $this->billingState,
            'billingStreet' => $this->billingStreet,
            'contacts' => $this->contacts,
            'description' => $this->description,
            'fax' => $this->fax,
            'histories' => $this->histories,
            'industry' => $this->industry,
            'isDeleted' => $this->isDeleted,
            'jigsaw' => $this->jigsaw,
            'lastActivityDate' => $this->lastActivityDate,
            'masterRecord' => $this->masterRecord,
            'masterRecordId' => $this->masterRecordId,
            'name' => $this->name,
            'notes' => $this->notes,
            'notesAndAttachments' => $this->notesAndAttachments,
            'numberOfEmployees' => $this->numberOfEmployees,
            'openActivities' => $this->openActivities,
            'opportunities' => $this->opportunities,
            'opportunityPartnersTo' => $this->opportunityPartnersTo,
            'owner' => $this->owner,
            'ownerId' => $this->ownerId,
            'parent' => $this->parent,
            'parentId' => $this->parentId,
            'partnersFrom' => $this->partnersFrom,
            'partnersTo' => $this->partnersTo,
            'phone' => $this->phone,
            'processInstances' => $this->processInstances,
            'processSteps' => $this->processSteps,
            'recordType' => $this->recordType,
            'recordTypeId' => $this->recordTypeId,
            'shares' => $this->shares,
            'shippingCity' => $this->shippingCity,
            'shippingCountry' => $this->shippingCountry,
            'shippingPostalCode' => $this->shippingPostalCode,
            'shippingState' => $this->shippingState,
            'shippingStreet' => $this->shippingStreet,
            'tags' => $this->tags,
            'tasks' => $this->tasks,
            'type' => $this->type,
            'website' => $this->website,
        ));
    }
}