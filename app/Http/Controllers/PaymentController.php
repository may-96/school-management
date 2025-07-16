<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\DataTables\PaymentDataTable;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;

use Yajra\DataTables\Facades\DataTables;

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
            'voucher_id'        => 'required|exists:vouchers,id',
            'reference_number'  => 'required',
            'payment_method'    => 'required',
            'amount'            => 'required|numeric|min:1',
            'payment_date'      => 'required|date',
            'notes'             => 'nullable|string',
            'voucher_amount'    => 'nullable|numeric|min:0',
        ]);

        $voucher = Voucher::findOrFail($request->voucher_id);

        if ($request->filled('voucher_amount')) {
            $newAmount = floatval($request->voucher_amount);
            if ($newAmount < $voucher->amount) {
                $voucher->amount = $newAmount;
                $voucher->save();
            }
        }

        $paid = $voucher->payments()->sum('amount');
        $remaining = $voucher->amount - $paid;

        if ($request->amount > $remaining) {
            return back()->withErrors(['amount' => 'Payment exceeds remaining voucher amount.']);
        }

        $invoiceId = $this->generateUniquePaymentInvoiceId();

        Payment::create([
            'voucher_id'       => $voucher->id,
            'invoice_id'       => $invoiceId,
            'reference_number' => $request->reference_number,
            'payment_method'   => $request->payment_method,
            'amount'           => $request->amount,
            'payment_date'     => $request->payment_date,
            'notes'            => $request->notes,
            'user_id'        => Auth::id(),
        ]);

        $totalPaid = $voucher->payments()->sum('amount');

        if ($totalPaid >= $voucher->amount) {
            $voucher->status = 'paid';
        } elseif ($totalPaid > 0) {
            $voucher->status = 'partial paid';
        } else {
            $voucher->status = 'unpaid';
        }

        $voucher->save();

        return redirect()->route('voucher.index')->with('success', 'Payment added successfully!');
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
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $payment = Payment::findOrFail($id);

        $payment->update([
            'reference_number' => $request->reference_number,
            'payment_method' => $request->payment_method,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('payment.index')->with('success', 'Payment updated successfully!');
    }



    public function show($id, PaymentDataTable $dataTable)
    {
        $voucher = Voucher::with(['student', 'items'])->findOrFail($id);

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

        return redirect()->back()->with('success', 'Payment deleted and Voucher Status is Updated!');
    }




    public function data(Request $request)
    {
        $query = Payment::with(['voucher.payments'])
            ->when($request->student_id, function ($q) use ($request) {
                $q->whereHas('voucher', function ($q2) use ($request) {
                    $q2->where('student_id', $request->student_id);
                });
            })
            ->when($request->voucher_id, function ($q) use ($request) {
                $q->where('voucher_id', $request->voucher_id);
            });

        return DataTables::of($query)
            ->addColumn('action', function ($payment) {
                return '
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="#"
                            class="avtar avtar-xs btn-link-secondary edit-payment-btn"
                            data-id="' . $payment->id . '"
                            data-invoice_id="' . $payment->invoice_id . '"
                            data-voucher_invoice_id="' . optional($payment->voucher)->invoice_id . '"
                            data-reference_number="' . $payment->reference_number . '"
                            data-payment_method="' . $payment->payment_method . '"
                            data-amount="' . $payment->amount . '"
                            data-payment_date="' . $payment->payment_date . '"
                            data-notes="' . htmlspecialchars($payment->notes ?? '') . '"
                            data-max-amount="' . ($payment->voucher->amount - $payment->voucher->payments->sum('amount')) . '"
                            data-bs-toggle="modal"
                            data-bs-target="#student-edit-payment_modal">
                            <i class="ti ti-edit f-20" data-bs-toggle="tooltip" title="Edit"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <form id="delete-form-' . $payment->id . '" action="' . route('payment.destroy', $payment->id) . '" method="POST" style="display: none;">
                            ' . csrf_field() . method_field('DELETE') . '
                        </form>
                        <a href="#"
                            class="avtar avtar-xs btn-link-secondary bs-pass-para"
                            data-id="' . $payment->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#delete-confirmation-modal">
                            <i class="ti ti-trash f-20" data-bs-toggle="tooltip" title="Delete"></i>
                        </a>
                    </li>
                </ul>';
            })
            ->editColumn('amount', fn($payment) => number_format($payment->amount) . ' PKR')
            ->editColumn('payment_date', fn($payment) => \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y'))
            ->rawColumns(['action'])
            ->make(true);
    }
}
