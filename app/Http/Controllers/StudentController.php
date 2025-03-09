<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view("pages.students.create");
    }
    public function edit()
    {
        return view("pages.students.edit");
    }
    public function index()
    {
        return view("pages.students.index", );
    }
    public function show()
    {
        return view("pages.students.profile", );
    }
}

