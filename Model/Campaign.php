<?php
namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * A campaign
 *
 * @Salesforce\Object(name="Campaign")
 */
class Campaign extends AbstractModel
{
    /**
     * @Salesforce\Field(name="Name")
     */
    protected $name;

    /**
     * @Salesforce\Field(name="StartDate")
     */
    protected $startDate;

    /**
     * @Salesforce\Field(name="EndDate")
     */
    protected $endDate;

    /**
     * @Salesforce\Field(name="Status")
     */
    protected $status;

    /**
     * @Salesforce\Field(name="IsActive")
     */
    protected $isActive;

    /**
     * @Salesforce\Field(name="IsDeleted")
     */
    protected $isDeleted;

    /**
     * @Salesforce\Field(name="ParentId")
     */
    protected $parentId;

    /**
     * @Salesforce\Field(name="Type")
     */
    protected $type;

    /**
     * Get name
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get start date
     *
     * @return \DateTime
     * @codeCoverageIgnore
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set start date
     *
     * @param \DateTime $startDate
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get end date
     *
     * @return \DateTime
     * @codeCoverageIgnore
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set end date
     *
     * @param \DateTime $endDate
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;

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

    /**
     * Is the campaign active?
     *
     * @return boolean
     * @codeCoverageIgnore
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * Set active
     *
     * @param boolean $isActive
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Is deleted?
     *
     * @return boolean
     * @codeCoverageIgnore
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Get parent id
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set parent id
     *
     * @param string $parentId
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return $this
     * @codeCoverageIgnore
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}

