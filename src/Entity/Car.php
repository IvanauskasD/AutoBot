<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
{
    /**
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z0-9]$/",
     *     match = false,
     * )
     * @ORM\Column(name="id", type="string", length=255)
     * @ORM\Id
     */
    private $carId;

    /**
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z0-9]$/",
     *     match = false,
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $maker;

    /**
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z0-9 ]$/",
     *     match = false,
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @Assert\Regex(
     *     pattern = "/^[0-9]$/",
     *     match = false,
     * )
     * @ORM\Column(type="integer")
     */
    private $carYear;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transmission;
    /**
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z0-9]$/",
     *     match = false,
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $engineVolume;

    /**
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z ]$/",
     *     match = false,
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $carBody;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="cars")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", unique=false)
     */
    private $user;


    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Orders", mappedBy="car")
     */
    public $orders;


    /**
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z0-9 ]$/",
     *     match = false,
     * )
     * @ORM\Column(name="comments",type="string", length=255)
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Profile", inversedBy="cars")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    private $profile;

    /**
     * @return mixed
     */
    public function getCarYear()
    {
        return $this->carYear;
    }

    /**
     * @param mixed $carYear
     */
    public function setCarYear($carYear)
    {
        $this->carYear = $carYear;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getEngineVolume()
    {
        return $this->engineVolume;
    }

    /**
     * @param mixed $engineVolume
     */
    public function setEngineVolume($engineVolume)
    {
        $this->engineVolume = $engineVolume;
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

    /**
     * @return mixed
     */
    public function getMaker()
    {
        return $this->maker;
    }

    /**
     * @param mixed $maker
     */
    public function setMaker($maker)
    {
        $this->maker = $maker;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }


    /**
     * @return mixed
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * @param mixed $transmission
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @return mixed
     */
    public function getCarBody()
    {
        return $this->carBody;
    }

    /**
     * @param mixed $carBody
     */
    public function setCarBody($carBody)
    {
        $this->carBody = $carBody;
    }



    /**
     * @param mixed $orders
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComments($comment)
    {
        $this->comment = $comment;
    }



}