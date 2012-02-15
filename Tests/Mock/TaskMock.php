<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests\Mock;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * @Salesforce\Object(name="Task")
 */
class TaskMock
{
    /**
     * @var string
     * @Salesforce\Field(name="Id")
     */
    protected $id;

    /**
     * @var string
     * @Salesforce\Field(name="Subject")
     */
    protected $subject;

    public function getId()
    {
        return $this->id;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
}