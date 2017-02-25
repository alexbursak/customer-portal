<?php

namespace AB\CustomerPortalBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PortalControllerTest extends WebTestCase
{
    public function testApplicationIndexPageResponse()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
