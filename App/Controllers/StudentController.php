<?php
namespace App\Controllers;

use App\Models\Student;
use \Core\View;
use \Core\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->get();
        View::renderTemplate('Students/index.html', ['students' => $students]);
    }

    public function create()
    {
        View::renderTemplate('Students/create.html');
    }

    public function store()
    {
        $student = new Student();
        $student->first_name = $_POST['first_name'];
        $student->last_name = $_POST['last_name'];
        $student->country = $_POST['country'];
        $student->city = $_POST['city'];
        $student->address = $_POST['address'];
        $student->phone = $_POST['phone'];
        $student->email = $_POST['email'];
        $student->index_no = $_POST['index_no'];
        $student->save();
        header("Location: /students");
    }

    public function show()
    {
        // Implement if needed
    }

    public function edit()
    {
        $student = Student::findOrFail($_POST['id']);
        View::renderTemplate('Students/edit.html', ['student' => $student]);
    }

    public function update()
    {
        $student = Student::findOrFail($_POST['id']);
        $student->first_name = $_POST['first_name'];
        $student->last_name = $_POST['last_name'];
        $student->country = $_POST['country'];
        $student->city = $_POST['city'];
        $student->address = $_POST['address'];
        $student->phone = $_POST['phone'];
        $student->email = $_POST['email'];
        $student->index_no = $_POST['index_no'];
        $student->update();
        header("Location: /students");
    }

    public function destroy()
    {
        $student = Student::findOrFail($_POST['id']);
        $student->delete();
        header("Location: /students");
    }
}
