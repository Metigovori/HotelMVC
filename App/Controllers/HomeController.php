<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Contact;
use App\Models\Roombook;
use \Core\View;
use \Core\Controller;

/**
 * Home controller
 */
class HomeController extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */


    public function client()
    {
        View::renderTemplate('LandingPage/index.html');
    }

    public function admin()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
        }
        $contacts = Contact::orderBy('id', 'desc')->get();
        $roombook = Roombook::orderBy('id', 'desc')->get();
        View::renderTemplate('Dashboard/home.html', ['roombook' => $roombook], ['contacts' => $contacts]);
    }
}
