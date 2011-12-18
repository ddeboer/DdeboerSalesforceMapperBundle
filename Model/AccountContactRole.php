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
     * @Salesforce\Relation(field="Account", class="Ddeboer\Salesforce\MapperBundle\Model\Account")
     */
    protected $account;
    
    /**
     * @var string
     * @Salesforce\Field(name="AccountId")
     */
    protected $accountId;
    
    /**
     * @var Contact
     * @Salesforce\Relation(field="Contact", class="Ddeboer\Salesforce\MapperBundle\Model\Contact")
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
     * @var xsdboolean
     * 
     * @Salesforce\Field(name="IsPrimary")
     */
    protected $isPrimary;
    
    /**
     * @var xsdstring
     * 
     * @Salesforce\Field(name="Role")
     */
    protected $role;

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

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;
        $this->contactId = $contact->getId();
    }

    public function getContactId()
    {
        return $this->contactId;
    }

    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
    }

    public function isDeleted()
    {
        return $this->isDeleted;
    }

    public function isPrimary()
    {
        return $this->isPrimary;
    }

    public function setIsPrimary($isPrimary)
    {
        $this->isPrimary = $isPrimary;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }
}
