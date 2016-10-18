<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Albumgenre
 *
 * @ORM\Table(name="AlbumGenre", indexes={@ORM\Index(name="FK_genre", columns={"genre_id"})})
 * @ORM\Entity
 */
class Albumgenre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="album_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $albumId;

    /**
     * @var integer
     *
     * @ORM\Column(name="genre_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $genreId;



    /**
     * Set albumId
     *
     * @param integer $albumId
     *
     * @return Albumgenre
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
     * Set genreId
     *
     * @param integer $genreId
     *
     * @return Albumgenre
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
}
