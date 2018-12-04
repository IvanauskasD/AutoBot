<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\AdminJobDesRepository")
 */
class AdminJobDes
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
     * @ORM\Column(name="jobsDes", type="string", length=255)
     */
    private $jobsDes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AdminJob", inversedBy="jobsDes")
     */
    private $jobsDesc;

    /**
     * @return mixed
     */
    public function getJobsDesc()
    {
        return $this->jobsDesc;
    }

    /**
     * @param mixed $jobsDesc
     */
    public function setJobsDesc($jobsDesc)
    {
        $this->jobsDesc = $jobsDesc;
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
    public function getJobsDes()
    {
        return $this->jobsDes;
    }

    /**
     * @param mixed $jobsDes
     */
    public function setJobsDes($jobsDes)
    {
        $this->jobsDes = $jobsDes;
    }


    public function __toString() {
        return (string) $this->jobsDes; }


}

