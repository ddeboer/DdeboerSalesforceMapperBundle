<?php

/**
 * AbstractPropertyMapper.php
 * Definition of class AbstractPropertyMapper
 * 
 * Created 11-May-2014 17:50:29
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
 * AbstractPropertyMapper
 * 
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 */
abstract class AbstractPropertyMapper {
    
    public abstract function updateField(
        SObject $salesforceObject,
        $model,
        ReflectionObject $modelReflection,
        Field $fieldAnnotation,
        $propertyName
    );
    
    public abstract function updateRelation(
        SObject $salesforceObject,
        $model,
        ReflectionObject $modelReflection,
        Relation $relationAnnotation,
        $propertyName,
        $propertyValue
    );
    
}
