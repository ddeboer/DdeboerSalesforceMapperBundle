<?php

/**
 * GetterSetterPropertyMapper.php
 * Definition of class GetterSetterPropertyMapper
 * 
 * Created 11-May-2014 17:51:33
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
 * GetterSetterPropertyMapper
 * 
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 */
class GetterSetterPropertyMapper extends ReflectionPropertyMapper {
    
    public function updateField(
        SObject $salesforceObject,
        $model,
        ReflectionObject $modelReflection,
        Field $fieldAnnotation,
        $propertyName
    ) {
        if (isset($fieldAnnotation->setter)) {
            $model->{$fieldAnnotation->setter}(
                $salesforceObject->{$fieldAnnotation->name}
            );
        } else {
            parent::updateField(
                $salesforceObject,
                $model,
                $modelReflection,
                $fieldAnnotation,
                $propertyName
            );
        }
    }
    
    public function updateRelation(
        SObject $salesforceObject,
        $model,
        ReflectionObject $modelReflection,
        Relation $relationAnnotation,
        $propertyName,
        $propertyValue
    ) {
        if (isset($relationAnnotation->setter)) {
            $model->{$relationAnnotation->setter}(
                $propertyValue
            );
        } else {
            parent::updateRelation(
                $salesforceObject,
                $model,
                $modelReflection,
                $relationAnnotation,
                $propertyName,
                $propertyValue
            );
        }
    }
    
}
