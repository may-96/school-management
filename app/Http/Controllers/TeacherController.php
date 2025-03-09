<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function create()
    {
        return view("pages.teachers.create");
    }
    public function edit()
    {
        return view("pages.teachers.edit");
    }
    public function index()
    {

        return view("pages.teachers.index", );
    }
    public function profile()
    {

        return view("pages.teachers.profile", );
    }
}
