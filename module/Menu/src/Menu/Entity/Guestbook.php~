<?php

namespace Menu\Entity;

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


}
