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
     * @Salesforce\Relation(name="OpportunityLineItems",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\OpportunityLineItem")
     */
    //protected $opportunityLineItems;

    /**
     * @var tnsQueryResult
     */
    protected $opportunityPartnersFrom;

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
     * @var tnsQueryResult
     */
    protected $partners;

    /**
     * @var ensPricebook2
     */
    protected $pricebook2;

    /**
     * @var string
     * @Salesforce\Field(name="Pricebook2Id")
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
     * @var string
     * @Salesforce\Field(name="RecordTypeId")
     */
    //protected $recordTypeId;

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

    /**
     *
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    public function setAccount($account)
    {
        $this->account = $account;
        $this->accountId = $account->getId();
        return $this;
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
        return $this;
    }

    public function getAccountPartners()
    {
        return $this->accountPartners;
    }

    public function setAccountPartners($accountPartners)
    {
        $this->accountPartners = $accountPartners;
        return $this;
    }

    public function getActivityHistories()
    {
        return $this->activityHistories;
    }

    public function setActivityHistories($activityHistories)
    {
        $this->activityHistories = $activityHistories;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function getAttachments()
    {
        return $this->attachments;
    }

    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
        return $this;
    }

    public function getCampaign()
    {
        return $this->campaign;
    }

    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
        return $this;
    }

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
        return $this;
    }

    public function getCloseDate()
    {
        return $this->closeDate;
    }

    public function setCloseDate($closeDate)
    {
        $this->closeDate = $closeDate;
        return $this;
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

    public function getEvents()
    {
        return $this->events;
    }

    public function setEvents($events)
    {
        $this->events = $events;
        return $this;
    }

    public function getFeedSubscriptionsForEntity()
    {
        return $this->feedSubscriptionsForEntity;
    }

    public function setFeedSubscriptionsForEntity($feedSubscriptionsForEntity)
    {
        $this->feedSubscriptionsForEntity = $feedSubscriptionsForEntity;
        return $this;
    }

    public function getFeeds()
    {
        return $this->feeds;
    }

    public function setFeeds($feeds)
    {
        $this->feeds = $feeds;
        return $this;
    }

    public function getFiscal()
    {
        return $this->fiscal;
    }

    public function setFiscal($fiscal)
    {
        $this->fiscal = $fiscal;
        return $this;
    }

    public function getFiscalQuarter()
    {
        return $this->fiscalQuarter;
    }

    public function setFiscalQuarter($fiscalQuarter)
    {
        $this->fiscalQuarter = $fiscalQuarter;
        return $this;
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
        return $this;
    }

    public function getForecastCategoryName()
    {
        return $this->forecastCategoryName;
    }

    public function setForecastCategoryName($forecastCategoryName)
    {
        $this->forecastCategoryName = $forecastCategoryName;
        return $this;
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
        return $this;
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
        return $this;
    }

    public function getLeadSource()
    {
        return $this->leadSource;
    }

    public function setLeadSource($leadSource)
    {
        $this->leadSource = $leadSource;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getNextStep()
    {
        return $this->nextStep;
    }

    public function setNextStep($nextStep)
    {
        $this->nextStep = $nextStep;
        return $this;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    public function getNotesAndAttachments()
    {
        return $this->notesAndAttachments;
    }

    public function setNotesAndAttachments($notesAndAttachments)
    {
        $this->notesAndAttachments = $notesAndAttachments;
        return $this;
    }

    public function getOpenActivities()
    {
        return $this->openActivities;
    }

    public function setOpenActivities($openActivities)
    {
        $this->openActivities = $openActivities;
        return $this;
    }

    public function getOpportunityCompetitors()
    {
        return $this->opportunityCompetitors;
    }

    public function setOpportunityCompetitors($opportunityCompetitors)
    {
        $this->opportunityCompetitors = $opportunityCompetitors;
        return $this;
    }

    public function getOpportunityContactRoles()
    {
        return $this->opportunityContactRoles;
    }

    public function setOpportunityContactRoles($opportunityContactRoles)
    {
        $this->opportunityContactRoles = $opportunityContactRoles;
        return $this;
    }

    public function getOpportunityHistories()
    {
        return $this->opportunityHistories;
    }

    public function setOpportunityHistories($opportunityHistories)
    {
        $this->opportunityHistories = $opportunityHistories;
        return $this;
    }

//    public function getOpportunityLineItems()
//    {
//        return $this->opportunityLineItems;
//    }
//
//    public function setOpportunityLineItems($opportunityLineItems)
//    {
//        $this->opportunityLineItems = $opportunityLineItems;
//        return $this;
//    }

    public function getOpportunityPartnersFrom()
    {
        return $this->opportunityPartnersFrom;
    }

    public function setOpportunityPartnersFrom($opportunityPartnersFrom)
    {
        $this->opportunityPartnersFrom = $opportunityPartnersFrom;
        return $this;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner(User $owner)
    {
        $this->owner = $owner;
        $this->ownerId = $owner->getId();
        return $this;
    }

    public function getOwnerId()
    {
        return $this->ownerId;
    }

    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
        return $this;
    }

    public function getPartners()
    {
        return $this->partners;
    }

    public function setPartners($partners)
    {
        $this->partners = $partners;
        return $this;
    }

    public function getPricebook2()
    {
        return $this->pricebook2;
    }

    public function setPricebook2($pricebook2)
    {
        $this->pricebook2 = $pricebook2;
        return $this;
    }

    public function getPricebook2Id()
    {
        return $this->pricebook2Id;
    }

    public function setPricebook2Id($pricebook2Id)
    {
        $this->pricebook2Id = $pricebook2Id;
        return $this;
    }

    public function getProbability()
    {
        return $this->probability;
    }

    public function setProbability($probability)
    {
        $this->probability = $probability;
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

    public function getStageName()
    {
        return $this->stageName;
    }

    public function setStageName($stageName)
    {
        $this->stageName = $stageName;
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
}