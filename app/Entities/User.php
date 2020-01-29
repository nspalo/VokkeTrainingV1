<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
      */
    protected $gender;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="User", cascade={"persist"})
     * @JoinColumn(name="product_id", referencedColumnName="id")
     * @var ArrayCollection|Product[]
     */
    protected $product;

    /**
     * User constructor.
     * @param $id
     * @param $name
     * @param $gender
     */
    public function __construct($name, $gender)
    {
        $this->setName($name);
        $this->setGender($gender);
        $this->product = new ArrayCollection;
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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return Product[]|ArrayCollection
     */
    public function getUserProduct()
    {
        return $this->product;
    }

    /**
     * @param Product[]|ArrayCollection $product
     */
    public function setUserProduct($product): void
    {
        $this->product = $product;
    }

}