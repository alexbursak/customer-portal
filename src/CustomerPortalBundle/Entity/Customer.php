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

    /**
     * @ORM\OneToMany(targetEntity="AB\CustomerPortalBundle\Entity\Trip", mappedBy="customer")
     */
    private $trips;

    public function __construct()
    {
        parent::__construct();

        $this->passengers = new ArrayCollection();
        $this->trips = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * @param Trip $trip
     *
     * @return Customer
     */
    public function addTrip(Trip $trip)
    {
        $this->trips[] = $trip;

        return $this;
    }

    /**
     * @param Trip $trip
     */
    public function removeTrip(Trip $trip)
    {
        $this->trips->removeElement($trip);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrips()
    {
        return $this->trips->getValues();
    }
}
