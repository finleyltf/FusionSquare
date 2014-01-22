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



    /**
     * Get reservationId
     *
     * @return integer 
     */
    public function getReservationId()
    {
        return $this->reservationId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Reservation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Reservation
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set time
     *
     * @param string $time
     * @return Reservation
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return string 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set peopleAmount
     *
     * @param integer $peopleAmount
     * @return Reservation
     */
    public function setPeopleAmount($peopleAmount)
    {
        $this->peopleAmount = $peopleAmount;

        return $this;
    }

    /**
     * Get peopleAmount
     *
     * @return integer 
     */
    public function getPeopleAmount()
    {
        return $this->peopleAmount;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Reservation
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set restaurant
     *
     * @param string $restaurant
     * @return Reservation
     */
    public function setRestaurant($restaurant)
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    /**
     * Get restaurant
     *
     * @return string 
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }
}
