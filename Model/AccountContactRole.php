<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Salesforce standard account contact role object
 *
 * You can extend this class to incorporate custom fields on the object.
 *
 * @Salesforce\Object(name="AccountContactRole")
 */
class AccountContactRole extends AbstractModel
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
     * @var Contact
     * @Salesforce\Relation(field="ContactId", name="Contact",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Contact")
     */
    protected $contact;
    
    /**
     * @var string
     * @Salesforce\Field(name="ContactId")
     */
    protected $contactId;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsDeleted")
     */
    protected $isDeleted;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsPrimary")
     */
    protected $isPrimary;
    
    /**
     * @var string
     * @Salesforce\Field(name="Role")
     */
    protected $role;

    /**
     * Get account
     *
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set account
     *
     * @param Account $account
     */
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

    /**
     * Get contact
     * 
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set contact
     *
     * @param Contact $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
        $this->contactId = $contact->getId();
        return $this;
    }

    public function getContactId()
    {
        return $this->contactId;
    }

    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
        return $this;
    }

    /**
     * Get is deleted
     * 
     * @return boolean
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Get is primary
     *
     * @return boolean
     */
    public function isPrimary()
    {
        return $this->isPrimary;
    }

    /**
     * Set is primary
     *
     * @param boolean $isPrimary
     */
    public function setIsPrimary($isPrimary)
    {
        $this->isPrimary = $isPrimary;
        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set role
     *
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }
}
