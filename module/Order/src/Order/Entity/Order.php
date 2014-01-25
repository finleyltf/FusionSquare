<?php

namespace Order\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="order", indexes={@ORM\Index(name="fk_order_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Order
{
    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderId;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_price", type="integer", nullable=false)
     */
    private $totalPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="delivery_time", type="datetime", nullable=true)
     */
    private $deliveryTime;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_address", type="string", length=45, nullable=false)
     */
    private $deliveryAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="pay_status", type="string", length=45, nullable=true)
     */
    private $payStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="pay_method", type="string", length=45, nullable=true)
     */
    private $payMethod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="order_time", type="datetime", nullable=true)
     */
    private $orderTime;

    /**
     * @var \Menu\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Menu\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Menu\Entity\Dish", inversedBy="order")
     * @ORM\JoinTable(name="order_detail",
     *   joinColumns={
     *     @ORM\JoinColumn(name="order_id", referencedColumnName="order_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="dish_id", referencedColumnName="dish_id")
     *   }
     * )
     */
    private $dish;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dish = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get orderId
     *
     * @return integer 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set totalPrice
     *
     * @param integer $totalPrice
     * @return Order
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get totalPrice
     *
     * @return integer 
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set deliveryTime
     *
     * @param \DateTime $deliveryTime
     * @return Order
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->deliveryTime = $deliveryTime;

        return $this;
    }

    /**
     * Get deliveryTime
     *
     * @return \DateTime 
     */
    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }

    /**
     * Set deliveryAddress
     *
     * @param string $deliveryAddress
     * @return Order
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    /**
     * Get deliveryAddress
     *
     * @return string 
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * Set payStatus
     *
     * @param string $payStatus
     * @return Order
     */
    public function setPayStatus($payStatus)
    {
        $this->payStatus = $payStatus;

        return $this;
    }

    /**
     * Get payStatus
     *
     * @return string 
     */
    public function getPayStatus()
    {
        return $this->payStatus;
    }

    /**
     * Set payMethod
     *
     * @param string $payMethod
     * @return Order
     */
    public function setPayMethod($payMethod)
    {
        $this->payMethod = $payMethod;

        return $this;
    }

    /**
     * Get payMethod
     *
     * @return string 
     */
    public function getPayMethod()
    {
        return $this->payMethod;
    }

    /**
     * Set orderTime
     *
     * @param \DateTime $orderTime
     * @return Order
     */
    public function setOrderTime($orderTime)
    {
        $this->orderTime = $orderTime;

        return $this;
    }

    /**
     * Get orderTime
     *
     * @return \DateTime 
     */
    public function getOrderTime()
    {
        return $this->orderTime;
    }

    /**
     * Set user
     *
     * @param \Menu\Entity\User $user
     * @return Order
     */
    public function setUser(\Menu\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Menu\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add dish
     *
     * @param \Menu\Entity\Dish $dish
     * @return Order
     */
    public function addDish(\Menu\Entity\Dish $dish)
    {
        $this->dish[] = $dish;

        return $this;
    }

    /**
     * Remove dish
     *
     * @param \Menu\Entity\Dish $dish
     */
    public function removeDish(\Menu\Entity\Dish $dish)
    {
        $this->dish->removeElement($dish);
    }

    /**
     * Get dish
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDish()
    {
        return $this->dish;
    }
}
