<?php

namespace AB\CustomerPortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Passenger
 *
 * @ORM\Table(name="passengers")
 * @ORM\Entity(repositoryClass="AB\CustomerPortalBundle\Repository\PassengerRepository")
 */
class Passenger
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="passportID", type="string", length=255)
     */
    private $passportID;

    /**
     * @ORM\ManyToOne(targetEntity="AB\CustomerPortalBundle\Entity\Customer", inversedBy="passengers")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $title
     *
     * @return Passenger
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $name
     *
     * @return Passenger
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $surname
     *
     * @return Passenger
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $passportID
     *
     * @return Passenger
     */
    public function setPassportID($passportID)
    {
        $this->passportID = $passportID;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassportID()
    {
        return $this->passportID;
    }

    /**
     * @param string $customer
     *
     * @return Passenger
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}

