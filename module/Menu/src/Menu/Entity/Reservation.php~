<?php

namespace Menu\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="reservation_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reservationId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=45, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="time", type="string", length=45, nullable=true)
     */
    private $time;

    /**
     * @var integer
     *
     * @ORM\Column(name="people_amount", type="integer", nullable=true)
     */
    private $peopleAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=45, nullable=true)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="restaurant", type="string", length=45, nullable=true)
     */
    private $restaurant;


}
