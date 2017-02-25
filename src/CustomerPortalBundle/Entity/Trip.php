<?php

namespace AB\CustomerPortalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trip
 *
 * @ORM\Table(name="trips")
 * @ORM\Entity(repositoryClass="AB\CustomerPortalBundle\Repository\TripRepository")
 */
class Trip
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
     * @ORM\Column(name="flyFrom", type="string", length=3)
     */
    private $flyFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="flyTo", type="string", length=3)
     */
    private $flyTo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departure", type="datetime")
     */
    private $departure;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrival", type="datetime")
     */
    private $arrival;

    /**
     * @ORM\ManyToMany(targetEntity="AB\CustomerPortalBundle\Entity\Passenger", mappedBy="trips")
     */
    private $passengers;

    /**
     * @ORM\ManyToOne(targetEntity="AB\CustomerPortalBundle\Entity\Customer", inversedBy="trips")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    public function __construct()
    {
        $this->passengers = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $flyFrom
     * @return Trip
     */
    public function setFlyFrom($flyFrom)
    {
        $this->flyFrom = $flyFrom;

        return $this;
    }

    /**
     * @return string
     */
    public function getFlyFrom()
    {
        return $this->flyFrom;
    }

    /**
     * @param string $flyTo
     * @return Trip
     */
    public function setFlyTo($flyTo)
    {
        $this->flyTo = $flyTo;

        return $this;
    }

    /**
     * @return string
     */
    public function getFlyTo()
    {
        return $this->flyTo;
    }

    /**
     * @param \DateTime $departure
     * @return Trip
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @param \DateTime $arrival
     * @return Trip
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * @param Passenger $passenger
     * @return Trip
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
     * @param Customer $customer
     * @return Trip
     */
    public function setCustomer(Customer $customer)
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

