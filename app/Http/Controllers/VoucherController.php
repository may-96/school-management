<?php

namespace App\Http\Controllers;

use App\DataTables\VoucherDataTable;
use App\Models\Voucher;
use App\Models\VoucherItem;
use Illuminate\Http\Request;
use App\Models\Student;

class VoucherController extends Controller
{

    public function index(VoucherDataTable $dataTable)
    {
        return $dataTable->render('pages.vouchers.index');
    }


    public function create()
    {

        $invoiceId = 'INV-' . now()->format('YmdHis');

        return view('pages.vouchers.create', compact('invoiceId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id'     => 'required|exists:students,id',
            'invoice_id'     => 'required|unique:vouchers',
            'payment_method' => 'required',
            'payment_date'   => 'required|date',
            'fee_type'       => 'required|array|min:1',
            'fee_amount'     => 'required|array|min:1',
            'fee_type.*'     => 'required|string',
            'fee_amount.*'   => 'required|numeric|min:0',
        ]);

        $totalAmount = array_sum($request->fee_amount);

        $voucher = Voucher::create([
            'student_id'     => $request->student_id,
            'invoice_id'     => $request->invoice_id,
            'payment_method' => $request->payment_method,
            'status'         => 'unpaid',
            'amount'         => $totalAmount,
            'notes'          => $request->notes,
            'payment_date'   => $request->payment_date,
        ]);

        foreach ($request->fee_type as $index => $type) {
            VoucherItem::create([
                'voucher_id' => $voucher->id,
                'fee_type'   => $type,
                'fee_amount' => $request->fee_amount[$index],
            ]);
        }

        return redirect()->route('voucher.index', $voucher->id)->with('success', 'Voucher created successfully!');
    }


    public function show($id)
    {
        $voucher = Voucher::with('student', 'voucherItems')->findOrFail($id);
        return view('pages.vouchers.show', compact('voucher'));
    }

    public function edit($id)
    {
        $voucher = Voucher::with('student', 'voucherItems')->findOrFail($id);
        return view('pages.vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, $id)
    {

        //  dd($request->all());

        $voucher = Voucher::findOrFail($id);

        $request->validate([
            'payment_method' => 'required',
            'status'         => 'required',
            'payment_date'   => 'required|date',
            'fee_type'       => 'required|array|min:1',
            'fee_amount'     => 'required|array|min:1',
            'fee_type.*'     => 'required|string',
            'fee_amount.*'   => 'required|numeric|min:0',
        ]);

        $voucher->update([
            'payment_method' => $request->payment_method,
            'status'         => $request->status,
            'payment_date'   => $request->payment_date,
            'notes'          => $request->notes,
            'amount'         => array_sum($request->fee_amount),
        ]);

        VoucherItem::where('voucher_id', $voucher->id)->delete();

        foreach ($request->fee_type as $index => $type) {
            VoucherItem::create([
                'voucher_id' => $voucher->id,
                'fee_type'   => $type,
                'fee_amount' => $request->fee_amount[$index],
            ]);
        }

        return redirect()->route('voucher.show', $voucher->id)->with('success', 'Voucher updated successfully!');
    }



    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();

        return redirect()->back()->with('success', 'Voucher deleted successfully.');
    }
    
}
