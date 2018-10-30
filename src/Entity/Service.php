<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer", nullable=false, unique=true)
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="service")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $companyId;


    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $serviceName;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $serviceCategory;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Administrator", inversedBy="service")
     * @ORM\JoinColumn(name="admin_id", referencedColumnName="id")
     */
    private $administrator;

    /**
     * @ORM\Column(type="float", length=255, nullable=false)
     */
    private $cost;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Work", mappedBy="services")
     */
    private $works;

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
     * @ORM\Column(type="integer", length=255, nullable=false)
     */
    private $serviceTime;

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
    public function getServiceCategory()
    {
        return $this->serviceCategory;
    }

    /**
     * @param string $serviceCategory
     */
    public function setServiceCategory($serviceCategory)
    {
        $this->serviceCategory = $serviceCategory;
    }

    /**
     * @return string
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * @param string $service_name
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param int $service_name
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

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
    public function getAdministratorType()
    {
        return $this->administratorType;
    }

    /**
     * @param mixed $administratorType
     */
    public function setAdministratorType($administratorType)
    {
        $this->administratorType = $administratorType;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getServiceTime()
    {
        return $this->serviceTime;
    }

    /**
     * @param mixed $serviceTime
     */
    public function setServiceTime($serviceTime)
    {
        $this->serviceTime = $serviceTime;
    }




}
