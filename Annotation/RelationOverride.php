<?php
/**
 * RelationOverride.php
 * Definition of class RelationOverride
 * 
 * Created 10-Apr-2014 17:53:34
 *
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 * @copyright (c) 2014, Byng Systems/SkillsWeb Ltd
 */

namespace Ddeboer\Salesforce\MapperBundle\Annotation;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\Annotation\Target;



/**
 * RelationOverride
 * 
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 * @Annotation
 * @Target("ANNOTATION")
 */
class RelationOverride extends Relation
{
    use OverrideTrait;
}
