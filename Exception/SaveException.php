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
     * Models that had errors while saving
     * @param array
     */
    protected $errorModels = array();
    
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
     * getErrorModels
     * @return array
     */
    public function getErrorModels()
    {
        return $this->errorModels;
    }
    
    /**
     * setOkModels
     * @param array $errorModels
     */
    public function setErrorModels(array $errorModels)
    {
        $this->errorModels = $errorModels;
    }
}
?>