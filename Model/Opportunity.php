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
     * @Salesforce\Relation(field="Account", class="Ddeboer\Salesforce\MapperBundle\Model\Account")
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
        return $this->Account;
    }

    public function setAccount(Account $account)
    {
        $this->Account = $account;
        $this->AccountId = $account->getId();
    }

    public function getAccountId()
    {
        return $this->AccountId;
    }

    public function setAccountId($accountId)
    {
        $this->AccountId = $accountId;
    }

    public function getAccountPartners()
    {
        return $this->AccountPartners;
    }

    public function setAccountPartners($accountPartners)
    {
        $this->AccountPartners = $accountPartners;
    }

    public function getActivityHistories()
    {
        return $this->ActivityHistories;
    }

    public function setActivityHistories($activityHistories)
    {
        $this->ActivityHistories = $activityHistories;
    }

    public function getAmount()
    {
        return $this->Amount;
    }

    public function setAmount($amount)
    {
        $this->Amount = $amount;
    }

    public function getAttachments()
    {
        return $this->Attachments;
    }

    public function setAttachments($attachments)
    {
        $this->Attachments = $attachments;
    }

    public function getCampaign()
    {
        return $this->Campaign;
    }

    public function setCampaign($campaign)
    {
        $this->Campaign = $campaign;
    }

    public function getCampaignId()
    {
        return $this->CampaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->CampaignId = $campaignId;
    }

    public function getCloseDate()
    {
        return $this->CloseDate;
    }

    public function setCloseDate($closeDate)
    {
        $this->CloseDate = $closeDate;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function setDescription($description)
    {
        $this->Description = $description;
    }

    public function getEvents()
    {
        return $this->Events;
    }

    public function setEvents($events)
    {
        $this->Events = $events;
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
        return $this->Name;
    }

    public function setName($name)
    {
        $this->Name = $name;
    }

    public function getNextStep()
    {
        return $this->NextStep;
    }

    public function setNextStep($nextStep)
    {
        $this->NextStep = $nextStep;
    }

    public function getNotes()
    {
        return $this->Notes;
    }

    public function setNotes($notes)
    {
        $this->Notes = $notes;
    }

    public function getNotesAndAttachments()
    {
        return $this->NotesAndAttachments;
    }

    public function setNotesAndAttachments($notesAndAttachments)
    {
        $this->NotesAndAttachments = $notesAndAttachments;
    }

    public function getOpenActivities()
    {
        return $this->OpenActivities;
    }

    public function setOpenActivities($openActivities)
    {
        $this->OpenActivities = $openActivities;
    }

    public function getOpportunityCompetitors()
    {
        return $this->OpportunityCompetitors;
    }

    public function setOpportunityCompetitors($opportunityCompetitors)
    {
        $this->OpportunityCompetitors = $opportunityCompetitors;
    }

    public function getOpportunityContactRoles()
    {
        return $this->OpportunityContactRoles;
    }

    public function setOpportunityContactRoles($opportunityContactRoles)
    {
        $this->OpportunityContactRoles = $opportunityContactRoles;
    }

    public function getOpportunityHistories()
    {
        return $this->OpportunityHistories;
    }

    public function setOpportunityHistories($opportunityHistories)
    {
        $this->OpportunityHistories = $opportunityHistories;
    }

    public function getOpportunityLineItems()
    {
        return $this->OpportunityLineItems;
    }

    public function setOpportunityLineItems($opportunityLineItems)
    {
        $this->OpportunityLineItems = $opportunityLineItems;
    }

    public function getOpportunityPartnersFrom()
    {
        return $this->OpportunityPartnersFrom;
    }

    public function setOpportunityPartnersFrom($opportunityPartnersFrom)
    {
        $this->OpportunityPartnersFrom = $opportunityPartnersFrom;
    }

    public function getOwner()
    {
        return $this->Owner;
    }

    public function setOwner(User $owner)
    {
        $this->Owner = $owner;
        $this->OwnerId = $owner->getId();
    }

    public function getOwnerId()
    {
        return $this->OwnerId;
    }

    public function setOwnerId($ownerId)
    {
        $this->OwnerId = $ownerId;
    }

    public function getPartners()
    {
        return $this->Partners;
    }

    public function setPartners($partners)
    {
        $this->Partners = $partners;
    }

    public function getPricebook2()
    {
        return $this->Pricebook2;
    }

    public function setPricebook2($pricebook2)
    {
        $this->Pricebook2 = $pricebook2;
    }

    public function getPricebook2Id()
    {
        return $this->Pricebook2Id;
    }

    public function setPricebook2Id($pricebook2Id)
    {
        $this->Pricebook2Id = $pricebook2Id;
    }

    public function getProbability()
    {
        return $this->Probability;
    }

    public function setProbability($probability)
    {
        $this->Probability = $probability;
    }

    public function getProcessInstances()
    {
        return $this->ProcessInstances;
    }

    public function setProcessInstances($processInstances)
    {
        $this->ProcessInstances = $processInstances;
    }

    public function getProcessSteps()
    {
        return $this->ProcessSteps;
    }

    public function setProcessSteps($processSteps)
    {
        $this->ProcessSteps = $processSteps;
    }

    public function getRecordType()
    {
        return $this->RecordType;
    }

    public function setRecordType($recordType)
    {
        $this->RecordType = $recordType;
    }

    public function getRecordTypeId()
    {
        return $this->RecordTypeId;
    }

    public function setRecordTypeId($recordTypeId)
    {
        $this->RecordTypeId = $recordTypeId;
    }

    public function getShares()
    {
        return $this->Shares;
    }

    public function setShares($shares)
    {
        $this->Shares = $shares;
    }

    public function getStageName()
    {
        return $this->StageName;
    }

    public function setStageName($stageName)
    {
        $this->StageName = $stageName;
    }

    public function getTags()
    {
        return $this->Tags;
    }

    public function setTags($tags)
    {
        $this->Tags = $tags;
    }

    public function getTasks()
    {
        return $this->Tasks;
    }

    public function setTasks($tasks)
    {
        $this->Tasks = $tasks;
    }

    public function getType()
    {
        return $this->Type;
    }

    public function setType($type)
    {
        $this->Type = $type;
    }
}