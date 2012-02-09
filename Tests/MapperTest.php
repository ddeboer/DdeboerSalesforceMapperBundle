<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests;

use Ddeboer\Salesforce\MapperBundle\Mapper;
use Ddeboer\Salesforce\MapperBundle\Model;
use Ddeboer\Salesforce\MapperBundle\Annotation;
use Doctrine\Common\Collections\ArrayCollection;
use Ddeboer\Salesforce\ClientBundle\Response\Field;
use Ddeboer\Salesforce\ClientBundle\Response\RecordIterator;
use Ddeboer\Salesforce\ClientBundle\Response\QueryResult;
use Ddeboer\Salesforce\MapperBundle\Events;
use Ddeboer\Salesforce\MapperBundle\Tests\Mock\DescribeAccountResult;
use Ddeboer\Salesforce\MapperBundle\Tests\Mock\AccountMock;
use Symfony\Component\EventDispatcher\EventDispatcher;

class MapperTest extends \PHPUnit_Framework_TestCase
{
    public function testCount()
    {
        return;
        $result = new QueryResult();
        $result->size = 15;

        $client = $this->getClient();
        $client->expects($this->once())
            ->method('query')
            ->with('select count() from Task')
            ->will($this->returnValue(new RecordIterator($client, $result)));
        $this->assertEquals(15, $this->getMapper($client)->count(new Model\Task()));
    }

    public function testBuildQuery()
    {
        return;
        $client = $this->getMockBuilder('Ddeboer\Salesforce\ClientBundle\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $client
            ->expects($this->at(0))
            ->method('getFieldType')
            ->with('Task', 'Id')
            ->will($this->returnValue('string'));

        $client
            ->expects($this->at(1))
            ->method('getFieldType')
            ->with('Task', 'OwnerId')
            ->will($this->returnValue('string'));

        $client
            ->expects($this->at(2))
            ->method('getFieldType')
            ->with('Task', 'Subject')
            ->will($this->returnValue('string'));

        $queryResult = new QueryResult();
        $queryResult->done = true;
        $queryResult->records = array(
            (object) array(
                'Id'        => '00TM0000003YlJ6',
                'Subject'   => 'A subject',
                'OwnerId'   => '123'
            )
        );
        $client
            ->expects($this->once())
            ->method('query')
            ->with("select Id,Subject,OwnerId from Task  where Id = '00TM0000003YlJ6' LIMIT 1")
            ->will($this->returnValue(new RecordIterator($client, $queryResult)));

        $annotationReader = $this->getMockBuilder(
            'Ddeboer\Salesforce\MapperBundle\Annotation\AnnotationReader'
            )
            ->disableOriginalConstructor()
            ->getMock();

        $annotationReader
            ->expects($this->exactly(3))
            ->method('getSalesforceFields')
            ->with(new Model\Task())
            ->will($this->returnValue(new ArrayCollection(array(
                new Annotation\Field(array('name' => 'Id')),
                new Annotation\Field(array('name' => 'Subject')),
                new Annotation\Field(array('name' => 'OwnerId'))
            ))));

        $annotationReader
            ->expects($this->once())
            ->method('getSalesforceRelations')
            ->with(new Model\Task())
            ->will($this->returnValue(array()));

        $annotationReader
            ->expects($this->any())
            ->method('getSalesforceObject')
            ->with(new Model\Task())
            ->will($this->returnValue(
                new Annotation\Object(array('name' => 'Task'))
            ));

        $mapper = new Mapper($client, $annotationReader);
        $task = $mapper->find(new Model\Task(), '00TM0000003YlJ6');
        var_dump($task);
    }

    public function testEventIsDispatched()
    {
        $account1 = new AccountMock();
        $account1->setName('First account');

        $account2 = new AccountMock();
        $account2->setName('Second account');

        $client = $this->getClient();
        $client->expects($this->any())
            ->method('create')
            ->with(array(
                (object) array(
                    'Name' => 'First account',
                    'fieldsToNull'   => array()
                ),
                (object) array(
                    'Name' => 'Second account with altered name',
                    'fieldsToNull'   => array()
                )
            ), 'Account'
        );
        
        $mapper = $this->getMapper($client);
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(Events::beforeSave, function($event) {            
            $objects = $event->getObjects();
            $objects[1]->setName('Second account with altered name');

        });
        $mapper->setEventDispatcher($dispatcher);
        $mapper->save(array($account1, $account2));
    }

    protected function getClient()
    {
        $client = $this->getMockBuilder('Ddeboer\Salesforce\ClientBundle\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $client->expects($this->any())
            ->method('describeSObjects')
            ->with(array('Account'))
            ->will($this->returnValue(array(new DescribeAccountResult())));

        return $client;
    }

    /**
     * @return Mapper
     */
    protected function getMapper($client)
    {
        $annotationReader = new \Doctrine\Common\Annotations\AnnotationReader();
        $salesforceAnnotationReader = new Annotation\AnnotationReader($annotationReader);
        $cache = $this->getMockBuilder('Ddeboer\Salesforce\MapperBundle\Cache\FileCache')
            ->disableOriginalConstructor()
            ->getMock();

        $mapper = new Mapper($client, $salesforceAnnotationReader, $cache);
        return $mapper;
    }
}