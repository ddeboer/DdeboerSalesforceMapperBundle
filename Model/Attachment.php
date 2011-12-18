<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * An attachment in Salesforce
 * 
 * @Salesforce\Object(name="Attachment")
 */
class Attachment extends AbstractModel
{   
    /**
     * @var string
     * @Salesforce\Field(name="Body")  
     */
    private $body;
    
    /**
     * @var int
     */
    private $bodyLength;
    
    /**
     * @var string
     */
    private $contentType;
    
    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    private $description;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsDeleted")
     */
    private $isDeleted;
    
    /**
     * @var boolean
     */
    private $isPrivate;

    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    private $name;
    
    /**
     * @var Name
     * @Salesforce\Relation(field="Owner", class="Ddeboer\Salesforce\MapperBundle\Model\Name")
     */
    private $owner;
    
    /**
     * @var tnsID
     * @Salesforce\Field(name="OwnerId")
     */
    private $ownerId;
    
    /**
     * @var Name
     * @Salesforce\Relation(field="Parent", class="Ddeboer\Salesforce\MapperBundle\Model\Name")
     */
    private $parent;
    
    /**
     * @var string
     * @Salesforce\Field(name="ParentId")
     */
    private $parentId;

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getBodyLength()
    {
        return $this->bodyLength;
    }

    public function setBodyLength($bodyLength)
    {
        $this->bodyLength = $bodyLength;
    }

    public function getContentType()
    {
        return $this->contentType;
    }

    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    public function getIsPrivate()
    {
        return $this->isPrivate;
    }

    public function setIsPrivate($isPrivate)
    {
        $this->isPrivate = $isPrivate;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner)
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

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function getParentId()
    {
        return $this->parentId;
    }

    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }
}