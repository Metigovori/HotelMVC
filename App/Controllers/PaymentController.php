<?php

namespace App\Controllers;

use App\Models\Payment;
use Core\View;
use Core\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('id', 'desc')->get();
        View::renderTemplate('payment.html', ['payments' => $payments]);
    }

    public function create()
    {
        View::renderTemplate('payment.html');
    }

    public function store()
    {
        $payment = new Payment();
        $payment->title = $_POST['title'];
        $payment->fname = $_POST['fname'];
        $payment->lname = $_POST['lname'];
        $payment->troom = $_POST['troom'];
        $payment->tbed = $_POST['tbed'];
        $payment->nroom = $_POST['nroom'];
        $payment->cin = $_POST['cin'];
        $payment->cout = $_POST['cout'];
        $payment->ttot = $_POST['ttot'];
        $payment->fintot = $_POST['fintot'];
        $payment->mepr = $_POST['mepr'];
        $payment->meal = $_POST['meal'];
        $payment->btpt = $_POST['btpt'];
        $payment->noofdays = $_POST['noofdays'];
        $payment->save();
        header("Location: /payments");
    }

    public function show()
    {
        // Implement if needed
    }

    public function edit()
    {
        $payment = Payment::findOrFail($_POST['id']);
        View::renderTemplate('payment.html', ['payment' => $payment]);
    }

    public function update()
    {
        $payment = Payment::findOrFail($_POST['id']);
        $payment->title = $_POST['title'];
        $payment->fname = $_POST['fname'];
        $payment->lname = $_POST['lname'];
        $payment->troom = $_POST['troom'];
        $payment->tbed = $_POST['tbed'];
        $payment->nroom = $_POST['nroom'];
        $payment->cin = $_POST['cin'];
        $payment->cout = $_POST['cout'];
        $payment->ttot = $_POST['ttot'];
        $payment->fintot = $_POST['fintot'];
        $payment->mepr = $_POST['mepr'];
        $payment->meal = $_POST['meal'];
        $payment->btpt = $_POST['btpt'];
        $payment->noofdays = $_POST['noofdays'];
        $payment->update();
        header("Location: /payments");
    }

    public function destroy()
    {
        $payment = Payment::findOrFail($_POST['id']);
        $payment->delete();
        header("Location: payment.html");
    }

    public function paymentChart()
    {
        $chartData = Payment::getPaymentChartData();
        View::renderTemplate('payment.html', ['chartData' => $chartData]);
    }
}
