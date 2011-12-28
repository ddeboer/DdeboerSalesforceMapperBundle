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
    protected $body;
    
    /**
     * @var int
     */
    protected $bodyLength;
    
    /**
     * @var string
     */
    protected $contentType;
    
    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsDeleted")
     */
    protected $isDeleted;
    
    /**
     * @var boolean
     */
    protected $isProtected;

    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;
    
    /**
     * @var Name
     * @Salesforce\Relation(field="Owner", class="Ddeboer\Salesforce\MapperBundle\Model\Name")
     */
    protected $owner;
    
    /**
     * @var tnsID
     * @Salesforce\Field(name="OwnerId")
     */
    protected $ownerId;
    
    /**
     * @var Name
     * @Salesforce\Relation(field="Parent", class="Ddeboer\Salesforce\MapperBundle\Model\Name")
     */
    protected $parent;
    
    /**
     * @var string
     * @Salesforce\Field(name="ParentId")
     */
    protected $parentId;

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

    public function getisProtected()
    {
        return $this->isProtected;
    }

    public function setisProtected($isProtected)
    {
        $this->isProtected = $isProtected;
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