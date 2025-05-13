<?php

namespace App\Http\Controllers;

use App\Models\Voucher;

class PaymentController extends Controller

{

    public function create()
    {
        return view('pages.payments.create');
    }

    public function show()
    {
        return view("pages.payments.show",);
    }

    public function edit()
    {
        return view("pages.payments.edit");
    }

    public function list()
    {
        return view("pages.payments.index");
    }

    public function allVouchers()
    {
        $payments = Voucher::with('student')->get();
        return view('pages.payments.voucher', compact('payments'));
    }
}
