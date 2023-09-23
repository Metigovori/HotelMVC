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
        if (!empty($session->message)) {
            $message = $session->message;
        }

        if (isset($_SESSION['userId'])) {
            header('Location: /users');
        }

        View::renderTemplate('Users/login.html', ['message' => $message]);
    }

    public function loginStore()
    {
        $usname = $_POST['usname'];
        $pass = $_POST['pass'];
        $user = Users::where('usname', $usname)->where('pass', $pass)->latest()->first();
        $session = Session::getInstance();

        if ($user) {
            $session->login($user);
            $session->setRole($user->role);
            header('Location: /home');
            exit;
        } else {
            $session->message("Your email or password is incorrect");
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
