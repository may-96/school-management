<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function forget()
    {
        return view("pages.auth.forget");
    }
    public function login()
    {

        return view("pages.auth.login", );
    }
    public function registers()
    {

        return view("pages.auth.register", );
    }
    public function create()
    {
        return view("pages.auth.reset");
    }
}
