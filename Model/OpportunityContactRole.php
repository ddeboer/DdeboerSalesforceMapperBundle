<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Opportunity contact role
 *
 * @Salesforce\Object(name="OpportunityContactRole")
 */
class OpportunityContactRole extends AbstractModel
{
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
     * @var Opportunity
     * @Salesforce\Relation(field="OpportunityId", name="Opportunity",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Opportunity")
     */
    protected $opportunity;
    
    /**
     * @var string
     * @Salesforce\Field(name="OpportunityId")
     */
    protected $opportunityId;
    
    /**
     * @var string
     * @Salesforce\Field(name="Role")
     */
    protected $role;
    
    public function getContact()
    {
        return $this->contact;
    }

    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
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

    public function getOpportunity()
    {
        return $this->opportunity;
    }

    public function setOpportunity($opportunity)
    {
        $this->opportunity = $opportunity;
        $this->opportunityId = $opportunity->getId();
    }

    public function getOpportunityId()
    {
        return $this->opportunityId;
    }

    public function setOpportunityId($opportunityId)
    {
        $this->opportunityId = $opportunityId;
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