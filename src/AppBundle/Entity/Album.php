<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="Album")
 * @ORM\Entity
 */
class Album
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_updated", type="datetime", nullable=true)
     */
    private $lastUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_pic_id", type="integer", nullable=false)
     */
    private $lastPicId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

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
     * @return Album
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
     * Set picture
     *
     * @param string $picture
     *
     * @return Album
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
     * @return Album
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
     * @return Album
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
     * @return Album
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Album
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
     * Set lastUpdated
     *
     * @param \DateTime $lastUpdated
     *
     * @return Album
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    /**
     * Get lastUpdated
     *
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Set lastPicId
     *
     * @param integer $lastPicId
     *
     * @return Album
     */
    public function setLastPicId($lastPicId)
    {
        $this->lastPicId = $lastPicId;

        return $this;
    }

    /**
     * Get lastPicId
     *
     * @return integer
     */
    public function getLastPicId()
    {
        return $this->lastPicId;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Album
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set tagTitle
     *
     * @param string $tagTitle
     *
     * @return Album
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
     * @return Album
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
     * @return Album
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
}
