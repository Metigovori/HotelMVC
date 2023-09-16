<?php

namespace App\Controllers;

use App\Models\Roombook;
use Core\View;
use Core\Controller;

class RoombookController extends Controller
{
    public function index()
    {
        $rooms = Roombook::orderBy('id', 'desc')->get();
        View::renderTemplate('Rooms/index.html', ['rooms' => $rooms]);
    }

    public function create()
    {
        View::renderTemplate('Rooms/create.html');
    }

    public function store()
    {
        $room = new Roombook();
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
        $room = Roombook::findOrFail($_POST['id']);
        View::renderTemplate('Rooms/edit.html', ['room' => $room]);
    }

    public function update()
    {
        $room = Roombook::findOrFail($_POST['id']);
        $room->type = $_POST['type'];
        $room->bedding = $_POST['bedding'];
        $room->place = $_POST['place'];
        $room->cusid = $_POST['cusid'];
        $room->update();
        header("Location: /rooms");
    }

    public function destroy()
    {
        $room = Roombook::findOrFail($_POST['id']);
        $room->delete();
        header("Location: /rooms");
    }
}
