<?php

namespace Ddeboer\Salesforce\MapperBundle;

/**
 * The events that are thrown by the mapper bundle
 */
class Events
{
    const beforeSave      = 'salesforce.mapper.before_save';
    const afterSave       = 'salesforce.mapper_after_save';
}