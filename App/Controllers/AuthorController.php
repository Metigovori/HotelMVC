<?php

namespace App\Controllers;

use App\Models\Author;
use \Core\View;
use \Core\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('id', 'desc')->get();
        View::renderTemplate('Authors/index.html', ['authors' => $authors]);
    }

    public function create()
    {
        View::renderTemplate('Authors/create.html');
    }

    public function store()
    {
        $author = new Author();
        $author->first_name = $_POST['first_name'];
        $author->last_name = $_POST['last_name'];
        $author->country = $_POST['country'];
        $author->save();
        header("Location: /authors");
    }

    public function show()
    {
        // Implement if needed
    }

    public function edit()
    {
        $author = Author::findOrFail($_POST['id']);
        View::renderTemplate('Authors/edit.html', ['author' => $author]);
    }

    public function update()
    {
        $author = Author::findOrFail($_POST['id']);
        $author->first_name = $_POST['first_name'];
        $author->last_name = $_POST['last_name'];
        $author->country = $_POST['country'];
        $author->update();
        header("Location: /authors");
    }

    public function destroy()
    {
        $author = Author::findOrFail($_POST['id']);
        $author->delete();
        header("Location: /authors");
    }
}
