<?php
/**
 * FieldOverride.php
 * Definition of class FieldOverride
 * 
 * Created 10-Apr-2014 18:42:03
 *
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 * @copyright (c) 2014, Byng Systems/SkillsWeb Ltd
 */

namespace Ddeboer\Salesforce\MapperBundle\Annotation;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\Annotation\Target;



/**
 * FieldOverride
 * 
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 * @Annotation
 * @Target("ANNOTATION")
 */
class FieldOverride extends Field
{
    use OverrideTrait;
}
