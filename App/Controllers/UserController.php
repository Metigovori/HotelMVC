<?php
namespace App\Controllers;

use App\Models\User;
use \Core\View;
use \Core\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        View::renderTemplate('Users/index.html', ['users' => $users]);
    }

    public function create()
    {
        View::renderTemplate('Users/create.html');
    }

    public function store()
    {
        $user = new User();
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->country = $_POST['country'];
        $user->city = $_POST['city'];
        $user->address = $_POST['address'];
        $user->phone = $_POST['phone'];
        $user->email = $_POST['email'];
        $user->status = isset($_POST['status']) ? 1 : 0; // Assuming you have a status checkbox
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $user->save();
        header("Location: /users");
    }

    public function show()
    {
        // Implement if needed
    }

    public function edit()
    {
        $user = User::findOrFail($_POST['id']);
        View::renderTemplate('Users/edit.html', ['user' => $user]);
    }

    public function update()
    {
        $user = User::findOrFail($_POST['id']);
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->country = $_POST['country'];
        $user->city = $_POST['city'];
        $user->address = $_POST['address'];
        $user->phone = $_POST['phone'];
        $user->email = $_POST['email'];
        $user->status = isset($_POST['status']) ? 1 : 0; // Assuming you have a status checkbox
        $user->update();
        header("Location: /users");
    }

    public function destroy()
    {
        $user = User::findOrFail($_POST['id']);
        $user->delete();
        header("Location: /users");
    }
}
