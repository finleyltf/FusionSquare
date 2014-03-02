<?php

namespace Menu\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Buffet1
 *
 * @ORM\Table(name="buffet1")
 * @ORM\Entity
 */
class Buffet1
{
    /**
     * @var integer
     *
     * @ORM\Column(name="buffet1_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $buffet1Id;


    /**
     * @var integer
     *
     * @ORM\Column(name="day_mark", type="integer", nullable=false)
     */
    private $dayMark;

    /**
     * @var integer
     *
     * @ORM\Column(name="display_order", type="integer", nullable=true)
     */
    private $displayOrder;

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
     * @ORM\Column(name="f_name", type="string", length=45, nullable=true)
     */
    private $fName;

    /**
     * @var integer
     *
     * @ORM\Column(name="spice_degree", type="integer", nullable=true)
     */
    private $spiceDegree;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cold_dish", type="boolean", nullable=true)
     */
    private $coldDish;

    /**
     * @param int $dayMark
     */
    public function setDayMark($dayMark)
    {
        $this->dayMark = $dayMark;
    }

    /**
     * @return int
     */
    public function getDayMark()
    {
        return $this->dayMark;
    }

    /**
     * @param int $buffet1Id
     */
    public function setBuffet1Id($buffet1Id)
    {
        $this->buffet1Id = $buffet1Id;
    }

    /**
     * @return int
     */
    public function getBuffet1Id()
    {
        return $this->buffet1Id;
    }


    /**
     * @param int $displayOrder
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->$displayOrder = $displayOrder;
    }

    /**
     * @return int
     */
    public function getDisplayOrder()
    {
        return $this->displayOrder;
    }


    /**
     * Set cName
     *
     * @param string $cName
     *
     * @return Buffet1
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
     *
     * @return Buffet1
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
     * Set fName
     *
     * @param string $fName
     *
     * @return Buffet1
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
     * Set spiceDegree
     *
     * @param integer $spiceDegree
     *
     * @return Buffet1
     */
    public function setSpiceDegree($spiceDegree)
    {
        $this->spiceDegree = $spiceDegree;

        return $this;
    }

    /**
     * Get spiceDegree
     *
     * @return integer
     */
    public function getSpiceDegree()
    {
        return $this->spiceDegree;
    }

    /**
     * Set coldDish
     *
     * @param boolean $coldDish
     *
     * @return Buffet1
     */
    public function setColdDish($coldDish)
    {
        $this->coldDish = $coldDish;

        return $this;
    }

    /**
     * Get coldDish
     *
     * @return boolean
     */
    public function getColdDish()
    {
        return $this->coldDish;
    }

    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }

    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed  $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
    }


    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate($data = array())
    {
        $this->buffet1Id    = $data['buffet1Id'];
        $this->dayMark      = $data['dayMark'];
        $this->displayOrder = $data['displayOrder'];
        $this->cName        = $data['cName'];
        $this->eName        = $data['eName'];
        $this->fName        = $data['fName'];
        $this->spiceDegree  = $data['spiceDegree'];
        $this->coldDish     = $data['coldDish'];
    }

}
