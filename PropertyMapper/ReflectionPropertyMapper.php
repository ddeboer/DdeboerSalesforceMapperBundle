<?php

/**
 * ReflectionPropertyMapper.php
 * Definition of class ReflectionPropertyMapper
 * 
 * Created 11-May-2014 17:51:00
 *
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 * @copyright (c) 2014, Byng Systems/SkillsWeb Ltd
 */

namespace Ddeboer\Salesforce\MapperBundle\PropertyMapper;

use ReflectionClass;
use ReflectionObject;
use StdClass;
use Ddeboer\Salesforce\MapperBundle\Annotation\Field;
use Ddeboer\Salesforce\MapperBundle\Annotation\PropertyAnnotation;
use Ddeboer\Salesforce\MapperBundle\Annotation\Relation;
use Ddeboer\Salesforce\MapperBundle\Model\AbstractModel;
use Phpforce\SoapClient\Result\SObject;



/**
 * ReflectionPropertyMapper
 * 
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 */
class ReflectionPropertyMapper extends AbstractPropertyMapper {
    
    public function updateField(
        SObject $salesforceObject,
        $model,
        ReflectionObject $modelReflection,
        Field $fieldAnnotation,
        $propertyName
    ) {
        $reflProperty = $modelReflection->getProperty($propertyName);
        $reflProperty->setAccessible(true);
        $reflProperty->setValue($model, $salesforceObject->{$fieldAnnotation->name});
    }
    
    public function updateRelation(
        SObject $salesforceObject,
        $model,
        ReflectionObject $modelReflection,
        Relation $relationAnnotation,
        $propertyName,
        $propertyValue
    ) {
        $reflProperty = $modelReflection->getProperty($propertyName);
        $reflProperty->setAccessible(true);
        $reflProperty->setValue($model, $propertyValue);
    }
    
}
