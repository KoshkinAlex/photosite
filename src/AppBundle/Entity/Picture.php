<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 *
 * @ORM\Table(name="Picture", indexes={@ORM\Index(name="visible", columns={"visible"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PictureRepository")
 */
class Picture
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
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="album_id", type="integer", nullable=false)
     */
    private $albumId;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=100, nullable=false)
     */
    private $filename;

    /**
     * @var integer
     *
     * @ORM\Column(name="ord", type="integer", nullable=false)
     */
    private $ord;

    /**
     * @var integer
     *
     * @ORM\Column(name="ord_album", type="integer", nullable=false)
     */
    private $ordAlbum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_shot", type="date", nullable=true)
     */
    private $dateShot;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_upload", type="datetime", nullable=true)
     */
    private $dateUpload;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=255, nullable=true)
     */
    private $place;

    /**
     * @var string
     *
     * @ORM\Column(name="pic_w", type="string", length=5, nullable=false)
     */
    private $picW;

    /**
     * @var string
     *
     * @ORM\Column(name="pic_h", type="string", length=5, nullable=false)
     */
    private $picH;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false)
     */
    private $visible;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating_author", type="integer", nullable=false)
     */
    private $ratingAuthor;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating_users", type="integer", nullable=false)
     */
    private $ratingUsers;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=false)
     */
    private $views;

    /**
     * @var integer
     *
     * @ORM\Column(name="votes", type="integer", nullable=false)
     */
    private $votes;

    /**
     * @var integer
     *
     * @ORM\Column(name="clicks", type="integer", nullable=false)
     */
    private $clicks;

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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Genre", inversedBy="pic")
     * @ORM\JoinTable(name="PictureGenre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pic_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     *   }
     * )
     */
    private $genre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", inversedBy="pic")
     * @ORM\JoinTable(name="PictureTag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pic_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->genre = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Picture
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
     * Set description
     *
     * @param string $description
     *
     * @return Picture
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
     * Set albumId
     *
     * @param integer $albumId
     *
     * @return Picture
     */
    public function setAlbumId($albumId)
    {
        $this->albumId = $albumId;

        return $this;
    }

    /**
     * Get albumId
     *
     * @return integer
     */
    public function getAlbumId()
    {
        return $this->albumId;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Picture
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return Picture
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return Picture
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
     * Set ordAlbum
     *
     * @param integer $ordAlbum
     *
     * @return Picture
     */
    public function setOrdAlbum($ordAlbum)
    {
        $this->ordAlbum = $ordAlbum;

        return $this;
    }

    /**
     * Get ordAlbum
     *
     * @return integer
     */
    public function getOrdAlbum()
    {
        return $this->ordAlbum;
    }

    /**
     * Set dateShot
     *
     * @param \DateTime $dateShot
     *
     * @return Picture
     */
    public function setDateShot($dateShot)
    {
        $this->dateShot = $dateShot;

        return $this;
    }

    /**
     * Get dateShot
     *
     * @return \DateTime
     */
    public function getDateShot()
    {
        return $this->dateShot;
    }

    /**
     * Set dateUpload
     *
     * @param \DateTime $dateUpload
     *
     * @return Picture
     */
    public function setDateUpload($dateUpload)
    {
        $this->dateUpload = $dateUpload;

        return $this;
    }

    /**
     * Get dateUpload
     *
     * @return \DateTime
     */
    public function getDateUpload()
    {
        return $this->dateUpload;
    }

    /**
     * Set place
     *
     * @param string $place
     *
     * @return Picture
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set picW
     *
     * @param string $picW
     *
     * @return Picture
     */
    public function setPicW($picW)
    {
        $this->picW = $picW;

        return $this;
    }

    /**
     * Get picW
     *
     * @return string
     */
    public function getPicW()
    {
        return $this->picW;
    }

    /**
     * Set picH
     *
     * @param string $picH
     *
     * @return Picture
     */
    public function setPicH($picH)
    {
        $this->picH = $picH;

        return $this;
    }

    /**
     * Get picH
     *
     * @return string
     */
    public function getPicH()
    {
        return $this->picH;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     *
     * @return Picture
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
     * Set ratingAuthor
     *
     * @param integer $ratingAuthor
     *
     * @return Picture
     */
    public function setRatingAuthor($ratingAuthor)
    {
        $this->ratingAuthor = $ratingAuthor;

        return $this;
    }

    /**
     * Get ratingAuthor
     *
     * @return integer
     */
    public function getRatingAuthor()
    {
        return $this->ratingAuthor;
    }

    /**
     * Set ratingUsers
     *
     * @param integer $ratingUsers
     *
     * @return Picture
     */
    public function setRatingUsers($ratingUsers)
    {
        $this->ratingUsers = $ratingUsers;

        return $this;
    }

    /**
     * Get ratingUsers
     *
     * @return integer
     */
    public function getRatingUsers()
    {
        return $this->ratingUsers;
    }

    /**
     * Set views
     *
     * @param integer $views
     *
     * @return Picture
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
     * Set votes
     *
     * @param integer $votes
     *
     * @return Picture
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;

        return $this;
    }

    /**
     * Get votes
     *
     * @return integer
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Set clicks
     *
     * @param integer $clicks
     *
     * @return Picture
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;

        return $this;
    }

    /**
     * Get clicks
     *
     * @return integer
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * Set tagTitle
     *
     * @param string $tagTitle
     *
     * @return Picture
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
     * @return Picture
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
     * @return Picture
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
     * Add genre
     *
     * @param \AppBundle\Entity\Genre $genre
     *
     * @return Picture
     */
    public function addGenre(\AppBundle\Entity\Genre $genre)
    {
        $this->genre[] = $genre;

        return $this;
    }

    /**
     * Remove genre
     *
     * @param \AppBundle\Entity\Genre $genre
     */
    public function removeGenre(\AppBundle\Entity\Genre $genre)
    {
        $this->genre->removeElement($genre);
    }

    /**
     * Get genre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Add tag
     *
     * @param \AppBundle\Entity\Tag $tag
     *
     * @return Picture
     */
    public function addTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \AppBundle\Entity\Tag $tag
     */
    public function removeTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTag()
    {
        return $this->tag;
    }
}
