<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * FerendaOrganisation model
 *
 * You can extend this class to incorporate custom fields on the Salesforce
 * name object.
 * 
 * @Salesforce\Object(name="FerendaOrganisation__c")
 */
class FerendaOrganisation extends AbstractModel
{
    /**
     * @var string
     * @Salesforce\Field(name="CompanyName__c")
     */
    protected $companyName;
    
    public function getCompanyName() {
        return $this->companyName;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }
}