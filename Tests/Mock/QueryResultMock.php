<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests\Mock;

use Accelerate\SoapClient\Result\QueryResult;

class QueryResultMock extends QueryResult
{
    protected $done = true;

    public function setSize($size)
    {
        $this->size = $size;
    }
}
