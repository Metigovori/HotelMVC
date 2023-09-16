<?php

namespace App\Controllers;

use App\Models\Contact;
use Core\View;
use Core\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        View::renderTemplate('Contact/index.html', ['contacts' => $contacts]);
    }

    public function create()
    {
        View::renderTemplate('Contact/create.html');
    }

    public function store()
    {
        $contact = new Contact();
        $contact->fullname = $_POST['fullname'];
        $contact->phoneno = $_POST['phoneno'];
        $contact->email = $_POST['email'];
        $contact->cdate = $_POST['cdate'];
        $contact->approval = $_POST['approval'];
        $contact->save();
        header("Location: /contact");
    }

    public function show()
    {
        // Implement if needed
    }

    public function edit()
    {
        $contact = Contact::findOrFail($_POST['id']);
        View::renderTemplate('Contact/edit.html', ['contact' => $contact]);
    }

    public function update()
    {
        $contact = Contact::findOrFail($_POST['id']);
        $contact->fullname = $_POST['fullname'];
        $contact->phoneno = $_POST['phoneno'];
        $contact->email = $_POST['email'];
        $contact->cdate = $_POST['cdate'];
        $contact->approval = $_POST['approval'];
        $contact->update();
        header("Location: /contact");
    }

    public function destroy()
    {
        $contact = Contact::findOrFail($_POST['id']);
        $contact->delete();
        header("Location: /contact");
    }

    public function contactsByApproval($approvalStatus)
    {
        $contacts = Contact::getContactsByApproval($approvalStatus);
        View::renderTemplate('Contact/approval.html', ['contacts' => $contacts]);
    }
}
