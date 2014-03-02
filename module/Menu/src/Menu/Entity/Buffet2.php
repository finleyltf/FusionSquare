<?php

namespace Menu\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Buffet2
 *
 * @ORM\Table(name="buffet2")
 * @ORM\Entity
 */
class Buffet2
{
    /**
     * @var integer
     *
     * @ORM\Column(name="buffet2_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $buffet2Id;


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
     * @param int $buffet2Id
     */
    public function setBuffet2Id($buffet2Id)
    {
        $this->buffet2Id = $buffet2Id;
    }

    /**
     * @return int
     */
    public function getBuffet2Id()
    {
        return $this->buffet2Id;
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
     * @return Buffet2
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
     * @return Buffet2
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
     * @return Buffet2
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
     * @return Buffet2
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
     * @return Buffet2
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
        $this->buffet2Id    = $data['buffet2Id'];
        $this->dayMark      = $data['dayMark'];
        $this->displayOrder = $data['displayOrder'];
        $this->cName        = $data['cName'];
        $this->eName        = $data['eName'];
        $this->fName        = $data['fName'];
        $this->spiceDegree  = $data['spiceDegree'];
        $this->coldDish     = $data['coldDish'];
    }

}
