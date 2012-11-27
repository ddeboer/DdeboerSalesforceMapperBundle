<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Salesforce standard lead object
 *
 * You can extend this class to incorporate custom fields on the object.
 *
 * @Salesforce\Object(name="Lead")
 */
class Lead extends AbstractModel
{
    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;

    /**
     * @var string
     * @Salesforce\Field(name="Company")
     */
    protected $company;

    /**
     * @var string
     * @Salesforce\Field(name="PostalCode")
     */
    protected $postalCode;

    /**
     * @var string
     * @Salesforce\Field(name="City")
     */
    protected $city;

    /**
     * @var string
     * @Salesforce\Field(name="Street")
     */
    protected $street;

    /**
     * @var string
     * @Salesforce\Field(name="LeadSource")
     */
    protected $leadSource;

    /**
     * @var string
     * @Salesforce\Field(name="FirstName")
     */
    protected $firstName;

    /**
     * @var string
     * @Salesforce\Field(name="LastName")
     */
    protected $lastName;

    /**
     * @var string
     * @Salesforce\Field(name="Salutation")
     */
    protected $salutation;

    /**
     * @var string
     * @Salesforce\Field(name="Email")
     */
    protected $email;

    /**
     * @var string
     * @Salesforce\Field(name="Phone")
     */
    protected $phone;

    /**
     * @var string
     * @Salesforce\Field(name="Description")
     */
    protected $description;

    /**
     * @var string
     * @Salesforce\Field(name="Status")
     */
    protected $status;

    /**
     * @Salesforce\Field(name="OwnerId")
     */
    protected $ownerId;

    /**
     * @var boolean
     * @Salesforce\Field(name="IsConverted")
     */
    protected $isConverted;

    /**
     * @var string
     * @Salesforce\Field(name="ConvertedAccountId")
     */
    protected $convertedAccountId;

    /**
     * @var string
     * @Salesforce\Field(name="ConvertedContactId")
     */
    protected $convertedContactId;

    /**
     * @Salesforce\Field(name="Fax")
     */
    protected $fax;

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return $this
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get postal code
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set postal code
     *
     * @param string $postalCode
     *
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return $this
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get lead source
     *
     * @return string
     */
    public function getLeadSource()
    {
        return $this->leadSource;
    }

    /**
     * Set lead source
     *
     * @param string $leadSource
     *
     * @return $this
     */
    public function setLeadSource($leadSource)
    {
        $this->leadSource = $leadSource;

        return $this;
    }

    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set first name
     *
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get last name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set last name
     *
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get salutation
     *
     * @return string
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * Set salutation
     *
     * @param string $salutation
     *
     * @return $this
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;

        return $this;
    }

    /**
     * Get e-mail address
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set e-mail address
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get owner id
     *
     * @return string
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Set owner id
     *
     * @param string $ownerId
     *
     * @return $this
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    /**
     * Is converted?
     *
     * @return bool
     */
    public function isConverted()
    {
        return $this->isConverted;
    }

    /**
     * Get converted account id
     *
     * @return string
     */
    public function getConvertedAccountId()
    {
        return $this->convertedAccountId;
    }

    /**
     * Get converted contact id
     *
     * @return string
     */
    public function getConvertedContactId()
    {
        return $this->convertedContactId;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function setFax($fax)
    {
        $this->fax = $fax;
    }
}

