<?php

namespace Menu\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment", indexes={@ORM\Index(name="fk_comment_blog1_idx", columns={"blog_id"})})
 * @ORM\Entity
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="comment_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commentId;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=45, nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="commentcol", type="string", length=45, nullable=true)
     */
    private $commentcol;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=45, nullable=true)
     */
    private $user;

    /**
     * @var \Menu\Entity\Blog
     *
     * @ORM\ManyToOne(targetEntity="Menu\Entity\Blog")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="blog_id", referencedColumnName="blog_id")
     * })
     */
    private $blog;


}
