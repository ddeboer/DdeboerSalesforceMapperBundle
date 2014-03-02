<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;
use Serializable;
use DateTime;

/**
 * Layer supertype for Salesforce objects
 *
 * @author David de Boer <david@ddeboer.nl>
 */
abstract class AbstractModel implements Serializable {
{
    /**
     * Object ID
     *
     * @var string
     * @Salesforce\Field(name="Id")
     */
    protected $id;

    /**
     * @var User
     */
    protected $createdBy;

    /**
     * @var string
     */
    protected $createdById;

    /**
     * @var \DateTime
     * @Salesforce\Field(name="CreatedDate")
     */
    protected $createdDate;

    /**
     * @var strng
     * @Salesforce\Field(name="LastModifiedById")
     */
    protected $lastModifiedById;

    /**
     * @var \DateTime
     * @Salesforce\Field(name="LastModifiedDate")
     */
    protected $lastModifiedDate;
    
    /**
     * @var \DateTime
     * @Salesforce\Field(name="SystemModstamp")
     */
    protected $systemModstamp;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @return string
     */
    public function getCreatedById()
    {
        return $this->createdById;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @return string
     */
    public function getLastModifiedById()
    {
        return $this->lastModifiedById;
    }

    /**
     * @return \DateTime
     */
    public function getLastModifiedDate()
    {
        return $this->lastModifiedDate;
    }

    /**
     * @return \DateTime
     */
    public function getSystemModstamp()
    {
        return $this->systemModstamp;
    }

    public function serialize() {
        $vars = array(
            'id' => $this->id,
            'createdBy' => $this->createdBy,
            'createdById' => $this->createdById,
            'createdDate' => $this->createdDate,
            'lastModifiedById' => $this->lastModifiedById,
            'lastModifiedDate' => $this->lastModifiedDate,
            'systemModstamp' => $this->systemModstamp,
            //'addon' => serialize($this->addon)
        );

        return serialize($vars);
    }

    public function unserialize($serialized) {
        $vars = unserialize($serialized);
        $this->id = $vars['id'];
        $this->createdBy = $vars['createdBy'];
        $this->createdById = $vars['createdById'];
        $this->createdDate = $vars['createdDate'];
        $this->lastModifiedById = $vars['lastModifiedById'];
        $this->lastModifiedDate = $vars['lastModifiedDate'];
        $this->systemModstamp = $vars['systemModstamp'];
    }
}