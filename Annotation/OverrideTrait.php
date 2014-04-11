<?php
/**
 * OverrideTrait.php
 * Definition of class OverrideTrait
 * 
 * Created 10-Apr-2014 18:19:16
 *
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 * @copyright (c) 2014, Byng Systems/SkillsWeb Ltd
 */

namespace Ddeboer\Salesforce\MapperBundle\Annotation;



/**
 * OverrideTrait
 * 
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 */
trait OverrideTrait
{
    /**
     *
     * @var string
     */
    public $property;
    
    
    
    /**
     * 
     * @param object $subjectAnnotation
     */
    public function doOverride($subjectAnnotation)
    {
        foreach ($subjectAnnotation as $key => $value) {
            if ($this->$key !== null) {
                $subjectAnnotation->$key = $this->$key;
            }
        }
        
        return $subjectAnnotation;
    }
    
}
