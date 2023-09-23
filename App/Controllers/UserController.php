<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Users;
use \Core\View;
use \Core\Controller;

class UserController extends Controller
{

    public const TIMESTAMP = false;
    public function __construct()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
        } elseif ($session->getRole() != 'admin') {
            View::renderTemplate('access_denied.html');
        }
    }


    public function index()
    {
        $users = Users::orderBy('id', 'desc')->get();
        View::renderTemplate('Users/usersetting.html', ['users' => $users]);
    }

    public function create()
    {
        View::renderTemplate('Users/usersetting.html');
    }

    public function store()
    {
        $user = new Users();
        $user->usname = $_POST['usname'];
        $user->role = $_POST['role'];
        $user->pass = $_POST['pass'];
        $user->save();
        header("Location: /users");
    }

    public function show()
    {
        // Implement if needed
    }



    public function update()
    {
        $user = Users::findOrFail($_POST['user_id']);
        $user->usname = $_POST['usname'];
        $user->role = $_POST['role'];
        $user->pass = $_POST['pass'];
        $user->update();
        header("Location: /users");
    }

    public function destroy()
    {
        $user = Users::findOrFail($_POST['user_id']);
        $user->delete();
        header("Location: /users");
    }
}
