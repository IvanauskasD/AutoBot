<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\AdminJobRepository")
 */
class AdminJob
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
    private $jobsName;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Job", inversedBy="jobs")
     */
    private $jobs;

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
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * @param mixed $jobs
     */
    public function setJobs($jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * @return mixed
     */
    public function getJobsName()
    {
        return $this->jobsName;
    }

    /**
     * @param mixed $jobsName
     */
    public function setJobsName($jobsName)
    {
        $this->jobsName = $jobsName;
    }

    public function __toString() {
        return (string) $this->jobsName; }


}

