<?php

namespace Ddeboer\Salesforce\MapperBundle\Exception;

class Error
{
    /**
     * An array of Ddeboer\Salesforce\ClientBundle\Response\Error objects
     * 
     * @var array
     */
    public $errors;
    
    /**
     * A mapper model
     * 
     * @var mixed
     */
    public $model;
    
    /**
     * getErrors
     * 
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
    
    /**
     * setErrors
     * 
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        return $this->errors = $errors;
    }
    
    /**
     * getModel
     * 
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }
    
    /**
     * setModel
     * 
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }
}