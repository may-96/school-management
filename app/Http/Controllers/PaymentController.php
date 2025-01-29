<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function dashboard()
    {

        return view("pages.payments.dashboard", );
    }
    public function create()
    {
        return view("pages.payments.create");
    }
    public function show()
    {

        return view("pages.payments.show", );
    }
    public function edit()
    {
        return view("pages.payments.edit");
    }
    public function index()
    {

        return view("pages.payments.index", );
    }

}
