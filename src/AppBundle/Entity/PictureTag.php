<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PictureTag
 *
 * @ORM\Table(name="PictureTag", indexes={@ORM\Index(name="FK_PictureTag_tag_id", columns={"genre_id"})})
 * @ORM\Entity
 */
class PictureTag
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pic_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pictureId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tag_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $tagId;



    /**
     * Set pictureId
     *
     * @param integer $pictureId
     *
     * @return PictureTag
     */
    public function setPictureId($pictureId)
    {
        $this->pictureId = $pictureId;

        return $this;
    }

    /**
     * Get pictureId
     *
     * @return integer
     */
    public function getPictureId()
    {
        return $this->pictureId;
    }

    /**
     * Set tagId
     *
     * @param integer $tagId
     *
     * @return PictureTag
     */
    public function setTagId($tagId)
    {
        $this->tagId = $tagId;

        return $this;
    }

    /**
     * Get tagId
     *
     * @return integer
     */
    public function getTagId()
    {
        return $this->tagId;
    }
}
