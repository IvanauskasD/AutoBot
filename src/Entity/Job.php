<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Administrator", inversedBy="job")
     * @ORM\JoinColumn(name="admin_id", referencedColumnName="id")
     */
    private $administrator;

    /**
     * @ORM\Column(name="jobsName", type="string", length=255)
     */
    private $jobName;

    /**
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    /**
     * @ORM\Column(name="cost", type="float", length=255)
     */
    private $cost;

    /**
     * @ORM\Column(name="jobName", type="string", length=255)
     */
    private $jobTime;

    /**
     * @return mixed
     */
    public function getAdministrator()
    {
        return $this->administrator;
    }

    /**
     * @param mixed $adminType
     */
    public function setAdministrator($adminType)
    {
        $this->administrator = $adminType;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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

    /**
     * @return mixed
     */
    public function getJobTime()
    {
        return $this->jobTime;
    }

    /**
     * @param mixed $jobTime
     */
    public function setJobTime($jobTime)
    {
        $this->jobTime = $jobTime;
    }


}

