<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Salesforce standard task object
 * 
 * @Salesforce\Object(name="Task")
 */
class Task extends AbstractModel
{  
    /**
     * @var Account
     * @Salesforce\Relation(field="Account", class="Ddeboer\Salesforce\MapperBundle\Model\Account")
     */
    protected $account;
    
    /**
     * @var string
     * @Salesforce\Field(name="AccountId")
     */
    protected $accountId;
    
    /**
     * @var \DateTime
     * @Salesforce\Field(name="ActivityDate")
     */
    protected $activityDate;
    
    /**
     * @var tnsQueryResult
     */
    protected $attachments;
    
    /**
     * @var string
     */
    protected $callDisposition;
    
    /**
     * @var xsdint
     */
    protected $callDurationInSeconds;
    
    /**
     * @var string
     */
    protected $callObject;
    
    /**
     * @var string
     */
    protected $callType;
    
    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;
    
    /**
     * @var tnsQueryResult
     */
    protected $feedSubscriptionsForEntity;
    
    /**
     * @var tnsQueryResult
     */
    protected $feeds;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsArchived")
     */
    protected $isArchived;
    
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
     * @Salesforce\Field(name="IsRecurrence")
     */
    protected $isRecurrence;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsReminderSet")
     */
    protected $isReminderSet;
    
    /**
     * @var Name
     * @Salesforce\Relation(field="Owner", class="Ddeboer\Salesforce\MapperBundle\Model\Name")
     */
    protected $owner;
    
    /**
     * @var string
     * @Salesforce\Field(name="OwnerId")
     */
    protected $ownerId;
    
    /**
     * @var string
     * @Salesforce\Field(name="Priority")
     */
    protected $priority;
    
    /**
     * @var string
     */
    protected $recurrenceActivityId;
    
    /**
     * @var int
     */
    protected $recurrenceDayOfMonth;
    
    /**
     * @var int
     */
    protected $recurrenceDayOfWeekMask;
    
    /**
     * @var \DateTime
     */
    protected $recurrenceEndDateOnly;
    
    /**
     * @var string
     */
    protected $recurrenceInstance;
    
    /**
     * @var xsdint
     */
    protected $recurrenceInterval;
    
    /**
     * @var string
     */
    protected $recurrenceMonthOfYear;
    
    /**
     * @var xsddate
     */
    protected $recurrenceStartDateOnly;
    
    /**
     * @var string
     */
    protected $recurrenceTimeZoneSidKey;
    
    /**
     * @var string
     */
    protected $recurrenceType;
    
    /**
     * @var tnsQueryResult
     */
    protected $recurringTasks;
    
    /**
     * @var \DateTime
     * @Salesforce\Field(name="ReminderDateTime")
     */
    protected $reminderDateTime;
    
    /**
     * @var string
     * @Salesforce\Field(name="Status")
     */
    protected $status;
    
    /**
     * @var string
     * @Salesforce\Field(name="Subject")
     */
    protected $subject;
    
    /**
     * @var tnsQueryResult
     */
    protected $tags;
    
    /**
     * @var Name
     * @Salesforce\Relation(field="What", class="Ddeboer\Salesforce\MapperBundle\Model\Name")
     */
    protected $what;
    
    /**
     * @var string
     * @Salesforce\Field(name="WhatId")
     */
    protected $whatId;
    
    /**
     * @var Name
     * @Salesforce\Relation(field="Who", class="Ddeboer\Salesforce\MapperBundle\Model\Name")
     */
    protected $who;
    
    /**
     * @var string
     * @Salesforce\Field(name="WhoId")
     */
    protected $whoId;

    public function getAccount()
    {
        return $this->account;
    }

    public function setAccount(Account $account)
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

    public function getActivityDate()
    {
        return $this->activityDate;
    }

    public function setActivityDate(\DateTime $activityDate)
    {
        $this->activityDate = $activityDate;
    }

    public function getAttachments()
    {
        return $this->attachments;
    }

    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
    }

    public function getCallDisposition()
    {
        return $this->callDisposition;
    }

    public function setCallDisposition($callDisposition)
    {
        $this->callDisposition = $callDisposition;
    }

    public function getCallDurationInSeconds()
    {
        return $this->callDurationInSeconds;
    }

    public function setCallDurationInSeconds($callDurationInSeconds)
    {
        $this->callDurationInSeconds = $callDurationInSeconds;
    }

    public function getCallObject()
    {
        return $this->callObject;
    }

    public function setCallObject($callObject)
    {
        $this->callObject = $callObject;
    }

    public function getCallType()
    {
        return $this->callType;
    }

    public function setCallType($callType)
    {
        $this->callType = $callType;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
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

    public function isArchived()
    {
        return $this->isArchived;
    }

    public function isClosed()
    {
        return $this->isClosed;
    }

    public function isDeleted()
    {
        return $this->isDeleted;
    }

    public function isRecurrence()
    {
        return $this->isRecurrence;
    }

    public function isReminderSet()
    {
        return $this->isReminderSet;
    }

    public function setIsReminderSet($isReminderSet)
    {
        $this->isReminderSet = $isReminderSet;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner(Name $owner)
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

    public function getPriority()
    {
        return $this->priority;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    public function getRecurrenceActivityId()
    {
        return $this->recurrenceActivityId;
    }

    public function setRecurrenceActivityId($recurrenceActivityId)
    {
        $this->recurrenceActivityId = $recurrenceActivityId;
    }

    public function getRecurrenceDayOfMonth()
    {
        return $this->recurrenceDayOfMonth;
    }

    public function setRecurrenceDayOfMonth($recurrenceDayOfMonth)
    {
        $this->recurrenceDayOfMonth = $recurrenceDayOfMonth;
    }

    public function getRecurrenceDayOfWeekMask()
    {
        return $this->recurrenceDayOfWeekMask;
    }

    public function setRecurrenceDayOfWeekMask($recurrenceDayOfWeekMask)
    {
        $this->recurrenceDayOfWeekMask = $recurrenceDayOfWeekMask;
    }

    public function getRecurrenceEndDateOnly()
    {
        return $this->recurrenceEndDateOnly;
    }

    public function setRecurrenceEndDateOnly($recurrenceEndDateOnly)
    {
        $this->recurrenceEndDateOnly = $recurrenceEndDateOnly;
    }

    public function getRecurrenceInstance()
    {
        return $this->recurrenceInstance;
    }

    public function setRecurrenceInstance($recurrenceInstance)
    {
        $this->recurrenceInstance = $recurrenceInstance;
    }

    public function getRecurrenceInterval()
    {
        return $this->recurrenceInterval;
    }

    public function setRecurrenceInterval($recurrenceInterval)
    {
        $this->recurrenceInterval = $recurrenceInterval;
    }

    public function getRecurrenceMonthOfYear()
    {
        return $this->recurrenceMonthOfYear;
    }

    public function setRecurrenceMonthOfYear($recurrenceMonthOfYear)
    {
        $this->recurrenceMonthOfYear = $recurrenceMonthOfYear;
    }

    public function getRecurrenceStartDateOnly()
    {
        return $this->recurrenceStartDateOnly;
    }

    public function setRecurrenceStartDateOnly($recurrenceStartDateOnly)
    {
        $this->recurrenceStartDateOnly = $recurrenceStartDateOnly;
    }

    public function getRecurrenceTimeZoneSidKey()
    {
        return $this->recurrenceTimeZoneSidKey;
    }

    public function setRecurrenceTimeZoneSidKey($recurrenceTimeZoneSidKey)
    {
        $this->recurrenceTimeZoneSidKey = $recurrenceTimeZoneSidKey;
    }

    public function getRecurrenceType()
    {
        return $this->recurrenceType;
    }

    public function setRecurrenceType($recurrenceType)
    {
        $this->recurrenceType = $recurrenceType;
    }

    public function getRecurringTasks()
    {
        return $this->recurringTasks;
    }

    public function setRecurringTasks($recurringTasks)
    {
        $this->recurringTasks = $recurringTasks;
    }

    public function getReminderDateTime()
    {
        return $this->reminderDateTime;
    }

    public function setReminderDateTime(\DateTime $reminderDateTime)
    {
        $this->reminderDateTime = $reminderDateTime;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getWhat()
    {
        return $this->what;
    }

    public function setWhat(AbstractModel $what)
    {
        $this->what = $what;
        $this->whatId = $what->getId();
    }

    public function getWhatId()
    {
        return $this->whatId;
    }

    public function setWhatId($whatId)
    {
        $this->whatId = $whatId;
    }

    public function getWho()
    {
        return $this->who;
    }

    public function setWho(AbstractModel $who)
    {
        $this->who = $who;
        $this->whoId = $who->getId();
    }

    public function getWhoId()
    {
        return $this->whoId;
    }

    public function setWhoId($whoId)
    {
        $this->whoId = $whoId;
    }
}