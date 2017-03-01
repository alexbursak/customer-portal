<?php

namespace AB\CustomerPortalBundle\Controller;


use AB\CustomerPortalBundle\Entity\Passenger;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PortalAPIController extends Controller
{
    /**
     * @return JsonResponse $response
     */
    public function getCustomerAction()
    {
        $customer = $this->get('security.token_storage')
            ->getToken()
            ->getUser();

        $response['id'] = $customer->getId();
        $response['username'] = $customer->getUsername();
        $response['name'] = $customer->getName();
        $response['address'] = $customer->getAddress();
        $response['city'] = $customer->getCity();
        $response['country'] = $customer->getCountry();

        return new JsonResponse((object)$response);
    }

    /**
     * @return JsonResponse - Collection of Passengers
     */
    public function getPassengersAction()
    {
        $passengers = $this->get('security.token_storage')
            ->getToken()
            ->getUser()
            ->getPassengers();

        $response = [];
        foreach ($passengers as $key => $value) {
            $passenger['id'] = $value->getId();
            $passenger['title'] = $value->getTitle();
            $passenger['name'] = $value->getName();
            $passenger['surname'] = $value->getSurname();
            $passenger['passportID'] = $value->getpassportID();

            array_push($response, (object)$passenger);
        }

        return new JsonResponse($response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addPassengerAction(Request $request)
    {
        $customer = $this->get('security.token_storage')
            ->getToken()
            ->getUser();

        $passengerRaw = $request->getContent();
        $passenger = json_decode($passengerRaw);

        if (empty($passengerRaw) || json_last_error() !== JSON_ERROR_NONE) {
            return new JsonResponse('ERROR');
        }

        // persist passenger
        $em = $this->getDoctrine()->getManager();
        $result = $em->getRepository('CustomerPortalBundle:Passenger')
            ->insertNewPassenger($passenger, $customer);

        return new JsonResponse($result);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delPassengerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $result = $em->getRepository('CustomerPortalBundle:Passenger')
            ->deletePassenger($id);

        return new JsonResponse($result);
    }

}
