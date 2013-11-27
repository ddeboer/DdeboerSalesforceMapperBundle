<?php

namespace Ddeboer\Salesforce\MapperBundle\Tests;

use Ddeboer\Salesforce\MapperBundle\Mapper;
use Ddeboer\Salesforce\MapperBundle\Model;
use Ddeboer\Salesforce\MapperBundle\Annotation;
use Doctrine\Common\Collections\ArrayCollection;
use Phpforce\SoapClient\Result\RecordIterator;
use Phpforce\SoapClient\Result\QueryResult;
use Ddeboer\Salesforce\MapperBundle\Events;
use Ddeboer\Salesforce\MapperBundle\Tests\Mock;
use Symfony\Component\EventDispatcher\EventDispatcher;


class MapperTest extends \PHPUnit_Framework_TestCase
{
    public function testCount()
    {
        $result = new Mock\QueryResultMock(15);
        $client = $this->getClient();
        $client->expects($this->once())
            ->method('query')
            ->with('select count() from Account')
            ->will($this->returnValue(new RecordIterator($client, $result)));
        $this->assertEquals(15, $this->getMapper($client)->count(new Model\Account()));
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
        $account1 = new Mock\AccountMock();
        $account1->setName('First account');

        $account2 = new Mock\AccountMock();
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

    public function testResultIdIsSetOnModel()
    {
        $account = new Mock\AccountMock();
        $account->setName('An account');

        $task = new Mock\TaskMock();
        $task->setSubject('A task');

        $client = $this->getClient(array('create'));

        $saveResult1 = new Mock\SaveResultMock('001D000000mDq9D');
        $saveResult2 = new Mock\SaveResultMock('00TD0000015m79U');

        $client->expects($this->any())
            ->method('create')
            ->will($this->returnCallback(function($input, $type) use (
                $saveResult1, $saveResult2
            ) {
                switch ($type) {
                    case 'Account':
                        return array($saveResult1);
                    case 'Task':
                        return array($saveResult2);
                }
            }));

        $mapper = $this->getMapper($client);
        $mapper->save(array($account, $task));
        $this->assertEquals('001D000000mDq9D', $account->getId());
        $this->assertEquals('00TD0000015m79U', $task->getId());
    }

    public function testFetchOneToManyRelationMustNotContainManySideTwice()
    {
        $client = $this->getClient();
        $client->expects($this->once())
            ->method('query')
            ->with('select Id,Name, (select Id,Contact.Id,Contact.FirstName,Contact.LastName from AccountContactRoles) from Account where Id=\'1\'')
            ->will($this->returnValue(new RecordIterator($client, new Mock\QueryResultMock(1))));
        $mapper = $this->getMapper($client);

        $this->assertNull($mapper->find(new Mock\AccountMock(), 1));
    }
    
    public function testBuildQueryWhereValueIsArray()
    {
        $queryResult = new Mock\QueryResultMock(2, true, array(
            (object) array(
                'Id' => '0010000000xxxx1',
                'Name' => 'Test Account 1'
            ),
            (object) array(
                'Id' => '0010000000xxxx2',
                'Name' => 'Test Account 2'
            )
        ));
        
        $client = $this->getClient();
        $client->expects($this->once())
            ->method('query')
            ->with("select Id,Name from Account where Id in ('0010000000xxxx1','0010000000xxxx2')")
            ->will($this->returnValue(new RecordIterator($client, $queryResult)));
        ;
        
        $mapper = $this->getMapper($client);
        $mapper->findBy(new Mock\AccountMock(), array(
            'id in' => array('0010000000xxxx1', '0010000000xxxx2')
        ), array(), 0);
    }

    protected function getClient()
    {
        $client = $this->getMockBuilder('\Phpforce\SoapClient\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $client->expects($this->any())
            ->method('describeSObjects')
            ->will($this->returnCallback(function($value) {
                $object = reset($value);
                switch ($object) {
                    case 'Account':
                        return array(new Mock\DescribeAccountResult());
                    case 'Contact':
                        return array(new Mock\DescribeContactResult());
                    case 'AccountContactRole':
                        return array(new Mock\DescribeAccountContactRoleResult());
                    case 'Task':
                        return array(new Mock\DescribeTaskResult());
                }
            }));

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