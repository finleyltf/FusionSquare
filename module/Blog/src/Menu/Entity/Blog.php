<?php

namespace Blog\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blog
 *
 * @ORM\Table(name="blog", indexes={@ORM\Index(name="fk_blog_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Blog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="blog_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $blogId;

    /**
     * @var string
     *
     * @ORM\Column(name="artical", type="text", nullable=true)
     */
    private $artical;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var \Menu\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Menu\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;



    /**
     * Get blogId
     *
     * @return integer 
     */
    public function getBlogId()
    {
        return $this->blogId;
    }

    /**
     * Set artical
     *
     * @param string $artical
     * @return Blog
     */
    public function setArtical($artical)
    {
        $this->artical = $artical;

        return $this;
    }

    /**
     * Get artical
     *
     * @return string 
     */
    public function getArtical()
    {
        return $this->artical;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Blog
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param \Menu\Entity\User $user
     * @return Blog
     */
    public function setUser(\Menu\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Menu\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
