<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;
use Ddeboer\Salesforce\MapperBundle\Response\MappedRecordIterator;

/**
 * Salesforce standard account object
 * 
 * You can extend this class to incorporate custom fields on the object.
 * 
 * @Salesforce\Object(name="ActivityHistory")
 */
class ActivityHistory extends AbstractModel
{
    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;

    /**
     * @var DateTime
     * @Salesforce\Field(name="EndDateTime")
     */
    protected $endDateTime;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsTask")
     */
    protected $isTask;
    
    /**
     * @var string
     * @Salesforce\Field(name="Priority")
     */
    protected $priority;
    
    /**
     * @var DateTime
     * @Salesforce\Field(name="StartDateTime")
     */
    protected $startDateTime;
    
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
     * @var Name
     * @Salesforce\Relation(field="WhatId", name="What",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Name")
     */
    protected $what;
    
    /**
     * @var string
     * @Salesforce\Field(name="WhatId")
     */
    protected $whatId;
    
    /**
     * @var Name
     * @Salesforce\Relation(field="WhoId", name="Who",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Name")
     */
    protected $who;
    
    /**
     * @var string
     * @Salesforce\Field(name="WhoId")
     */
    protected $whoId;
    
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getEndDateTime()
    {
        return $this->endDateTime;
    }

    public function setEndDateTime($endDateTime)
    {
        $this->endDateTime = $endDateTime;
    }

    public function getIsTask()
    {
        return $this->isTask;
    }

    public function setIsTask($isTask)
    {
        $this->isTask = $isTask;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    public function setStartDateTime($startDateTime)
    {
        $this->startDateTime = $startDateTime;
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

    public function getWhat()
    {
        return $this->what;
    }

    public function setWhat($what)
    {
        $this->what = $what;
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

    public function setWho($who)
    {
        $this->who = $who;
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