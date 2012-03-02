<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests\Mock;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * @Salesforce\Object(name="Account")
 */
class AccountMock
{
    /**
     * @Salesforce\Field(name="Id")
     */
    protected $id;

    /**
     * @Salesforce\Field(name="Name")
     */
    protected $name;

    /**
     * @Salesforce\Relation(name="AccountContactRoles",
     *  class="Ddeboer\Salesforce\MapperBundle\Tests\Mock\AccountContactRoleMock"
     * )
     */
    protected $accountContactRoles;

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

    public function getAccountContactRoles()
    {
        return $this->accountContactRoles;
    }

    public function setAccountContactRoles($accountContactRoles)
    {
        $this->accountContactRoles = $accountContactRoles;
    }
}