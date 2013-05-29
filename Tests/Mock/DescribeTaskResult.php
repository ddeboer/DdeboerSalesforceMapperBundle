<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests\Mock;

use Phpforce\SoapClient\Result\DescribeSObjectResult;
use Phpforce\SoapClient\Result\DescribeSObjectResult\Field;

class DescribeTaskResult extends DescribeSObjectResult
{
    public function __construct()
    {
        $this->fields[] = new FieldId();
        $this->fields[] = new FieldSubject();
    }
}

class FieldSubject extends Field
{
    protected $name = 'Subject';
    protected $createable = true;
    protected $updateable = true;
}