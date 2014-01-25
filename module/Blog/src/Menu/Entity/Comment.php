<?php

namespace Blog\Entity;

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



    /**
     * Get commentId
     *
     * @return integer 
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Comment
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
     * Set commentcol
     *
     * @param string $commentcol
     * @return Comment
     */
    public function setCommentcol($commentcol)
    {
        $this->commentcol = $commentcol;

        return $this;
    }

    /**
     * Get commentcol
     *
     * @return string 
     */
    public function getCommentcol()
    {
        return $this->commentcol;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Comment
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set blog
     *
     * @param \Menu\Entity\Blog $blog
     * @return Comment
     */
    public function setBlog(\Menu\Entity\Blog $blog = null)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog
     *
     * @return \Menu\Entity\Blog 
     */
    public function getBlog()
    {
        return $this->blog;
    }
}
