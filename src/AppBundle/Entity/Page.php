<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table(name="Page")
 * @ORM\Entity
 */
class Page
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
     * @var integer
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=false)
     */
    private $parentId;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=64, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="heading", type="string", length=255, nullable=false)
     */
    private $heading;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

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
     * @ORM\Column(name="show_main_menu", type="boolean", nullable=false)
     */
    private $showMainMenu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="show_pic_menu", type="boolean", nullable=false)
     */
    private $showPicMenu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="show_context_menu", type="boolean", nullable=false)
     */
    private $showContextMenu;

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
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return Page
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Page
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Page
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
     * Set heading
     *
     * @param string $heading
     *
     * @return Page
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * Get heading
     *
     * @return string
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Page
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
     * Set ord
     *
     * @param integer $ord
     *
     * @return Page
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
     * @return Page
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
     * Set showMainMenu
     *
     * @param boolean $showMainMenu
     *
     * @return Page
     */
    public function setShowMainMenu($showMainMenu)
    {
        $this->showMainMenu = $showMainMenu;

        return $this;
    }

    /**
     * Get showMainMenu
     *
     * @return boolean
     */
    public function getShowMainMenu()
    {
        return $this->showMainMenu;
    }

    /**
     * Set showPicMenu
     *
     * @param boolean $showPicMenu
     *
     * @return Page
     */
    public function setShowPicMenu($showPicMenu)
    {
        $this->showPicMenu = $showPicMenu;

        return $this;
    }

    /**
     * Get showPicMenu
     *
     * @return boolean
     */
    public function getShowPicMenu()
    {
        return $this->showPicMenu;
    }

    /**
     * Set showContextMenu
     *
     * @param boolean $showContextMenu
     *
     * @return Page
     */
    public function setShowContextMenu($showContextMenu)
    {
        $this->showContextMenu = $showContextMenu;

        return $this;
    }

    /**
     * Get showContextMenu
     *
     * @return boolean
     */
    public function getShowContextMenu()
    {
        return $this->showContextMenu;
    }

    /**
     * Set tagTitle
     *
     * @param string $tagTitle
     *
     * @return Page
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
     * @return Page
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
     * @return Page
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
