<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table(name="Genre", uniqueConstraints={@ORM\UniqueConstraint(name="alias", columns={"alias"})})
 * @ORM\Entity
 */
class Genre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=32, nullable=false)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=false)
     */
    private $picture;

    /**
     * @var integer
     *
     * @ORM\Column(name="ord", type="integer", nullable=false)
     */
    private $ord;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false)
     */
    private $visible;

    /**
     * @var boolean
     *
     * @ORM\Column(name="show_main", type="boolean", nullable=false)
     */
    private $showMain;

    /**
     * @var string
     *
     * @ORM\Column(name="tag_title", type="string", length=255, nullable=false)
     */
    private $tagTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="tag_keywords", type="string", length=255, nullable=false)
     */
    private $tagKeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="tag_description", type="string", length=255, nullable=false)
     */
    private $tagDescription;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Picture", mappedBy="genre")
     */
    private $pic;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pic = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Genre
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return Genre
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Genre
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return Genre
     */
    public function setOrd($ord)
    {
        $this->ord = $ord;

        return $this;
    }

    /**
     * Get ord
     *
     * @return integer
     */
    public function getOrd()
    {
        return $this->ord;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     *
     * @return Genre
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set showMain
     *
     * @param boolean $showMain
     *
     * @return Genre
     */
    public function setShowMain($showMain)
    {
        $this->showMain = $showMain;

        return $this;
    }

    /**
     * Get showMain
     *
     * @return boolean
     */
    public function getShowMain()
    {
        return $this->showMain;
    }

    /**
     * Set tagTitle
     *
     * @param string $tagTitle
     *
     * @return Genre
     */
    public function setTagTitle($tagTitle)
    {
        $this->tagTitle = $tagTitle;

        return $this;
    }

    /**
     * Get tagTitle
     *
     * @return string
     */
    public function getTagTitle()
    {
        return $this->tagTitle;
    }

    /**
     * Set tagKeywords
     *
     * @param string $tagKeywords
     *
     * @return Genre
     */
    public function setTagKeywords($tagKeywords)
    {
        $this->tagKeywords = $tagKeywords;

        return $this;
    }

    /**
     * Get tagKeywords
     *
     * @return string
     */
    public function getTagKeywords()
    {
        return $this->tagKeywords;
    }

    /**
     * Set tagDescription
     *
     * @param string $tagDescription
     *
     * @return Genre
     */
    public function setTagDescription($tagDescription)
    {
        $this->tagDescription = $tagDescription;

        return $this;
    }

    /**
     * Get tagDescription
     *
     * @return string
     */
    public function getTagDescription()
    {
        return $this->tagDescription;
    }

    /**
     * Add pic
     *
     * @param \AppBundle\Entity\Picture $pic
     *
     * @return Genre
     */
    public function addPic(\AppBundle\Entity\Picture $pic)
    {
        $this->pic[] = $pic;

        return $this;
    }

    /**
     * Remove pic
     *
     * @param \AppBundle\Entity\Picture $pic
     */
    public function removePic(\AppBundle\Entity\Picture $pic)
    {
        $this->pic->removeElement($pic);
    }

    /**
     * Get pic
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPic()
    {
        return $this->pic;
    }
}
