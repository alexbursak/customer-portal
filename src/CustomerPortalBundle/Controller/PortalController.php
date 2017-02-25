<?php

namespace AB\CustomerPortalBundle\Controller;

use AB\CustomerPortalBundle\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PortalController extends Controller
{
    public function indexAction()
    {
        return $this->render('CustomerPortalBundle:Portal:index.html.twig');
    }

    public function portalAction()
    {
//        $customer = $this->get('security.token_storage')->getToken()->getUser();

        $customer = new Customer();

        return $this->render('CustomerPortalBundle:Portal:portal.html.twig', [
            'customer' => $customer
        ]);
    }
}
