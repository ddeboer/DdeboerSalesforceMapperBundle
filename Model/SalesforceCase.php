<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Salesforce standard task object
 *
 * @Salesforce\Object(name="Case")
 */
class SalesforceCase extends AbstractModel
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
     * @Salesforce\Field(name="Status")
     */
    protected $status;

    /**
     * @var string
     * @Salesforce\Field(name="Subject")
     */
    protected $subject;

    /**
     * @Salesforce\Field(name="ContactId")
     */
    protected $contactId;
    
    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;
    
    /**
     * @var User
     * @Salesforce\Relation(field="OwnerId", name="Owner",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\User")
     */
    //protected $owner;

    /**
     * @var string
     * @Salesforce\Field(name="OwnerId")
     */
    protected $ownerId;
    
    public function getAccount() {
        return $this->account;
    }

    public function setAccount($account) {
        $this->account = $account;
    }

    public function getAccountId() {
        return $this->accountId;
    }

    public function setAccountId($accountId) {
        $this->accountId = $accountId;
    }

    public function getStatus()
    {
        return $this->status;
    }
    
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
    
    public function getSubject()
    {
        return $this->subject;
    }
    
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function getContactId() {
        return $this->contactId;
    }

    public function setContactId($contactId) {
        $this->contactId = $contactId;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

//    public function getOwner() {
//        return $this->owner;
//    }
//
//    public function setOwner($owner) {
//        $this->owner = $owner;
//    }

    public function getOwnerId() {
        return $this->ownerId;
    }

    public function setOwnerId($ownerId) {
        $this->ownerId = $ownerId;
    }

}