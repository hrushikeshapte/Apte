<?php

namespace Apte\InstagramBundle\Controller;
use Apte\InstagramBundle\Service\InstagramWrapper;
use Apte\InstagramBundle\Service\Instagram;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//Start a session so we can keep the Auth Token throughout the session
session_start();
class HomeControllerController extends Controller
{
    /*
     * Render Popular Action: This action uses the code returned by Instagram in order to request an Access Token
     * and keep it.It also renders the popular media by putting a call through to guzzle (View _makeCall in Instagram.php)
     * "/media/popular" -> Guzzle -> Instagram API -> Response -> Guzzle -> JSON
     * Route: /showPopular?code=...
     */
    public function renderPopularAction()
    {
        //This is the code instagram sends which we have to capture in order to get an access token
        $code = $_GET['code'];

        //Instantiate a the Instagram Class
        $instagram = new Instagram('a632fdcdf0b94a27b27d23afa6b8633f');

        //Get the authorization token, given our code
        $data = $instagram->getOAuthToken($code);

        //Store that auth token in memory so we can use it for further pages
        $_SESSION['AuthToken'] = $data;

        //Call "media/popular" through Guzzle and get a JSON response of all the popular media
        $popular = $instagram->getPopularMedia();




        //Pass the variable to the view so it can render it.
        return $this->render('ApteInstagramBundle:HomeController:renderPopular.html.twig', array('response' =>  $popular));
    }


    /*
     * This function shows the photo along with the details of that photo
     * Route :/show/{id}
     * Parameter required: Media ID (Passed on by previous view)
     */

    public function showPhotoAction($id)
    {
        //Initialization (this time don't give all the details such as API KEY)
        $instagram = new Instagram('a632fdcdf0b94a27b27d23afa6b8633f');

        //Get the media properties via guzzle and take the json, put it in a php array
        $image = $instagram->getMedia($id);

        //Pass this PHP array into the view to render
        return $this->render('ApteInstagramBundle:HomeController:showPhoto.html.twig', array('image' =>  $image));
    }

}
