<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Roombook;
use Core\View;
use Core\Controller;

class RoombookController extends Controller
{
    public function __construct()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
        }
    }
    public function index()
    {
        $rooms = Roombook::orderBy('id', 'desc')->get();
        View::renderTemplate('Rooms/settings.html', ['rooms' => $rooms]);
    }

    public function reservation()
    {
        $rooms = Roombook::orderBy('id', 'desc')->get();
        View::renderTemplate('Roombook/reservation.html', ['rooms' => $rooms]);
    }


    public function roomBook()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $room = Roombook::find($id);

            if (!$room) {
                echo "Roombook not found";
                return;
            }

            View::renderTemplate('Rooms/roombook.html', ['room' => $room]);
        } else {
        }
    }



    public function show()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $room = Roombook::find($id);

            if (!$room) {
                echo "Room not found";
                return;
            }

            View::renderTemplate('Roombook/show.html', ['room' => $room]);
        } else {
        }
    }

    public function create()
    {
        $title = $_POST['title'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $nation = $_POST['nation'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $troom = $_POST['troom'];
        $bed = $_POST['bed'];
        $nroom = $_POST['nroom'];
        $meal = $_POST['meal'];
        $cin = $_POST['cin'];
        $cout = $_POST['cout'];

        $roombook = new Roombook();
        $roombook->Title = $title;
        $roombook->FName = $fname;
        $roombook->LName = $lname;
        $roombook->Email = $email;
        $roombook->National = $nation;
        $roombook->Country = $country;
        $roombook->Phone = $phone;
        $roombook->TRoom = $troom;
        $roombook->Bed = $bed;
        $roombook->NRoom = $nroom;
        $roombook->Meal = $meal;
        $roombook->cin = $cin;
        $roombook->cout = $cout;
        $roombook->calculateNumberOfDays();
        $roombook->save();
        header("Location: /homepage");
    }

    public function update()
    {
        $title = $_POST['title'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $nation = $_POST['nation'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $troom = $_POST['troom'];
        $bed = $_POST['bed'];
        $nroom = $_POST['nroom'];
        $meal = $_POST['meal'];
        $cin = $_POST['cin'];
        $cout = $_POST['cout'];

        $roombook = Roombook::findOrFail($_POST['id']);
        $roombook->Title = $title;
        $roombook->FName = $fname;
        $roombook->LName = $lname;
        $roombook->Email = $email;
        $roombook->National = $nation;
        $roombook->Country = $country;
        $roombook->Phone = $phone;
        $roombook->TRoom = $troom;
        $roombook->Bed = $bed;
        $roombook->NRoom = $nroom;
        $roombook->Meal = $meal;
        $roombook->cin = $cin;
        $roombook->cout = $cout;
        $roombook->save();
        header("Location: /home");
    }

    public function destroy()
    {
        $room = Roombook::findOrFail($_POST['id']);
        $room->delete();
        header("Location: /rooms");
    }


    public function confirmBooking()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $confirmation = $_POST['conf'];

            if ($confirmation === "Confirm") {
                $id =  $_POST['id'];

                $room = Roombook::find($id);

                if (!$room) {
                    echo "Roombook not found";
                    return;
                }


                $room->stat = "Conform";
                $room->update();


                echo "<script type='text/javascript'> alert('Booking Confirmed')</script>";
                echo "<script type='text/javascript'> window.location='roombook.php'</script>";
            } else {
                echo "Invalid confirmation value.";
            }
        } else {
            echo "Invalid request method.";
        }
        header("Location: /home");
    }
}
