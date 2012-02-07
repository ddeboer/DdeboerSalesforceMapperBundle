<?php

namespace Ddeboer\Salesorce\MapperBundle\Tests;

use Ddeboer\Salesforce\MapperBundle\EntityManager;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class EntityManagerTest extends WebTestCase
{
    public function testMetadata()
    {
        $client = static::createClient();

        $client = $client->getContainer()->get('ddeboer_salesforce_client');
        $em = new EntityManager($client);
        
        $em->find('Ddeboer\Salesforce\MapperBundle\Model\Account', '123');
    }
}