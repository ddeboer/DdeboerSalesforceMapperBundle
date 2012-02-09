<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests\Mock;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * @Salesforce\Object(name="Account")
 */
class AccountMock
{
    /**
     * @var string
     * @Salesforce\Field(name="Id")
     */
    protected $id;

    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;

    public function getId()
    {
        return $this->id;
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