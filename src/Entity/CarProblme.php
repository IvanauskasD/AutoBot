<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarProblmeRepository")
 */
class CarProblme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="jobName", type="string", length=255)
     */
    private $jobName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Car", inversedBy="carjob")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     */
    private $car;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Orders", mappedBy="carjob")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    private $order;

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
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
    public function getJobName()
    {
        return $this->jobName;
    }

    /**
     * @param mixed $jobName
     */
    public function setJobName($jobName)
    {
        $this->jobName = $jobName;
    }

    public function __toString() {
        return (string) $this->car; }


    // add your own fields
}
