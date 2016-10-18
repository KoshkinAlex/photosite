<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="Vote", indexes={@ORM\Index(name="user_key", columns={"user_key"}), @ORM\Index(name="module_id", columns={"module_id"}), @ORM\Index(name="module_key", columns={"module_key"}), @ORM\Index(name="datetime", columns={"datetime"})})
 * @ORM\Entity
 */
class Vote
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
     * @ORM\Column(name="module_key", type="integer", nullable=false)
     */
    private $moduleKey;

    /**
     * @var integer
     *
     * @ORM\Column(name="module_id", type="integer", nullable=false)
     */
    private $moduleId;

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer", nullable=false)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="datetime", type="integer", nullable=false)
     */
    private $datetime;

    /**
     * @var string
     *
     * @ORM\Column(name="user_key", type="string", length=32, nullable=false)
     */
    private $userKey;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_fraud", type="boolean", nullable=false)
     */
    private $isFraud;



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
     * Set moduleKey
     *
     * @param integer $moduleKey
     *
     * @return Vote
     */
    public function setModuleKey($moduleKey)
    {
        $this->moduleKey = $moduleKey;

        return $this;
    }

    /**
     * Get moduleKey
     *
     * @return integer
     */
    public function getModuleKey()
    {
        return $this->moduleKey;
    }

    /**
     * Set moduleId
     *
     * @param integer $moduleId
     *
     * @return Vote
     */
    public function setModuleId($moduleId)
    {
        $this->moduleId = $moduleId;

        return $this;
    }

    /**
     * Get moduleId
     *
     * @return integer
     */
    public function getModuleId()
    {
        return $this->moduleId;
    }

    /**
     * Set value
     *
     * @param integer $value
     *
     * @return Vote
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set datetime
     *
     * @param integer $datetime
     *
     * @return Vote
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return integer
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set userKey
     *
     * @param string $userKey
     *
     * @return Vote
     */
    public function setUserKey($userKey)
    {
        $this->userKey = $userKey;

        return $this;
    }

    /**
     * Get userKey
     *
     * @return string
     */
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * Set isFraud
     *
     * @param boolean $isFraud
     *
     * @return Vote
     */
    public function setIsFraud($isFraud)
    {
        $this->isFraud = $isFraud;

        return $this;
    }

    /**
     * Get isFraud
     *
     * @return boolean
     */
    public function getIsFraud()
    {
        return $this->isFraud;
    }
}
