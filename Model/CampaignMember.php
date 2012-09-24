<?php
namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * A campaign member
 *
 * @Salesforce\Object(name="CampaignMember")
 */
class CampaignMember extends AbstractModel
{
    /**
     * @var Campaign
     * @Salesforce\Relation(field="CampaignId", name="Campaign",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Campaign")
     */
    protected $campaign;

    /**
     * @Salesforce\Field(name="CampaignId")
     */
    protected $campaignId;

    /**
     * @var Contact
     * @Salesforce\Relation(field="ContactId", name="Contact",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Contact")
     */
    protected $contact;

    /**
     * @Salesforce\Field(name="ContactId")
     */
    protected $contactId;

    /**
     * @var Lead
     * @Salesforce\Relation(field="LeadId", name="Lead",
     *                      class="Ddeboer\Salesforce\MapperBundle\Model\Lead")
     */
    protected $lead;

    /**
     * @Salesforce\Field(name="LeadId")
     */
    protected $leadId;

    /**
     * @Salesforce\Field(name="Status")
     */
    protected $status;

    /**
     * Get campaign
     *
     * @return Campaign
     * @codeCoverageIgnore
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * Set campaign
     *
     * @param Campaign $campaign
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setCampaign(Campaign $campaign)
    {
        $this->campaign = $campaign;

        return $this;
    }


    /**
     * Get campaign id
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * Set campaign id
     *
     * @param string $campaignI
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

        return $this;
    }

    /**
     * Get contact
     *
     * @return Contact
     * @codeCoverageIgnore
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set contact
     *
     * @param Contact $contact
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact id
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * Set contact id
     *
     * @param string $contactId
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
    }

    /**
     * Get lead
     *
     * @return Lead
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * Set lead
     *
     * @param Lead $lead
     *
     * @return $this
     */
    public function setLead(Lead $lead = null)
    {
        $this->lead = $lead;

        return $this;
    }

    /**
     * Get lead id
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getLeadId()
    {
        return $this->leadId;
    }

    /**
     * Set lead id
     *
     * @param string $leadId
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setLeadId($leadId)
    {
        $this->leadId = $leadId;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}

