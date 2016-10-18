<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PictureGenre
 *
 * @ORM\Table(name="PictureGenre", indexes={@ORM\Index(name="FK_genre", columns={"genre_id"})})
 * @ORM\Entity
 */
class PictureGenre
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
     * @ORM\Column(name="genre_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $genreId;


    /**
     * Set genreId
     *
     * @param integer $genreId
     *
     * @return PictureGenre
     */
    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;

        return $this;
    }

    /**
     * Get genreId
     *
     * @return integer
     */
    public function getGenreId()
    {
        return $this->genreId;
    }

    /**
     * Set pictureId
     *
     * @param integer $pictureId
     *
     * @return PictureGenre
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
}
