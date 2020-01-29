<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */
class ProductCategory
{
    /**
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="Product", cascade={"persist"})
     * @JoinColumn(name="product_id", referencedColumnName="id")
     * @var ArrayCollection|Products[]
     */
    protected $products;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $categoryName;

    /**
     * ProductCategory constructor.
     * @param $categoryName
     */
    public function __construct($categoryName)
    {
        $this->categoryName = $categoryName;
        $this->products = new ArrayCollection;
    }

}