<?php

namespace Ddeboer\Salesforce\MapperBundle;

use Ddeboer\Salesforce\ClientBundle\BulkSaver;
use Ddeboer\Salesforce\MapperBundle\Annotation\AnnotationReader;

/**
 * Provides bulk creates, deletes, updates and upserts for mapped (annotated)
 * objects
 *
 * @author David de Boer <david@ddeboer.nl>
 */
class MappedBulkSaver
{
    /**
     * @var BulkSaver
     */
    private $bulkSaver;

    /**
     * @var Mapper
     */
    private $mapper;

    public function __construct(BulkSaver $bulkSaver, Mapper $mapper)
    {
        $this->bulkSaver = $bulkSaver;
        $this->mapper = $mapper;
    }

    /**
     * Add a model to the bulk save queue
     *
     * Please note that saving this model to Salesforce is delayed until the
     * queue is full. 
     *
     * @param mixed $model        Any properly annotation object is allowed. It
     *                            is possible to save Salesforce records of
     *                            different object types.
     * @param string $matchField  Optional field to match by, for upserts
     * @return MappedBulkSaver
     */
    public function save($model, $matchField = null)
    {
        $record = $this->mapper->mapToSalesforceObject($model);
        $objectType = $this->mapper->getSalesforceObjectType($model);

        $this->bulkSaver->save($record, $objectType, $matchField);

        return $this;
    }

    /**
     * Add a model to the delete queue
     *
     * Please note that deleting this model from Salesforce is delayed until the
     * queue is full. 
     * 
     * @param object $model     Any object that has a getId() method is allowed.
     *                          It is possible to delete Salesforce records of
     *                          different object types.
     * @return MappedBulkSaver
     */
    public function delete($model)
    {
        $record = $this->mapper->mapToSalesforceObject($model);
        
        $this->bulkSaver->delete($record);

        return $this;
    }

    /**
     * Issue all queued creates, deletes, updates and upserts to Salesforce
     *
     * @return MappedBulkSaver
     */
    public function flush()
    {
        $this->bulkSaver->flush();

        return $this;
    }
}
