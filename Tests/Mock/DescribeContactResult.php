<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests\Mock;

use Phpforce\SoapClient\Result\DescribeSObjectResult;
use Phpforce\SoapClient\Result\DescribeSObjectResult\Field;

class DescribeContactResult extends DescribeSObjectResult
{
    public function __construct()
    {
        $this->fields[] = new FieldContactId();
        $this->fields[] = new FieldContactFirstName();
        $this->fields[] = new FieldContactLastName();
    }
}

class FieldContactId extends Field
{
    protected $name = 'Id';
    protected $createable = true;
    protected $updateable = true;
}

class FieldContactFirstName extends Field
{
    protected $name = 'FirstName';
    protected $createable = true;
    protected $updateable = true;
}

class FieldContactLastName extends Field
{
    protected $name = 'LastName';
    protected $createable = true;
    protected $updateable = true;
}