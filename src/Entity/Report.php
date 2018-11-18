<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReportRepository")
 */
class Report
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $defectDescription;

    /**
     * @ORM\Column(name="comments", type="string", length=255)
     */
    private $workComments;

    /**
     * @ORM\Column(name="diagnostics", type="string", length=255)
     */
    private $diagnosticResults;

    /**
     * @ORM\Column(name="jobTime", type="string", length=255)
     */
    private $jobTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employee", inversedBy="reports")
     * @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     */
    private $employee;

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
    public function getDefectDescription()
    {
        return $this->defectDescription;
    }

    /**
     * @param mixed $defectDescription
     */
    public function setDefectDescription($defectDescription)
    {
        $this->defectDescription = $defectDescription;
    }

    /**
     * @return mixed
     */
    public function getDiagnosticResults()
    {
        return $this->diagnosticResults;
    }

    /**
     * @param mixed $diagnosticResults
     */
    public function setDiagnosticResults($diagnosticResults)
    {
        $this->diagnosticResults = $diagnosticResults;
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

    /**
     * @return mixed
     */
    public function getWorkComments()
    {
        return $this->workComments;
    }

    /**
     * @param mixed $workComments
     */
    public function setWorkComments($workComments)
    {
        $this->workComments = $workComments;
    }


}
