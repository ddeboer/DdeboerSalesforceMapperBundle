<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;
use Ddeboer\Salesforce\MapperBundle\Response\MappedRecordIterator;

/**
 * Salesforce standard email template object
 *
 * You can extend this class to incorporate custom fields on the object.
 *
 * @Salesforce\Object(name="EmailTemplate")
 */
class EmailTemplate extends AbstractModel
{
    /**
     * @var string
     * @Salesforce\Field(name="Body")
     */
    protected $body;

    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;

    /**
     * @var string
     * @Salesforce\Field(name="DeveloperName")
     */
    protected $developerName;

    /**
     * @var string
     * @Salesforce\Field(name="HtmlValue")
     */
    protected $htmlValue;
    
    /**
     * @var string
     * @Salesforce\Field(name="Subject")
     */
    protected $subject;

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getHtmlValue()
    {
        return $this->htmlValue;
    }

    public function setHtmlValue($htmlValue)
    {
        $this->htmlValue = $htmlValue;
    }

    public function getDeveloperName()
    {
        return $this->developerName;
    }

    public function setDeveloperName($developerName)
    {
        $this->developerName = $developerName;
    }
}