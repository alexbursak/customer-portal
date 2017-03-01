<?php

namespace AB\CustomerPortalBundle\Repository;

use AB\CustomerPortalBundle\Entity\Passenger;

/**
 * PassengerRepository
 */
class PassengerRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $passenger
     * @param $customer
     * @return bool
     */
    public function insertNewPassenger($passenger, $customer)
    {
        $em = $this->getEntityManager();

        $passengerPersistable = new Passenger();
        $passengerPersistable->setTitle($passenger->title);
        $passengerPersistable->setName($passenger->name);
        $passengerPersistable->setSurname($passenger->surname);
        $passengerPersistable->setPassportID($passenger->passportID);
        $passengerPersistable->setCustomer($customer);

        $em->persist($customer);
        $em->persist($passengerPersistable);

        $em->flush();

        return true;
    }

    public function deletePassenger($passengerID)
    {
        $em = $this->getEntityManager();

        $passenger = $em->find('CustomerPortalBundle:Passenger', $passengerID);

        $em->remove($passenger);
        $em->flush();

        return true;
    }

}
