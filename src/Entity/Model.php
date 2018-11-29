<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ModelRepository")
 */
class Model
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
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Maker", inversedBy="model")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="carMaker_id", referencedColumnName="id")
     * })
     */
    private $maker;

    /**
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z0-9]$/",
     *     match = false,
     * )
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $modelName;

    public function __constructor()
    {
        $this->maker = new ArrayCollection();
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
    public function getModelName()
    {
        return $this->modelName;
    }

    /**
     * @param mixed $modelName
     */
    public function setModelName($modelName)
    {
        $this->modelName = $modelName;
    }


    public function __toString() {
        return  $this->modelName; }


}
