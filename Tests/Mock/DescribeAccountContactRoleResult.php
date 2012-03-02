<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests\Mock;

use Ddeboer\Salesforce\ClientBundle\Response\DescribeSObjectResult;
use Ddeboer\Salesforce\ClientBundle\Response\Field;

class DescribeAccountContactRoleResult extends DescribeSObjectResult
{
    public function __construct()
    {
        $this->fields[] = new FieldAccount();
        $this->fields[] = new FieldContact();
    }
}

class FieldAccount extends Field
{
    protected $name = 'AccountId';
    protected $relationshipName = 'Account';
    protected $referenceTo = array('Account');
    protected $createable = true;
    protected $updateable = false;
}

class FieldContact extends Field
{
    protected $name = 'ContactId';
    protected $relationshipName = 'Contact';
    protected $referenceTo = array('Contact');
    protected $createable = true;
    protected $updateable = true;
}