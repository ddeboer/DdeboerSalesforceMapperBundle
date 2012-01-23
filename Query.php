<?php

namespace Ddeboer\Salesforce\MapperBundle;

use Ddeboer\Salesforce\MapperBundle\Response\MappedRecordIterator;

class Query
{
    private $mapper;
    private $query;
    private $client;
    
    public function __construct($mapper, $client, $query, $drivingModel = null)
    {
        $this->mapper = $mapper;
        $this->client = $client;
        $this->query = $query;
        $this->drivingModel = $drivingModel;
    }

    /**
     * Get Salesforce Object Query Language (SOQL) from query
     *
     * @return string
     */
    public function getSOQL()
    {
        return $this->query;
    }

    /**
     * Get mapped result
     *
     * @return MappedRecordIterator
     */
    public function getResult()
    {
        echo $this->query;die;
        $records = $this->client->query($this->query);
        die;
        return new MappedRecordIterator($records, $this->mapper, $this->drivingModel);
    }

    /**
     * Get (unmapped) array result
     *
     * @return array
     */
    public function getArrayResult()
    {
        
    }

    public function getSingleResult()
    {
        
    }

    public function __toString()
    {
        return $this->query;
    }
}