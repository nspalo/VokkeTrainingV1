<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entities\User;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="Product")
     *  @JoinColumn(name="user_id", referencedColumnName="id")
     * @var User
     */
    protected $user;

    /**
     * @ORM\ManyToMany(targetEntity="ProductCategory", mappedBy="Product", cascade={"persist"})
     * @JoinColumn(name="category_id", referencedColumnName="id")
     * @var ArrayCollection|Categories[]
     */
    protected $categories;

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
    protected $price;

    /**
     * Product constructor.
     * @param User $user
     * @param $name
     * @param $price
     */
    public function __construct(User $user, $name, $price)
    {
        $this->user = $user;
        $this->name = $name;
        $this->price = $price;
        $this->categories = new ArrayCollection;
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return ProductCategory[]|ArrayCollection
     */
    public function getProductCategories()
    {
        return $this->categories;
    }

    /**
     * @param ProductCategory[]|ArrayCollection $categories
     */
    public function setProductCategories($categories): void
    {
        $this->categories = $categories;
    }


}