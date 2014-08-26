<?php

namespace Ddeboer\Salesforce\MapperBundle\Annotation;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Defines a relation between Salesforce objects
 *
 * @Annotation
 * @Target("PROPERTY")
 */
class Relation extends PropertyAnnotation
{
    public $field;
    public $class;
}
