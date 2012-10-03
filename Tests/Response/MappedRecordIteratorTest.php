<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests\Response;

use Ddeboer\Salesforce\MapperBundle\Response\MappedRecordIterator;
use Ddeboer\Salesforce\ClientBundle\Response\RecordIterator;

class MappedRecordIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testFirstDoesNotThrowOutOfBounds()
    {
        $recordIterator = $this->getMockBuilder('\Ddeboer\Salesforce\ClientBundle\Response\RecordIterator')
            ->disableOriginalConstructor()
            ->getMock();

        $mapper = $this->getMockBuilder('\Ddeboer\Salesforce\MapperBundle\Mapper')
            ->disableOriginalConstructor()
            ->getMock();

        $iterator = new MappedRecordIterator($recordIterator, $mapper, 'Account');
        
        $this->assertNull($iterator->first());
    }
}