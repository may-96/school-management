<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function user()
    {
        return view("pages.admin.user");
    }
    public function profile()
    {
        return view("pages.admin.users");
    }
}
