<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContractRepository")
 */
class Contract
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="contract")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $companyId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="contracts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;



    /**
     * @ORM\Column(name="dates", type="date", length=255)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Administrator", inversedBy="contract")
     * @ORM\JoinColumn(name="admin_id", referencedColumnName="id")
     */
    private $administrator;


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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
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




}
