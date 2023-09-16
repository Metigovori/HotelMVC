<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Models\Roombook;
use \Core\View;
use \Core\Controller;

/**
 * Home controller
 */
class Home extends Controller
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
        $contacts = Contact::orderBy('id', 'desc')->get();
        $roombook = Roombook::orderBy('id', 'desc')->get();
        View::renderTemplate('home.html', ['roombook' => $roombook], ['contacts' => $contacts]);
    }
}
