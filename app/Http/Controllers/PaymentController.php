<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\DataTables\PaymentDataTable;
use App\Models\Voucher;

class PaymentController extends Controller

{

    public function index(PaymentDataTable $dataTable)
    {

        return $dataTable->render('pages.payments.index');
    }

    public function ajaxData(PaymentDataTable $dataTable)
    {
        return $dataTable->ajax();
    }

    public function store(Request $request)
    {
        $request->validate([
            'voucher_id' => 'required|exists:vouchers,id',
            'reference_number' => 'required',
            'payment_method'   => 'required',
            'amount'           => 'required|numeric',
            'payment_date'     => 'required|date',
            'notes'            => 'nullable|string',
        ]);

        // Generate unique invoice ID (auto)
        $invoiceId = $this->generateUniquePaymentInvoiceId();

        // Create payment
        $payment = Payment::create([
            'voucher_id'       => $request->voucher_id,
            'invoice_id'       => $invoiceId,
            'reference_number' => $request->reference_number,
            'payment_method'   => $request->payment_method,
            'amount'           => $request->amount,
            'payment_date'     => $request->payment_date,
            'notes'            => $request->notes,
        ]);

        // ✅ After payment is created, update the voucher status to "paid"
        $voucher = Voucher::find($request->voucher_id);
        if ($voucher) {
            $voucher->status = 'paid';
            $voucher->save();
        }

        return redirect()->route('payment.index')->with('success', 'Payment added successfully!');
    }



    private function generateUniquePaymentInvoiceId()
    {
        do {
            $invoiceId = 'INV-' . now()->format('YmdHis');
        } while (Payment::where('invoice_id', $invoiceId)->exists());

        return $invoiceId;
    }


    public function getPayment($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json($payment);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'reference_number' => 'required|string',
            'payment_method'   => 'required|string',
            'amount'           => 'required|numeric',
            'payment_date'     => 'required|date',
            'notes'            => 'nullable|string',
        ]);

        $payment = Payment::findOrFail($id);

        $payment->update([
            'reference_number' => $request->reference_number,
            'payment_method'   => $request->payment_method,
            'amount'           => $request->amount,
            'payment_date'     => $request->payment_date,
            'notes'            => $request->notes,
        ]);

        return redirect()->route('payment.index')->with('success', 'Payment updated successfully!');
    }



    public function show($id, PaymentDataTable $dataTable)
    {
        $voucher = Voucher::with(['student', 'voucherItems'])->findOrFail($id);

        return $dataTable->render('pages.vouchers.show', compact('voucher'));
    }


    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $voucherId = $payment->voucher_id;

        $payment->delete();

        $remainingPayments = Payment::where('voucher_id', $voucherId)->count();

        if ($remainingPayments === 0) {
            $voucher = Voucher::find($voucherId);
            if ($voucher) {
                $voucher->status = 'unpaid';
                $voucher->save();
            }
        }

        return redirect()->back()->with('success', 'Payment deleted and Voucher Status is Unpaid!');
    }
}
