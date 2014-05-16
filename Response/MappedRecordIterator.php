<?php

namespace Ddeboer\Salesforce\MapperBundle\Response;

use Ddeboer\Salesforce\MapperBundle\Mapper;
use Phpforce\SoapClient\Result\RecordIterator;

/**
 * A mapped record iterator encapsulates a plain Salesforce record iterator and
 * returns a mapped domain model for each Salesforce record
 *
 * @author David de Boer <d.deboer@Ddeboer.nl>
 */
class MappedRecordIterator implements \OuterIterator, \Countable, \ArrayAccess
{
    /**
     * Record iterator
     *
     * @var RecordIterator
     */
    protected $recordIterator;

    /**
     * Mapper
     *
     * @var Mapper
     */
    protected $mapper;

    /**
     * Domain model object
     *
     * @var mixed
     */
    protected $modelClass;

    /**
     * Construct a mapped record iterator
     *
     * @param RecordIterator $recordIterator
     * @param Mapper              Salesforce mapper
     * @param mixed $modelClass  Model class name
     */
    public function __construct(RecordIterator $recordIterator, Mapper $mapper, $modelClass)
    {
        $this->recordIterator = $recordIterator;
        $this->mapper = $mapper;
        $this->modelClass = $modelClass;
    }

    /**
     * {@inheritdoc}
     *
     * @return RecordIterator
     */
    public function getInnerIterator()
    {
        return $this->recordIterator;
    }

    /**
     * Get domain model object
     *
     * @return mixed The domain model object containing the values from the
     *               Salesforce record
     *
     */
    public function current()
    {
        return $this->get($this->key());
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->recordIterator->next();
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->recordIterator->key();
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->recordIterator->valid();
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->recordIterator->rewind();
    }

    /**
     * Get first domain model object in collection
     *
     * @return mixed
     */
    public function first()
    {
        return $this->get(0);
    }

    /**
     * Get total number of records returned by Salesforce
     *
     * @return int
     */
    public function count()
    {
        return $this->recordIterator->count();
    }

    /**
     * Get object at key
     *
     * @param int $key
     * @return object | null
     */
    public function get($key)
    {
        $sObject = $this->recordIterator->seek($key);
        if (!$sObject) {
            return null;
        }

        return $this->mapper->mapToDomainObject($sObject, $this->modelClass);
    }
    
    /**
     * Determines whether or not an element exists at a given offset (key/index)
     * 
     * @param int $offset
     *      Key/index to search (generally numeric in this implementation)
     * @return boolean
     *      TRUE if the key/index exists; otherwise FALSE
     */
    public function offsetExists($offset)
    {
        return ($this->recordIterator->seek($offset) !== null);
    }
    
    /**
     * Gets an element at an offset
     * 
     * @param int $offset
     *      Key/index to search (generally numeric in this implementation)
     * @return object|null
     *      Mapped object at the offset if valid; otherwise NULL
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }
    
    /**
     * Unsupported - set the value of an element
     * 
     * @param mixed $offset
     * @param mixed $value
     * @return null
     * @deprecated
     */
    public function offsetSet($offset, $value)
    {
        // Not supported in this implementation
    }
    
    /**
     * Unsupported - unset an element
     * 
     * @param mixed $offset
     * @return null
     * @deprecated
     */
    public function offsetUnset($offset)
    {
        // Not supported in this implementation
    }
    
    /**
     * 
     * @return array
     */
    public function toArray()
    {
        $results = array();
        
        foreach ($this as $result) {
            $results[] = $result;
        }
        
        return $results;
    }

}
