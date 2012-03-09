<?php
namespace Ddeboer\Salesforce\MapperBundle\Exception;

/**
 * SaveException is thrown if saving models fails
 */
class SaveException extends \Exception
{
    /**
     * Models that were saved succesfully
     * @param array
     */
    protected $okModels = array();
    
    /**
     * Error objects containing the failed model and errors
     * @param array
     */
    protected $errors = array();
    
    /**
     * getOkModels
     * @return array
     */
    public function getOkModels()
    {
        return $this->okModels;
    }
    
    /**
     * setOkModels
     * @param array $okModels
     */
    public function setOkModels(array $okModels)
    {
        $this->okModels = $okModels;
    }
    
    /**
     * getErrors
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
    
    /**
     * setErrors
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }
}
?>