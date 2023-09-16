<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Users;
use \Core\View;
use \Core\Controller;


class AuthController extends Controller
{
    public function loginForm()
    {
        $session = Session::getInstance();
        $message = '';
        if(!empty($session->message)){
            $message = $session->message;
        }

        if (isset($_SESSION['userId'])){
            header('Location: /users');
        }

        View::renderTemplate('Users/login.html', ['message' => $message]);
    }

    public function loginStore()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = Users::where('email', $email)->where('password', $password)->latest()->first();
        $session = Session::getInstance();
        if ($user) {
            $session->login($user);
            header('Location: /users');
            exit;
        } else {
            $session->message("Your email or password is incorrent");
            header('Location: /login-form');
        }
        header('Location: /login-form');
    }

    public function logout()
    {
        $session = Session::getInstance();
        $session->logout();
        header('Location: /login-form');
    }
}
