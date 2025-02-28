<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    // public function create()
    // {
    //     return view("pages.payments.create");
    // }
    public function show()
    {

        return view("pages.payments.show", );
    }
    public function edit()
    {
        return view("pages.payments.edit");

    }
    public function list()
    {
        return view("pages.payments.list");

    }
    public function voucher()
    {
        return view("pages.payments.voucher");

    }

}
