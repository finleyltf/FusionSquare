<?php

namespace Menu\Entity;

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

}
