<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Salesforce standard solution object
 *
 * @Salesforce\Object(name="Solution")
 */
class Solution extends AbstractModel
{

    /**
     * @var string
     * @Salesforce\Field(name="SolutionName")
     */
    protected $solutionName;
    
    /**
     * @var string
     * @Salesforce\Field(name="SolutionNote")
     */
    protected $solutionNote;
     
    /**
     * @var string
     * @Salesforce\Field(name="SolutionNumber")
     */
    protected $solutionNumber;
    
    /**
     * @var string
     * @Salesforce\Field(name="Status")
     */
    protected $status;
 
    public function getSolutionName()
    {
        return $this->solutionName;
    }

    public function setSolutionName($solutionName)
    {
        $this->solutionName = $solutionName;
    }

    public function getSolutionNote()
    {
        return $this->solutionNote;
    }

    public function setSolutionNote($solutionNote)
    {
        $this->solutionNote = $solutionNote;
    }

    public function getSolutionNumber()
    {
        return $this->solutionNumber;
    }

    public function setSolutionNumber($solutionNumber)
    {
        $this->solutionNumber = $solutionNumber;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

}