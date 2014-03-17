<?php

namespace Apte\InstagramBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerControllerTest extends WebTestCase
{
    public function testRenderpopular()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/renderPopular');
    }

}
