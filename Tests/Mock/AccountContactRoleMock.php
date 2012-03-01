<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests\Mock;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * @Salesforce\Object(name="AccountContactRole")
 */
class AccountContactRoleMock
{
    /**
     * @Salesforce\Field(name="Id")
     */
    protected $id;

    /**
     * @Salesforce\Relation(field="AccountId", name="Account",
     *   class="Ddeboer\Salesforce\MapperBundle\Tests\Mock\AccountMock"
     * )
     */
    protected $account;

    /**
     * @Salesforce\Relation(field="ContactId", name="Contact",
     *   class="Ddeboer\Salesforce\MapperBundle\Tests\Mock\ContactMock"
     * )
     */
    protected $contact;
}