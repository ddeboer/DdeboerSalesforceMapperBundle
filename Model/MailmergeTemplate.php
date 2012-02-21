<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;
use Ddeboer\Salesforce\MapperBundle\Response\MappedRecordIterator;

/**
 * Salesforce standard account object
 *
 * You can extend this class to incorporate custom fields on the object.
 *
 * @Salesforce\Object(name="MailmergeTemplate")
 */
class MailmergeTemplate extends AbstractModel
{
    /**
     * @var string
     * @Salesforce\Field(name="Body")
     */
    protected $body;

    /**
     * @var int
     * @Salesforce\Field(name="BodyLength")
     */
    protected $bodyLength;

    /**
     * @var string
     * @Salesforce\Field(name="Category")
     */
    protected $category;

    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;

    /**
     * @var string
     * @Salesforce\Field(name="Filename")
     */
    protected $filename;

    /**
     * @var boolean
     * @Salesforce\Field(name="IsDeleted")
     */
    protected $isDeleted;

    /**
     * @var string
     * @Salesforce\Field(name="LastUsedDate")
     */
    protected $lastUsedDate;

    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;

    public function getBodyLength()
    {
        return $this->bodyLength;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    }

    public function getLastUsedDate()
    {
        return $this->lastUsedDate;
    }

    public function setLastUsedDate($lastUsedDate)
    {
        $this->lastUsedDate = $lastUsedDate;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}