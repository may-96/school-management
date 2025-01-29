<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view("pages.students.create");
    }
    public function index()
    {

        return view("pages.students.index", );
    }

}

