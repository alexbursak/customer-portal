<?php

namespace AB\CustomerPortalBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PortalController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('CustomerPortalBundle:Portal:index.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function portalAction()
    {
        $customer = $this->get('security.token_storage')->getToken()->getUser();
        $passengers = $customer->getPassengers();

        return $this->render('CustomerPortalBundle:Portal:portal.html.twig', [
            'customer' => $customer,
            'passengers' => $passengers
        ]);
    }
}
