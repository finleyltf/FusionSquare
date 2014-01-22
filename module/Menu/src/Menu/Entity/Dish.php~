<?php

namespace Menu\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dish
 *
 * @ORM\Table(name="dish", indexes={@ORM\Index(name="fk_dish_category1_idx", columns={"category_id"}), @ORM\Index(name="fk_dish_restaurant1_idx", columns={"restaurant_id"})})
 * @ORM\Entity
 */
class Dish
{
    /**
     * @var integer
     *
     * @ORM\Column(name="dish_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dishId;

    /**
     * @var string
     *
     * @ORM\Column(name="f_name", type="string", length=45, nullable=true)
     */
    private $fName;

    /**
     * @var string
     *
     * @ORM\Column(name="c_name", type="string", length=45, nullable=true)
     */
    private $cName;

    /**
     * @var string
     *
     * @ORM\Column(name="e_name", type="string", length=45, nullable=true)
     */
    private $eName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=45, nullable=true)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="spice_dgree", type="integer", nullable=true)
     */
    private $spiceDgree;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=45, nullable=true)
     */
    private $image;

    /**
     * @var \Menu\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="Menu\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     * })
     */
    private $category;

    /**
     * @var \Menu\Entity\Restaurant
     *
     * @ORM\ManyToOne(targetEntity="Menu\Entity\Restaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurant_id", referencedColumnName="restaurant_id")
     * })
     */
    private $restaurant;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Menu\Entity\Order", mappedBy="dish")
     */
    private $order;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->order = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
