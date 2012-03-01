<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests\Mock;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * @Salesforce\Object(name="Contact")
 */
class ContactMock
{
    /**
     * @Salesforce\Field(name="Id")
     */
    protected $id;

    /**
     * @Salesforce\Field(name="FirstName")
     */
    protected $firstName;

    /**
     * @Salesforce\Field(name="LastName")
     */
    protected $lastName;
}