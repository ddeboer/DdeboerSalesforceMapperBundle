<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests\Mock;

use Accelerate\SoapClient\Result\SaveResult;

class SaveResultMock extends SaveResult
{
    public function setId($id)
    {
        $this->id = $id;
    }
}
