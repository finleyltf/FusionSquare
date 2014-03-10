<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;
use Menu\Entity\Restaurant;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="fk_reservation_restaurant1_idx", columns={"restaurant_id"}), @ORM\Index(name="fk_reservation_user1_idx", columns={"user_id"})})
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
     * @ORM\Column(name="first_name", type="string", length=45, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=45, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="time", type="datetime", nullable=true)
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
     * @var \Menu\Entity\Restaurant
     *
     * @ORM\ManyToOne(targetEntity="Menu\Entity\Restaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurant_id", referencedColumnName="restaurant_id")
     * })
     */
    private $restaurant;

    /**
     * @var \User\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;


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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Reservation
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Reservation
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
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
     *
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
     *
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
     *
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
     * @param \Menu\Entity\Restaurant $restaurant
     *
     * @return Reservation
     */
    public function setRestaurant(\Menu\Entity\Restaurant $restaurant)
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
     * Set user
     *
     * @param \User\Entity\User $user
     *
     * @return Reservation
     */
    public function setUser(\User\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

}
