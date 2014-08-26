<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use DateTime;
use Serializable;
use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;
use Ddeboer\Salesforce\MapperBundle\Response\MappedRecordIterator;

/**
 * Layer supertype for Salesforce objects
 *
 * @author David de Boer <david@ddeboer.nl>
 */
abstract class AbstractModel implements Serializable
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
    
    /**
     * 
     * @return string
     */
    public function serialize()
    {
        $serialized = array();
        
        foreach ($this as $name => $value) {
            if ($value instanceof MappedRecordIterator) {
                $value = $value->toArray();
            }
            
            $serialized[$name] = $value;
        }
        
        return serialize($serialized);
    }
    
    /**
     * 
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        foreach (unserialize($serialized) as $name => $value) {
            $this->$name = $value;
        }
    }

}
