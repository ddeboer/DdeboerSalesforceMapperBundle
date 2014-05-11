<?php

/**
 * PropertyAnnotation.php
 * Definition of class PropertyAnnotation
 * 
 * Created 11-May-2014 13:16:45
 *
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 * @copyright (c) 2014, Byng Systems/SkillsWeb Ltd
 */

namespace Ddeboer\Salesforce\MapperBundle\Annotation;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\Annotation\Target;



/**
 * PropertyAnnotation
 * 
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 */
abstract class PropertyAnnotation
{
    public $name;
    public $getter = null;
    public $setter = null;
}
