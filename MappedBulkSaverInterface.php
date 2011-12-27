<?php

namespace Ddeboer\Salesforce\MapperBundle;

interface MappedBulkSaverInterface
{
    function save($model);
    function delete($model);
    function flush();
}