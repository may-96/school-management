<?php

namespace App\Http\Controllers;

use App\DataTables\VoucherDataTable;
use App\Models\Voucher;
use App\Models\VoucherItem;
use Illuminate\Http\Request;


class VoucherController extends Controller
{

    public function index(VoucherDataTable $dataTable)
    {
        return $dataTable->render('pages.vouchers.index');
    }


    public function create($studentId = null)
    {
        $student = Student::find($studentId);
        $invoiceId = 'INV-' . now()->format('YmdHis');

        return view('pages.vouchers.create', compact('student', 'invoiceId'));
    }

    public function store(Request $request)
    {
        $studentIds = $request->input('student_ids', []);

        if (!is_array($studentIds)) {
            $studentIds = json_decode($studentIds, true) ?? [];
        }

        if (empty($studentIds) && $request->filled('student_id')) {
            $studentIds = [$request->student_id];
        }

        $request->validate([
            'invoice_id' => 'required|unique:vouchers,invoice_id',
            'payment_method' => 'required',
            'payment_date' => 'required|date',
            'fee_type' => 'required|array|min:1',
            'fee_amount' => 'required|array|min:1',
            'fee_type.*' => 'required|string',
            'fee_amount.*' => 'required|numeric|min:0',
        ]);

        if (empty($studentIds)) {
            return back()->withErrors(['student_id' => 'Please select at least one student.']);
        }

        $totalAmount = array_sum($request->fee_amount);

        foreach ($studentIds as $studentId) {
            if (!Student::where('id', $studentId)->exists()) {
                continue;
            }

            $voucher = Voucher::create([
                'student_id' => $studentId,
                'invoice_id' => 'INV-' . now()->format('YmdHis') . '-' . $studentId,
                'payment_method' => $request->payment_method,
                'status' => 'unpaid',
                'amount' => $totalAmount,
                'notes' => $request->notes,
                'payment_date' => $request->payment_date,
            ]);

            foreach ($request->fee_type as $index => $type) {
                VoucherItem::create([
                    'voucher_id' => $voucher->id,
                    'fee_type' => $type,
                    'fee_amount' => $request->fee_amount[$index],
                ]);
            }
        }

        return redirect()->route('voucher.index')->with('success', 'Vouchers created successfully!');
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
        $voucher = Voucher::findOrFail($id);

        $request->validate([
            'payment_method' => 'required',
            'status' => 'required',
            'payment_date' => 'required|date',
            'fee_type' => 'required|array|min:1',
            'fee_amount' => 'required|array|min:1',
            'fee_type.*' => 'required|string',
            'fee_amount.*' => 'required|numeric|min:0',
        ]);

        $voucher->update([
            'payment_method' => $request->payment_method,
            'status' => $request->status,
            'payment_date' => $request->payment_date,
            'notes' => $request->notes,
            'amount' => array_sum($request->fee_amount),
        ]);

        VoucherItem::where('voucher_id', $voucher->id)->delete();

        foreach ($request->fee_type as $index => $type) {
            VoucherItem::create([
                'voucher_id' => $voucher->id,
                'fee_type' => $type,
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
