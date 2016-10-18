<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PictureAdditional
 *
 * @ORM\Table(name="PictureAdditional", indexes={@ORM\Index(name="field", columns={"field"}), @ORM\Index(name="value", columns={"value"}), @ORM\Index(name="picture_id", columns={"picture_id"})})
 * @ORM\Entity
 */
class PictureAdditional
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
     * @ORM\Column(name="field", type="string", length=64, nullable=false)
     */
    private $field;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=128, nullable=false)
     */
    private $value;

    /**
     * @var \AppBundle\Entity\Picture
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Picture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="picture_id", referencedColumnName="id")
     * })
     */
    private $picture;



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
     * Set field
     *
     * @param string $field
     *
     * @return PictureAdditional
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return PictureAdditional
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set picture
     *
     * @param \AppBundle\Entity\Picture $picture
     *
     * @return PictureAdditional
     */
    public function setPicture(\AppBundle\Entity\Picture $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \AppBundle\Entity\Picture
     */
    public function getPicture()
    {
        return $this->picture;
    }
}
