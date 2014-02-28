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
     * @ORM\Column(name="week_mark", type="integer", nullable=false)
     */
    private $weekMark;

    /**
     * @var integer
     *
     * @ORM\Column(name="display_order", type="integer", nullable=true)
     */
    private $display_order;

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
     * @param int $weekMark
     */
    public function setWeekMark($weekMark)
    {
        $this->weekMark = $weekMark;
    }

    /**
     * @return int
     */
    public function getWeekMark()
    {
        return $this->weekMark;
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
     * @param int $display_order
     */
    public function setDisplayOrder($display_order)
    {
        $this->display_order = $display_order;
    }

    /**
     * @return int
     */
    public function getDisplayOrder()
    {
        return $this->display_order;
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
}
