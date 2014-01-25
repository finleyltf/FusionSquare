<?php

namespace Guestbook\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guestbook
 *
 * @ORM\Table(name="guestbook")
 * @ORM\Entity
 */
class Guestbook
{
    /**
     * @var integer
     *
     * @ORM\Column(name="guestbook_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $guestbookId;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=45, nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=45, nullable=true)
     */
    private $date;



    /**
     * Get guestbookId
     *
     * @return integer 
     */
    public function getGuestbookId()
    {
        return $this->guestbookId;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Guestbook
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return Guestbook
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }
}
