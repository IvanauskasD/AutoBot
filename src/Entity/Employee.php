<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Email()
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="firstnames", type="string", length=255, nullable=false)
     */
    private $firstname;


    /**
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z0-9]$/",
     *     match = false,
     * )
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;


    /**
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z0-9]$/",
     *     match = false,
     * )
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    private $lastname;

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
     *     pattern = "/^[0-9]$/",
     *     match = false,
     * )
     * @ORM\Column(name="phoneNumber", type="integer")
     */
    private $phoneNumber;

    /**
     * @ORM\Column(name="position", type="string", length=255)
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Administrator", inversedBy="employee")
     * @ORM\JoinColumn(name="administrator_id", referencedColumnName="id")
     */
    private $administrator;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Orders", mappedBy="employee")
     */
    private $orders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Report", mappedBy="employee")
     */
    private $reports;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Work", mappedBy="employee")
     */
    private $works;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="employee")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getWorks()
    {
        return $this->works;
    }

    /**
     * @param mixed $works
     */
    public function setWorks($works)
    {
        $this->works = $works;
    }

    /**
     * @return mixed
     */
    public function getReports()
    {
        return $this->reports;
    }

    /**
     * @param mixed $reports
     */
    public function setReports($reports)
    {
        $this->reports = $reports;
    }

    /**
     * @return mixed
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param mixed $orders
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
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
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
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
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }


}
