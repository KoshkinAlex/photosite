<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="Tag")
 * @ORM\Entity
 */
class Tag
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
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=128, nullable=false)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=128, nullable=false)
     */
    private $picture;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=false)
     */
    private $views;

    /**
     * @var integer
     *
     * @ORM\Column(name="ord", type="integer", nullable=false)
     */
    private $ord;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_id", type="integer", nullable=false)
     */
    private $typeId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false)
     */
    private $visible;

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
     * @var string
     *
     * @ORM\Column(name="lr_alias", type="string", length=255, nullable=false)
     */
    private $lrAlias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Picture", mappedBy="tag")
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
     * Set name
     *
     * @param string $name
     *
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Tag
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
     * @return Tag
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
     * @return Tag
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
     * Set views
     *
     * @param integer $views
     *
     * @return Tag
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
     * Get views
     *
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return Tag
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
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return Tag
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     *
     * @return Tag
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
     * Set tagTitle
     *
     * @param string $tagTitle
     *
     * @return Tag
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
     * @return Tag
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
     * @return Tag
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
     * Set lrAlias
     *
     * @param string $lrAlias
     *
     * @return Tag
     */
    public function setLrAlias($lrAlias)
    {
        $this->lrAlias = $lrAlias;

        return $this;
    }

    /**
     * Get lrAlias
     *
     * @return string
     */
    public function getLrAlias()
    {
        return $this->lrAlias;
    }

    /**
     * Add pic
     *
     * @param \AppBundle\Entity\Picture $pic
     *
     * @return Tag
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
