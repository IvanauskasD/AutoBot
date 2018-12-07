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
     * @ORM\ManyToOne(targetEntity="App\Entity\Car", inversedBy="service")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     */
    private $carId;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="service")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $companyId;

    /**
     * @return mixed
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param mixed $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
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
    public function getCarId()
    {
        return $this->carId;
    }

    /**
     * @param mixed $carId
     */
    public function setCarId($carId)
    {
        $this->carId = $carId;
    }


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
}
