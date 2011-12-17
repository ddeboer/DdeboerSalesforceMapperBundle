<?php

namespace Ddeboer\Salesforce\MapperBundle\Model;

use Ddeboer\Salesforce\MapperBundle\Annotation as Salesforce;

/**
 * Default name model
 *
 * You can extend this class to incorporate custom fields on the Salesforce
 * name object.
 * 
 * @Salesforce\Object(name="Name")
 */
class Name 
{
    /**
     * @var string
     * @Salesforce\Field(name="Id")
     */
    protected $id;

    /**
     * @var string
     * @Salesforce\Field(name="Alias")
     */
    protected $alias;

    /**
     * @var string
     * @Salesforce\Field(name="Email")
     */
    protected $email;

    /**
     * @var string
     * @Salesforce\Field(name="FirstName")
     */
    protected $firstName;
    
    /**
     * @var boolean
     * @Salesforce\Field(name="IsActive")
     */
    protected $isActive;        
    
    /**
     * @var string
     * @Salesforce\Field(name="LastName")
     */
    protected $lastName;
    
    /**
     * @var string
     * @Salesforce\Field(name="Name")
     */
    protected $name;

    /**
     * @var string
     * @Salesforce\Field(name="Phone")
     */
    protected $phone;

    /**
     * @var string
     * @Salesforce\Field(name="ProfileId")
     */
    protected $profileId;

    protected $profile;

    /**
     * @var string
     * @Salesforce\Field(name="Title")
     */
    protected $title;

    /**
     * @var string
     * @Salesforce\Field(name="Type")
     */
    protected $type;

    protected $userRole;

    protected $userRoleId;

    /**
     * @var string
     * @Salesforce\Field(name="Username")
     */
    protected $username;

    public function getId()
    {
        return $this->id;
    }

    public function getAlias()
    {
        return $this->Alias;
    }

    public function setAlias($alias)
    {
        $this->Alias = $alias;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($email)
    {
        $this->Email = $email;
    }

    public function getFirstName()
    {
        return $this->FirstName;
    }

    public function setFirstName($firstName)
    {
        $this->FirstName = $firstName;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getPhone()
    {
        return $this->Phone;
    }

    public function setPhone($phone)
    {
        $this->Phone = $phone;
    }

    public function getProfileId()
    {
        return $this->ProfileId;
    }

    public function setProfileId($profileId)
    {
        $this->ProfileId = $profileId;
    }

    public function getProfile()
    {
        return $this->Profile;
    }

    public function setProfile($profile)
    {
        $this->Profile = $profile;
    }

    public function getTitle()
    {
        return $this->Title;
    }

    public function setTitle($title)
    {
        $this->Title = $title;
    }

    public function getType()
    {
        return $this->Type;
    }

    public function setType($type)
    {
        $this->Type = $type;
    }

    public function getUserRole()
    {
        return $this->userRole;
    }

    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;
    }

    public function getUserRoleId()
    {
        return $this->userRoleId;
    }

    public function setUserRoleId($userRoleId)
    {
        $this->userRoleId = $userRoleId;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
}