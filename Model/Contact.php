<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Salesforce standard contact object
 *
 * You can extend this class to incorporate custom fields on the object.
 *
 * @Salesforce\Object(name="Contact")
 */
class Contact extends AbstractModel
{   
    /**
     * @var tnsQueryResult
     */
    protected $accountContactRoles;
    
    /**
     * @var tnsQueryResult
     */
    protected $activityHistories;
    
    /**
     * @var tnsQueryResult
     */
    protected $assets;
    
    /**
     * @var string
     */
    protected $assistantName;
    
    /**
     * @var string
     */
    protected $assistantPhone;
    
    /**
     * @var tnsQueryResult
     */
    protected $attachments;
    
    /**
     * @Salesforce\Field(name="Birthdate")
     */
    protected $birthdate;
    
    /**
     * @var tnsQueryResult
     */
    protected $campaignMembers;
    
    /**
     * @var tnsQueryResult
     */
    protected $caseContactRoles;
    
    /**
     * @var tnsQueryResult
     */
    protected $cases;
    
    /**
     * @var tnsQueryResult
     */
    protected $contractContactRoles;
    
    /**
     * @var tnsQueryResult
     */
    protected $contractsSigned;
    
    /**
     * @Salesforce\Field(name="Department")
     */
    protected $department;
    
    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;
    
    /**
     * @var string
     * @Salesforce\Field(name="Email")
     */
    protected $email;
    
    /**
     * @var \DateTime
     * @Salesforce\Field(name="EmailBouncedDate")
     */
    protected $emailBouncedDate;
    
    /**
     * @var string
     * @Salesforce\Field(name="EmailBouncedReason")
     */
    protected $emailBouncedReason;
    
    /**
     * @var tnsQueryResult
     */
    protected $emailStatuses;
    
    /**
     * @var tnsQueryResult
     */
    protected $events;
    
    /**
     * @var string
     * @Salesforce\Field(name="Fax")
     */
    protected $fax;
    
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
     * @Salesforce\Field(name="FirstName")
     */
    protected $firstName;
    
    /**
     * @var tnsQueryResult
     */
    protected $histories;
    
    /**
     * @var string
     * @Salesforce\Field(name="HomePhone")
     */
    protected $homePhone;
    
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
     * @var xsddate
     */
    protected $lastActivityDate;
    
    /**
     * @var xsddateTime
     */
    protected $lastCURequestDate;
    
    /**
     * @var xsddateTime
     */
    protected $lastCUUpdateDate;
    
    /**
     * @var string
     * @Salesforce\Field(name="LastName")
     */
    protected $lastName;
    
    /**
     * @var string
     * @Salesforce\Field(name="LeadSource")
     */
    protected $leadSource;
    
    /**
     * @var string
     * @Salesforce\Field(name="MailingCity")
     */
    protected $mailingCity;
    
    /**
     * @var string
     * @Salesforce\Field(name="MailingCountry")
     */
    protected $mailingCountry;
    
    /**
     * @var string
     * @Salesforce\Field(name="MailingPostalCode")
     */
    protected $mailingPostalCode;
    
    /**
     * @var string
     * @Salesforce\Field(name="MailingState")
     */
    protected $mailingState;
    
    /**
     * @var string
     * @Salesforce\Field(name="MailingStreet")
     */
    protected $mailingStreet;
    
    /**
     * @var Contact
     */
    protected $masterRecord;
    
    /**
     * @var string
     */
    protected $masterRecordId;
    
    /**
     * @var string
     * @Salesforce\Field(name="MobilePhone")
     */
    protected $mobilePhone;
    
    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;
    
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
    protected $opportunities;
    
    /**
     * @var tnsQueryResult
     */
    protected $opportunityContactRoles;
    
    /**
     * @var string
     * @Salesforce\Field(name="OtherCity")
     */
    protected $otherCity;
    
    /**
     * @var string
     * @Salesforce\Field(name="OtherCountry")
     */
    protected $otherCountry;
    
    /**
     * @var string
     * @Salesforce\Field(name="OtherPhone")
     */
    protected $otherPhone;
    
    /**
     * @var string
     * @Salesforce\Field(name="OtherPostalCode")
     */
    protected $otherPostalCode;
    
    /**
     * @var string
     * @Salesforce\Field(name="OtherState")
     */
    protected $otherState;
    
    /**
     * @var string
     * @Salesforce\Field(name="OtherStreet")
     */
    protected $otherStreet;
    
    /**
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
     * @var ensContact
     */
    protected $reportsTo;
    
    /**
     * @var tnsID
     */
    protected $reportsToId;
    
    /**
     * @var string
     * @Salesforce\Field(name="Salutation")
     */
    protected $salutation;
    
    /**
     * @var tnsQueryResult
     */
    protected $shares;
    
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
     * @Salesforce\Field(name="Title")
     */
    protected $title;    

    public function getAccountContactRoles()
    {
        return $this->accountContactRoles;
    }

    public function setAccountContactRoles($accountContactRoles)
    {
        $this->accountContactRoles = $accountContactRoles;
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    public function getActivityHistories()
    {
        return $this->activityHistories;
    }

    public function setActivityHistories($activityHistories)
    {
        $this->activityHistories = $activityHistories;
    }

    public function getAssets()
    {
        return $this->assets;
    }

    public function setAssets($assets)
    {
        $this->assets = $assets;
    }

    public function getAssistantName()
    {
        return $this->assistantName;
    }

    public function setAssistantName($assistantName)
    {
        $this->assistantName = $assistantName;
    }

    public function getAssistantPhone()
    {
        return $this->assistantPhone;
    }

    public function setAssistantPhone($assistantPhone)
    {
        $this->assistantPhone = $assistantPhone;
    }

    public function getAttachments()
    {
        return $this->attachments;
    }

    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    public function getCampaignMembers()
    {
        return $this->campaignMembers;
    }

    public function setCampaignMembers($campaignMembers)
    {
        $this->campaignMembers = $campaignMembers;
    }

    public function getCaseContactRoles()
    {
        return $this->caseContactRoles;
    }

    public function setCaseContactRoles($caseContactRoles)
    {
        $this->caseContactRoles = $caseContactRoles;
    }

    public function getCases()
    {
        return $this->cases;
    }

    public function setCases($cases)
    {
        $this->cases = $cases;
    }

    public function getContractContactRoles()
    {
        return $this->contractContactRoles;
    }

    public function setContractContactRoles($contractContactRoles)
    {
        $this->contractContactRoles = $contractContactRoles;
    }

    public function getContractsSigned()
    {
        return $this->contractsSigned;
    }

    public function setContractsSigned($contractsSigned)
    {
        $this->contractsSigned = $contractsSigned;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment($department)
    {
        $this->department = $department;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmailBouncedDate()
    {
        return $this->emailBouncedDate;
    }

    public function setEmailBouncedDate($emailBouncedDate)
    {
        $this->emailBouncedDate = $emailBouncedDate;
    }

    public function getEmailBouncedReason()
    {
        return $this->emailBouncedReason;
    }

    public function setEmailBouncedReason($emailBouncedReason)
    {
        $this->emailBouncedReason = $emailBouncedReason;
    }

    public function getEmailStatuses()
    {
        return $this->emailStatuses;
    }

    public function setEmailStatuses($emailStatuses)
    {
        $this->emailStatuses = $emailStatuses;
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function setEvents($events)
    {
        $this->events = $events;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function setFax($fax)
    {
        $this->fax = $fax;
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

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getHistories()
    {
        return $this->histories;
    }

    public function setHistories($histories)
    {
        $this->histories = $histories;
    }

    public function getHomePhone()
    {
        return $this->homePhone;
    }

    public function setHomePhone($homePhone)
    {
        $this->homePhone = $homePhone;
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

    public function getLastCURequestDate()
    {
        return $this->lastCURequestDate;
    }

    public function setLastCURequestDate($lastCURequestDate)
    {
        $this->lastCURequestDate = $lastCURequestDate;
    }

    public function getLastCUUpdateDate()
    {
        return $this->lastCUUpdateDate;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLeadSource()
    {
        return $this->leadSource;
    }

    public function setLeadSource($leadSource)
    {
        $this->leadSource = $leadSource;
    }

    public function getMailingCity()
    {
        return $this->mailingCity;
    }

    public function setMailingCity($mailingCity)
    {
        $this->mailingCity = $mailingCity;
    }

    public function getMailingCountry()
    {
        return $this->mailingCountry;
    }

    public function setMailingCountry($mailingCountry)
    {
        $this->mailingCountry = $mailingCountry;
    }

    public function getMailingPostalCode()
    {
        return $this->mailingPostalCode;
    }

    public function setMailingPostalCode($mailingPostalCode)
    {
        $this->mailingPostalCode = $mailingPostalCode;
    }

    public function getMailingState()
    {
        return $this->mailingState;
    }

    public function setMailingState($mailingState)
    {
        $this->mailingState = $mailingState;
    }

    public function getMailingStreet()
    {
        return $this->mailingStreet;
    }

    public function setMailingStreet($mailingStreet)
    {
        $this->mailingStreet = $mailingStreet;
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

    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;
    }

    public function getName()
    {
        return $this->name;
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

    public function getOpportunities()
    {
        return $this->opportunities;
    }

    public function setOpportunities($opportunities)
    {
        $this->opportunities = $opportunities;
    }

    public function getOpportunityContactRoles()
    {
        return $this->opportunityContactRoles;
    }

    public function setOpportunityContactRoles($opportunityContactRoles)
    {
        $this->opportunityContactRoles = $opportunityContactRoles;
    }

    public function getOtherCity()
    {
        return $this->otherCity;
    }

    public function setOtherCity($otherCity)
    {
        $this->otherCity = $otherCity;
    }

    public function getOtherCountry()
    {
        return $this->otherCountry;
    }

    public function setOtherCountry($otherCountry)
    {
        $this->otherCountry = $otherCountry;
    }

    public function getOtherPhone()
    {
        return $this->otherPhone;
    }

    public function setOtherPhone($otherPhone)
    {
        $this->otherPhone = $otherPhone;
    }

    public function getOtherPostalCode()
    {
        return $this->otherPostalCode;
    }

    public function setOtherPostalCode($otherPostalCode)
    {
        $this->otherPostalCode = $otherPostalCode;
    }

    public function getOtherState()
    {
        return $this->otherState;
    }

    public function setOtherState($otherState)
    {
        $this->otherState = $otherState;
    }

    public function getOtherStreet()
    {
        return $this->otherStreet;
    }

    public function setOtherStreet($otherStreet)
    {
        $this->otherStreet = $otherStreet;
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

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
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

    public function getReportsTo()
    {
        return $this->reportsTo;
    }

    public function setReportsTo($reportsTo)
    {
        $this->reportsTo = $reportsTo;
    }

    public function getReportsToId()
    {
        return $this->reportsToId;
    }

    public function setReportsToId($reportsToId)
    {
        $this->reportsToId = $reportsToId;
    }

    public function getSalutation()
    {
        return $this->salutation;
    }

    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
    }

    public function getShares()
    {
        return $this->shares;
    }

    public function setShares($shares)
    {
        $this->shares = $shares;
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

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

}