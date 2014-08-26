<?php
/**
 * ObjectOverrides.php
 * Definition of class ObjectOverrides
 * 
 * Created 10-Apr-2014 17:23:16
 *
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 * @copyright (c) 2014, Byng Systems/SkillsWeb Ltd
 */

namespace Ddeboer\Salesforce\MapperBundle\Annotation;

use Traversable;
use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\Annotation\Attributes;
use Doctrine\Common\Annotations\Annotation\Attribute;
use Doctrine\Common\Annotations\Annotation\Target;



/**
 * ObjectOverrides
 * 
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 * @Annotation
 * @Target("CLASS")
 */
class ObjectOverrides
{
    /**
     *
     * @var array<Ddeboer\Salesforce\MapperBundle\Annotation\RelationOverride>
     */
    public $relations = array();
    
    /**
     *
     * @var array<Ddeboer\Salesforce\MapperBundle\Annotation\FieldOverride>
     */
    public $fields = array();
}
