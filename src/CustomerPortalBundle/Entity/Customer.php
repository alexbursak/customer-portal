<?php

namespace AB\CustomerPortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="customers")
 * @ORM\Entity(repositoryClass="AB\CustomerPortalBundle\Repository\CustomerRepository")
 */
class Customer extends User
{
    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="AB\CustomerPortalBundle\Entity\Passenger", mappedBy="customer")
     */
    private $passengers;

    public function __construct()
    {
        parent::__construct();

        $this->passengers = new ArrayCollection();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @param Passenger $passenger
     *
     * @return Customer
     */
    public function addPassenger(Passenger $passenger)
    {
        $this->passengers[] = $passenger;

        return $this;
    }

    /**
     * @param Passenger $passenger
     */
    public function removePassenger(Passenger $passenger)
    {
        $this->passengers->removeElement($passenger);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPassengers()
    {
        return $this->passengers->getValues();
    }
}
