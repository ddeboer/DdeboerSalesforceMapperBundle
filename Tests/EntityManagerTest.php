<?php

namespace Ddeboer\Salesorce\MapperBundle\Tests;

use Ddeboer\Salesforce\MapperBundle\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EntityManagerTest extends WebTestCase
{
    public function testMetadata()
    {
        $client = $this->createClient()->getContainer()->get('ddeboer_salesforce_client');
        $em = new EntityManager($client);
        
        $em->find('Ddeboer\Salesforce\MapperBundle\Model\Account', '001D000000l0cxG');
    }
}