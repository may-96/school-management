<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'student_ids'     => 'required|array',
            'payment_method'  => 'required|string',
            'amount'          => 'required|numeric',
            'payment_date'    => 'required|date',
            'notes'           => 'nullable|string',
        ]);

        foreach ($request->student_ids as $studentId) {
            $invoiceId = 'INV-' . strtoupper(uniqid());
            $referenceNo = 'REF-' . strtoupper(uniqid());

            Voucher::create([
                'student_id'     => $studentId,
                'invoice_id'     => $invoiceId,
                'reference_no'   => $referenceNo,
                'payment_method' => $request->payment_method,
                'amount'         => $request->amount,
                'payment_date'   => $request->payment_date,
                'notes'          => $request->notes,
            ]);
        }

        session()->flash('success', 'Voucher added successfully!');
        return response()->json(['message' => 'Voucher added successfully!']);
    }
}
