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


    /**
     * Get dishId
     *
     * @return integer 
     */
    public function getDishId()
    {
        return $this->dishId;
    }

    /**
     * Set fName
     *
     * @param string $fName
     * @return Dish
     */
    public function setFName($fName)
    {
        $this->fName = $fName;

        return $this;
    }

    /**
     * Get fName
     *
     * @return string 
     */
    public function getFName()
    {
        return $this->fName;
    }

    /**
     * Set cName
     *
     * @param string $cName
     * @return Dish
     */
    public function setCName($cName)
    {
        $this->cName = $cName;

        return $this;
    }

    /**
     * Get cName
     *
     * @return string 
     */
    public function getCName()
    {
        return $this->cName;
    }

    /**
     * Set eName
     *
     * @param string $eName
     * @return Dish
     */
    public function setEName($eName)
    {
        $this->eName = $eName;

        return $this;
    }

    /**
     * Get eName
     *
     * @return string 
     */
    public function getEName()
    {
        return $this->eName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Dish
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Dish
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set spiceDgree
     *
     * @param integer $spiceDgree
     * @return Dish
     */
    public function setSpiceDgree($spiceDgree)
    {
        $this->spiceDgree = $spiceDgree;

        return $this;
    }

    /**
     * Get spiceDgree
     *
     * @return integer 
     */
    public function getSpiceDgree()
    {
        return $this->spiceDgree;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Dish
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set category
     *
     * @param \Menu\Entity\Category $category
     * @return Dish
     */
    public function setCategory(\Menu\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Menu\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set restaurant
     *
     * @param \Menu\Entity\Restaurant $restaurant
     * @return Dish
     */
    public function setRestaurant(\Menu\Entity\Restaurant $restaurant = null)
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    /**
     * Get restaurant
     *
     * @return \Menu\Entity\Restaurant 
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * Add order
     *
     * @param \Menu\Entity\Order $order
     * @return Dish
     */
    public function addOrder(\Menu\Entity\Order $order)
    {
        $this->order[] = $order;

        return $this;
    }

    /**
     * Remove order
     *
     * @param \Menu\Entity\Order $order
     */
    public function removeOrder(\Menu\Entity\Order $order)
    {
        $this->order->removeElement($order);
    }

    /**
     * Get order
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrder()
    {
        return $this->order;
    }
}
