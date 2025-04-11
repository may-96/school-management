<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view("pages.auth.forgot");
    }
    public function login()
    {

        return view("pages.auth.login", );
    }
    public function registers()
    {

        return view("pages.auth.register", );
    }
    public function reset()
    {
        return view("pages.auth.reset");
    }
}
