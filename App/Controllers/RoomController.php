<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Rooms;
use Core\View;
use Core\Controller;

class RoomController extends Controller
{
    public function __construct()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()){
            header('Location: /login-form');
        }
    }
    public function index()
    {
        $rooms = Rooms::orderBy('id', 'desc')->get();
        View::renderTemplate('Rooms/settings.html', ['rooms' => $rooms]);
    }

    public function roomDel()
    {
        $rooms = Rooms::orderBy('id', 'desc')->get();
        View::renderTemplate('Rooms/delete-room.html', ['rooms' => $rooms]);
    }

    public function roomAdd()
    {
        $rooms = Rooms::orderBy('id', 'desc')->get();
        View::renderTemplate('Rooms/create-room.html', ['rooms' => $rooms]);
    }

    public function create()
    {
        View::renderTemplate('Rooms/create.html');
    }

    public function store()
    {
        $room = new Rooms();
        $room->type = $_POST['type'];
        $room->bedding = $_POST['bedding'];
        $room->place = $_POST['place'];
        $room->cusid = $_POST['cusid'];
        $room->save();
        header("Location: /rooms");
    }

    public function show()
    {
        // Implement if needed
    }

    public function edit()
    {
        $room = Rooms::findOrFail($_POST['id']);
        View::renderTemplate('Rooms/edit.html', ['room' => $room]);
    }

    public function update()
    {
        $room = Rooms::findOrFail($_POST['id']);
        $room->type = $_POST['type'];
        $room->bedding = $_POST['bedding'];
        $room->place = $_POST['place'];
        $room->cusid = $_POST['cusid'];
        $room->update();
        header("Location: /rooms");
    }

    public function destroy()
    {
        $room = Rooms::findOrFail($_POST['id']);
        $room->delete();
        header("Location: /rooms");
    }
}
