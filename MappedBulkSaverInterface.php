<?php

namespace Ddeboer\Salesforce\MapperBundle;

use Ddeboer\Salesforce\ClientBundle\Response\SaveResult;

interface MappedBulkSaverInterface
{
    /**
     * Add a model to the bulk save queue
     *
     * Please note that saving this model to Salesforce is delayed until the
     * queue is full. 
     *
     * @param object $model       Any properly annotation object is allowed. It
     *                            is possible to save Salesforce records of
     *                            different object types.
     * @param string $matchField  Optional field to match by, for upserts
     * @return MappedBulkSaverInterface
     */
    function save($model, $matchField = null);

    /**
     * Add a model to the delete queue
     *
     * Please note that deleting this model from Salesforce is delayed until the
     * queue is full.
     *
     * @param object $model     Any object that has a getId() method is allowed.
     *                          It is possible to delete Salesforce records of
     *                          different object types.
     * @return MappedBulkSaverInterface
     */
    function delete($model);

    /**
     * Issue all queued creates, deletes, updates and upserts to Salesforce
     *
     * @return SaveResult[]
     */
    function flush();
}