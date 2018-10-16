<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     */
    private $id;


    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;

    /**
     * @ORM\Column(name="startDate", type="datetime", nullable=true)
     * @Assert\DateTime()
     */
    private $startDate;


    /**
     * @ORM\Column(name="duration", type="string", length=255, nullable=true)
     * @Assert\Type("string")
     */
    private $duration;


    /**
     * @ORM\Column(name="status", type="string", length=255)
     * @Assert\Type("string")
     */
    private $status;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Car")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     */
    private $car;

    /**
     * @ORM\Column(name="cost", type="string", length=255, nullable=true)
     * @Assert\Type("string")
     */
    private $cost;

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
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }

    /**
     * @param mixed $finishDate
     */
    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $user
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param mixed $car
     */
    public function setCar($car)
    {
        $this->car = $car;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $serviceCategory
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param int $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }





}
