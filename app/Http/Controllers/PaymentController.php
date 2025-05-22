<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\DataTables\PaymentDataTable;

class PaymentController extends Controller

{

    public function index(PaymentDataTable $dataTable)
    {
        return $dataTable->render('pages.payments.index');
    }



    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required',
            'reference_number' => 'required',
            'voucher_id' => 'required|exists:vouchers,id',
            'payment_method' => 'required',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $payment = Payment::create([
            'voucher_id'       => $request->voucher_id,
            'invoice_id'       => $request->invoice_id,
            'reference_number' => $request->reference_number,
            'payment_method'   => $request->payment_method,
            'amount'           => $request->amount,
            'payment_date'     => $request->payment_date,
            'notes'            => $request->notes,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Payment added successfully!']);
        }

        return redirect()->route('payment.index')->with('success', 'Payment added successfully!');
    }


    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->back()->with('success', 'Payment deleted successfully!');
    }
}
