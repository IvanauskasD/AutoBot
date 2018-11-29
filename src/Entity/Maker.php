<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\MakerRepository")
 */
class Maker
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
     * @ORM\Column(name="maker", type="string", length=255)
     */
    private $maker;

    /**
     *  @var Collection|Model[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Model", mappedBy="maker")
     */
    private $model;

    public function __constructor()
    {
        $this->model = new ArrayCollection();
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
    public function __toString() {
        return  $this->maker; }

}
