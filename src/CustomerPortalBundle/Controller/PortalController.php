<?php

namespace AB\CustomerPortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PortalController extends Controller
{
    public function indexAction()
    {
        return $this->render('CustomerPortalBundle:Portal:index.html.twig');
    }

    public function portalAction()
    {
        return $this->render('CustomerPortalBundle:Portal:portal.html.twig');
    }
}
