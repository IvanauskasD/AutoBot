<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkRepository")
 */
class Work
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $workStatus;
    /**
     * @ORM\Column(name="workStarted", type="string", length=255)
     */
    private $workStart;
    /**
     * @ORM\Column(name="jobDone", type="string", length=255)
     */
    private $workHours;

    /**
     * @ORM\Column(name="comments", type="string", length=255)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employee", inversedBy="works")
     * @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     */
    private $employee;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Service", inversedBy="works")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id")
     */
    private $services;

    /**
     * @return mixed
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param mixed $services
     */
    public function setServices($services)
    {
        $this->services = $services;
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
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
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
    public function getWorkHours()
    {
        return $this->workHours;
    }

    /**
     * @param mixed $workHours
     */
    public function setWorkHours($workHours)
    {
        $this->workHours = $workHours;
    }

    /**
     * @return mixed
     */
    public function getWorkStart()
    {
        return $this->workStart;
    }

    /**
     * @param mixed $workStart
     */
    public function setWorkStart($workStart)
    {
        $this->workStart = $workStart;
    }

    /**
     * @return mixed
     */
    public function getWorkStatus()
    {
        return $this->workStatus;
    }

    /**
     * @param mixed $workStatus
     */
    public function setWorkStatus($workStatus)
    {
        $this->workStatus = $workStatus;
    }


}
