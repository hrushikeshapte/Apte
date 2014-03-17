<?php

namespace Apte\InstagramBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Guzzle\Http\Client;
use Guzzle\Http\EntityBody;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Oauth\OauthPlugin;

// Using the Instagram API from the services folder
use Apte\InstagramBundle\Service\Instagram;


class GuzzleController extends Controller
{
    /*
     * Function: IndexAction | Parameters: None
     * This function instantiates the Instagram API, creates a Login URL using the API
     * and passes it on to the view index. It is basically just for rendering the Logon URL.
     * The default route points to this function (/)
     */

    public function indexAction()
    {

        /*
         * Instantiate the instagram with the parameters Instagram provided when we registered as a client.
         * API KEY: Client ID , API SECRET = Secret Key, Callback: The link which it will go to after the user
         * authorizes the app. (This has to match the one entered in Instagram's dashboard)
         */

        $instagram = new Instagram(array(
                  'apiKey'      => 'a632fdcdf0b94a27b27d23afa6b8633f',
                  'apiSecret'   => '2bc7bc05f31f47aebf68d81419d9729a',
                  'apiCallback' => 'http://localhost/Symfony/Web/app_dev.php/showPopular'
               ));



        //Render the view index.html, make the Instagram API generate a logon URL for use with Guzzle, and pass it on to the view
        return $this->render('ApteInstagramBundle:Guzzle:index.html.twig', array('login_url' => $instagram->getLoginUrl()));

    }



}
