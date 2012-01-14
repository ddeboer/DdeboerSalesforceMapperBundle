<?php

namespace Ddeboer\Salesforce\MapperBundle;

use Ddeboer\Salesforce\ClientBundle\BulkSaver;
use Ddeboer\Salesforce\ClientBundle\Response\SaveResult;
use Ddeboer\Salesforce\MapperBundle\Annotation\AnnotationReader;

/**
 * Provides bulk creates, deletes, updates and upserts for mapped (annotated)
 * objects
 *
 * @author David de Boer <david@ddeboer.nl>
 */
class MappedBulkSaver implements MappedBulkSaverInterface
{
    /**
     * @var BulkSaver
     */
    private $bulkSaver;

    /**
     * @var Mapper
     */
    private $mapper;

    /**
     * @var AnnotationReader
     */
    private $annotationReader;

    public function __construct(BulkSaver $bulkSaver, Mapper $mapper,
        AnnotationReader $annotationReader)
    {
        $this->bulkSaver = $bulkSaver;
        $this->mapper = $mapper;
        $this->annotationReader = $annotationReader;
    }

    /**
     * {@inheritdoc}
     */
    public function save($model, $matchField = null)
    {
        $record = $this->mapper->mapToSalesforceObject($model, null !== $matchField);        
        $objectMapping = $this->annotationReader->getSalesforceObject($model);

        $matchFieldName = null;
        if ($matchField) {
            $field = $this->annotationReader->getSalesforceField($model, $matchField);
            if (!$field) {
                throw new \InvalidArgumentException(sprintf(
                    'Invalid match field %s. Make sure to specify a mapped '
                    . 'property’s name', $matchField)
                );
            }
            $matchFieldName = $field->name;
        }
            
        $this->bulkSaver->save($record, $objectMapping->name, $matchFieldName);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($model)
    {
        $record = $this->mapper->mapToSalesforceObject($model);
        
        $this->bulkSaver->delete($record);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function flush()
    {
        return $this->bulkSaver->flush();
    }

    /**
     * Get bulk delete limit
     *
     * @return int
     */
    public function getBulkDeleteLimit()
    {
        return $this->bulkSaver->getBulkDeleteLimit();
    }

    /**
     * Set bulk delete limit
     *
     * @param int $bulkDeleteLimit
     * @return MappedBulkSaver
     */
    public function setBulkDeleteLimit($bulkDeleteLimit)
    {
        $this->bulkSaver->setBulkDeleteLimit($bulkDeleteLimit);
        return $this;
    }

    /**
     * Get bulk save limit
     *
     * @return int
     */
    public function getBulkSaveLimit()
    {
        return $this->bulkSaver->getBulkSaveLimit();
    }

    /**
     * Set bulk save limit
     *
     * @param int $bulkSaveLimit
     * @return MappedBulkSaver
     */
    public function setBulkSaveLimit($bulkSaveLimit)
    {
        $this->bulkSaver->setBulkSaveLimit($bulkSaveLimit);
        return $this;
    }
}
