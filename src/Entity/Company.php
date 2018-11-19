<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")

 */
class Company implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z ]$/",
     *     match = false,
     * )
     * @ORM\Column(name="companyName", type="string", length=255, nullable=false)
     */
    private $companyName;

    /**
     * @Assert\Email()
     * @ORM\Column(name="email", type="string", length=255, nullable=false, unique=true)
     */
    private $email;

    /**
     * @Assert\Length(
     *     min = 6,
     *     minMessage = "Password has to be {{ min }} characters long"
     * )
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;


    private $plainPassword;

    /**
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z0-9 ]$/",
     *     match = false,
     * )
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;


    /**
     * @Assert\Regex(
     *     pattern = "/^[0-9]$/",
     *     match = false,
     * )
     * @ORM\Column(name="phoneNumber", type="integer")
     */
    private $phoneNumber;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Administrator", inversedBy="company")
     * @ORM\JoinColumn(name="administrator_id", referencedColumnName="id")
     */
    private $administrator;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employee", mappedBy="company")
     */
    private $employee;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\CompanyProfile", mappedBy="company")
     */
    private $profile;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contract", mappedBy="companyId")
     */
    private $contract;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Service", mappedBy="companyId")
     */
    private $service;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job", mappedBy="companyId")
     */
    private $job;

    /**
     * @return mixed
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param mixed $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }



    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param mixed $contract
     */
    public function setContract($contract)
    {
        $this->contract = $contract;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * @param mixed $employee
     */
    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }


    /**
     * @return mixed
     */
    public function getAdministrator()
    {
        return $this->administrator;
    }

    /**
     * @param mixed $administrator
     */
    public function setAdministrator($administrator)
    {
        $this->administrator = $administrator;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }


    /**
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param string $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }



    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }
    




    /**
     * Returns the roles granted to the company.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the company object
     * is created.
     *
     * @return (Role|string)[] The company roles
     */
    public function getRoles()
    {
        return [
            'ROLE_COMPANY',
        ];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Removes sensitive data from the company.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * Returns the username used to authenticate the company.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return null;
    }


}
