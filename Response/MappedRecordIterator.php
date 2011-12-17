<?php

namespace Ddeboer\Salesforce\MapperBundle\Response;

use Ddeboer\Salesforce\MapperBundle\Mapper;
use Ddeboer\Salesforce\ClientBundle\Response\RecordIterator;

/**
 * A mapped record iterator encapsulates a plain Salesforce record iterator and
 * returns a mapped domain model for each Salesforce record
 *
 * @author David de Boer <d.deboer@Ddeboer.nl>
 */
class MappedRecordIterator implements \OuterIterator, \Countable
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
        return $this->mapper->mapToDomainObject(
            $this->recordIterator->current(), $this->modelClass);
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
        if ($this->recordIterator->first()) {
            return $this->mapper->mapToDomainObject(
                $this->recordIterator->first(), $this->modelClass
            );
        }
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
}