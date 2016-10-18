<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="Article", uniqueConstraints={@ORM\UniqueConstraint(name="alias", columns={"alias"})})
 * @ORM\Entity
 */
class Article
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
     * @ORM\Column(name="header", type="string", length=255, nullable=false)
     */
    private $header;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=128, nullable=false)
     */
    private $alias;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=128, nullable=false)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer", nullable=true)
     */
    private $categoryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ord", type="integer", nullable=true)
     */
    private $ord;

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
     * @ORM\Column(name="tag_desctiption", type="string", length=255, nullable=false)
     */
    private $tagDesctiption;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=true)
     */
    private $views;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_updated", type="datetime", nullable=false)
     */
    private $dateUpdated;



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
     * @return Article
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
     * Set header
     *
     * @param string $header
     *
     * @return Article
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get header
     *
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return Article
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Article
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
     * Set picture
     *
     * @param string $picture
     *
     * @return Article
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
     * Set description
     *
     * @param string $description
     *
     * @return Article
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
     * Set text
     *
     * @param string $text
     *
     * @return Article
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     *
     * @return Article
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return Article
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
     * Set tagTitle
     *
     * @param string $tagTitle
     *
     * @return Article
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
     * @return Article
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
     * Set tagDesctiption
     *
     * @param string $tagDesctiption
     *
     * @return Article
     */
    public function setTagDesctiption($tagDesctiption)
    {
        $this->tagDesctiption = $tagDesctiption;

        return $this;
    }

    /**
     * Get tagDesctiption
     *
     * @return string
     */
    public function getTagDesctiption()
    {
        return $this->tagDesctiption;
    }

    /**
     * Set views
     *
     * @param integer $views
     *
     * @return Article
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
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Article
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     *
     * @return Article
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }
}
