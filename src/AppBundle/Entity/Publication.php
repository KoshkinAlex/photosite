<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="Publication")
 * @ORM\Entity
 */
class Publication
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="picture_small", type="string", length=255, nullable=false)
     */
    private $pictureSmall;

    /**
     * @var string
     *
     * @ORM\Column(name="picture_big", type="string", length=255, nullable=false)
     */
    private $pictureBig;



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
     * @return Publication
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Publication
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
     * Set pictureSmall
     *
     * @param string $pictureSmall
     *
     * @return Publication
     */
    public function setPictureSmall($pictureSmall)
    {
        $this->pictureSmall = $pictureSmall;

        return $this;
    }

    /**
     * Get pictureSmall
     *
     * @return string
     */
    public function getPictureSmall()
    {
        return $this->pictureSmall;
    }

    /**
     * Set pictureBig
     *
     * @param string $pictureBig
     *
     * @return Publication
     */
    public function setPictureBig($pictureBig)
    {
        $this->pictureBig = $pictureBig;

        return $this;
    }

    /**
     * Get pictureBig
     *
     * @return string
     */
    public function getPictureBig()
    {
        return $this->pictureBig;
    }
}
