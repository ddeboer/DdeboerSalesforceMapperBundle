<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Default opportunity model
 * 
 * You can extend this class to incorporate custom fields on the Salesforce
 * opportunity object.
 * 
 * @Salesforce\Object(name="Opportunity")
 */
class Opportunity extends AbstractModel
{
    /**
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
     * @var tnsQueryResult
     */
    protected $accountPartners;
    
    /**
     * @var tnsQueryResult
     */
    protected $activityHistories;
    
    /**
     * @var float
     * @Salesforce\Field(name="Amount")
     */
    protected $amount;
    
    /**
     * @var tnsQueryResult
     */
    protected $attachments;    
    
    /**
     * @var ensCampaign
     */
    protected $campaign;
    
    /**
     * @Salesforce\Field(name="CampaignId")
     */
    protected $campaignId;
    
    /**
     * @var xsddate
     * @Salesforce\Field(name="CloseDate")
     */
    protected $closeDate;
    
    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;
    
    /**
     * @var tnsQueryResult
     */
    protected $events;
    
    /**
     * @var tnsQueryResult
     */
    protected $feedSubscriptionsForEntity;
    
    /**
     * @var tnsQueryResult
     */
    protected $feeds;
    
    /**
     * @var string
     */
    protected $fiscal;
    
    /**
     * @var xsdint
     */
    protected $fiscalQuarter;
    
    /**
     * @var int
     * @Salesforce\Field(name="FiscalYear")
     */
    protected $fiscalYear;
    
    /**
     * @var string
     */
    protected $forecastCategory;
    
    /**
     * @var string
     */
    protected $forecastCategoryName;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="HasOpportunityLineItem")
     */
    protected $hasOpportunityLineItem;
    
    /**
     * @var tnsQueryResult
     */
    protected $histories;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsClosed")
     */
    protected $isClosed;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsDeleted")
     */
    protected $isDeleted;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsWon")
     */
    protected $isWon;
    
    /**
     * @var \DateTime
     * @Salesforce\Field(name="LastActivityDate")
     */
    protected $lastActivityDate;
   
    /**
     * @var string
     * @Salesforce\Field(name="LeadSource")
     */
    protected $leadSource;
    
    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;
    
    /**
     * @var string
     * @Salesforce\Field(name="NextStep")
     */
    protected $nextStep;
    
    /**
     * @var tnsQueryResult
     */
    protected $notes;
    
    /**
     * @var tnsQueryResult
     */
    protected $notesAndAttachments;
    
    /**
     * @var tnsQueryResult
     */
    protected $openActivities;
    
    /**
     * @var tnsQueryResult
     */
    protected $opportunityCompetitors;
    
    /**
     * @var tnsQueryResult
     */
    protected $opportunityContactRoles;
    
    /**
     * @var tnsQueryResult
     */
    protected $opportunityHistories;
    
    /**
     * @var tnsQueryResult
     */
    protected $opportunityLineItems;
    
    /**
     * @var tnsQueryResult
     */
    protected $opportunityPartnersFrom;
    
    /**
     * @var User
     * @Salesforce\Relation(field="Owner", class="Ddeboer\Salesforce\MapperBundle\Model\User")
     */
    protected $owner;
    
    /**
     * @var string
     * @Salesforce\Field(name="OwnerId")
     */
    protected $ownerId;
    
    /**
     * @var tnsQueryResult
     */
    protected $partners;
    
    /**
     * @var ensPricebook2
     */
    protected $pricebook2;
    
    /**
     * @var tnsID
     */
    protected $pricebook2Id;
    
    /**
     * @var float
     * @Salesforce\Field(name="Probability")
     */
    protected $probability;
    
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
     * @var tnsID
     */
    protected $recordTypeId;

    /**
     * @var tnsQueryResult
     */
    protected $shares;
    
    /**
     * @var string
     * @Salesforce\Field(name="StageName")
     */
    protected $stageName;
     
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

    public function getAccount()
    {
        return $this->account;
    }

    public function setAccount($account)
    {
        $this->account = $account;
        $this->accountId = $account->getId();
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    public function getAccountPartners()
    {
        return $this->accountPartners;
    }

    public function setAccountPartners($accountPartners)
    {
        $this->accountPartners = $accountPartners;
    }

    public function getActivityHistories()
    {
        return $this->activityHistories;
    }

    public function setActivityHistories($activityHistories)
    {
        $this->activityHistories = $activityHistories;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getAttachments()
    {
        return $this->attachments;
    }

    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
    }

    public function getCampaign()
    {
        return $this->campaign;
    }

    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
    }

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    public function getCloseDate()
    {
        return $this->closeDate;
    }

    public function setCloseDate($closeDate)
    {
        $this->closeDate = $closeDate;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function setEvents($events)
    {
        $this->events = $events;
    }

    public function getFeedSubscriptionsForEntity()
    {
        return $this->feedSubscriptionsForEntity;
    }

    public function setFeedSubscriptionsForEntity($feedSubscriptionsForEntity)
    {
        $this->feedSubscriptionsForEntity = $feedSubscriptionsForEntity;
    }

    public function getFeeds()
    {
        return $this->feeds;
    }

    public function setFeeds($feeds)
    {
        $this->feeds = $feeds;
    }

    public function getFiscal()
    {
        return $this->fiscal;
    }

    public function setFiscal($fiscal)
    {
        $this->fiscal = $fiscal;
    }

    public function getFiscalQuarter()
    {
        return $this->fiscalQuarter;
    }

    public function setFiscalQuarter($fiscalQuarter)
    {
        $this->fiscalQuarter = $fiscalQuarter;
    }

    public function getFiscalYear()
    {
        return $this->fiscalYear;
    }

    public function getForecastCategory()
    {
        return $this->forecastCategory;
    }

    public function setForecastCategory($forecastCategory)
    {
        $this->forecastCategory = $forecastCategory;
    }

    public function getForecastCategoryName()
    {
        return $this->forecastCategoryName;
    }

    public function setForecastCategoryName($forecastCategoryName)
    {
        $this->forecastCategoryName = $forecastCategoryName;
    }

    public function getHasOpportunityLineItem()
    {
        return $this->hasOpportunityLineItem;
    }

    public function getHistories()
    {
        return $this->histories;
    }

    public function setHistories($histories)
    {
        $this->histories = $histories;
    }

    public function isClosed()
    {
        return $this->isClosed;
    }

    public function isDeleted()
    {
        return $this->isDeleted;
    }

    public function isWon()
    {
        return $this->isWon;
    }

    public function getLastActivityDate()
    {
        return $this->lastActivityDate;
    }

    public function setLastActivityDate($lastActivityDate)
    {
        $this->lastActivityDate = $lastActivityDate;
    }

    public function getLeadSource()
    {
        return $this->leadSource;
    }

    public function setLeadSource($leadSource)
    {
        $this->leadSource = $leadSource;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getNextStep()
    {
        return $this->nextStep;
    }

    public function setNextStep($nextStep)
    {
        $this->nextStep = $nextStep;
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

    public function getOpenActivities()
    {
        return $this->openActivities;
    }

    public function setOpenActivities($openActivities)
    {
        $this->openActivities = $openActivities;
    }

    public function getOpportunityCompetitors()
    {
        return $this->opportunityCompetitors;
    }

    public function setOpportunityCompetitors($opportunityCompetitors)
    {
        $this->opportunityCompetitors = $opportunityCompetitors;
    }

    public function getOpportunityContactRoles()
    {
        return $this->opportunityContactRoles;
    }

    public function setOpportunityContactRoles($opportunityContactRoles)
    {
        $this->opportunityContactRoles = $opportunityContactRoles;
    }

    public function getOpportunityHistories()
    {
        return $this->opportunityHistories;
    }

    public function setOpportunityHistories($opportunityHistories)
    {
        $this->opportunityHistories = $opportunityHistories;
    }

    public function getOpportunityLineItems()
    {
        return $this->opportunityLineItems;
    }

    public function setOpportunityLineItems($opportunityLineItems)
    {
        $this->opportunityLineItems = $opportunityLineItems;
    }

    public function getOpportunityPartnersFrom()
    {
        return $this->opportunityPartnersFrom;
    }

    public function setOpportunityPartnersFrom($opportunityPartnersFrom)
    {
        $this->opportunityPartnersFrom = $opportunityPartnersFrom;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner(User $owner)
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

    public function getPartners()
    {
        return $this->partners;
    }

    public function setPartners($partners)
    {
        $this->partners = $partners;
    }

    public function getPricebook2()
    {
        return $this->pricebook2;
    }

    public function setPricebook2($pricebook2)
    {
        $this->pricebook2 = $pricebook2;
    }

    public function getPricebook2Id()
    {
        return $this->pricebook2Id;
    }

    public function setPricebook2Id($pricebook2Id)
    {
        $this->pricebook2Id = $pricebook2Id;
    }

    public function getProbability()
    {
        return $this->probability;
    }

    public function setProbability($probability)
    {
        $this->probability = $probability;
    }

    public function getProcessInstances()
    {
        return $this->processInstances;
    }

    public function setProcessInstances($processInstances)
    {
        $this->processInstances = $processInstances;
    }

    public function getProcessSteps()
    {
        return $this->processSteps;
    }

    public function setProcessSteps($processSteps)
    {
        $this->processSteps = $processSteps;
    }

    public function getRecordType()
    {
        return $this->recordType;
    }

    public function setRecordType($recordType)
    {
        $this->recordType = $recordType;
    }

    public function getRecordTypeId()
    {
        return $this->recordTypeId;
    }

    public function setRecordTypeId($recordTypeId)
    {
        $this->recordTypeId = $recordTypeId;
    }

    public function getShares()
    {
        return $this->shares;
    }

    public function setShares($shares)
    {
        $this->shares = $shares;
    }

    public function getStageName()
    {
        return $this->stageName;
    }

    public function setStageName($stageName)
    {
        $this->stageName = $stageName;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getTasks()
    {
        return $this->tasks;
    }

    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}