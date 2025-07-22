<?php

namespace App\Http\Controllers;

use App\DataTables\VoucherDataTable;
use App\Models\Voucher;
use App\Models\VoucherItem;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\School;

class VoucherController extends Controller
{

    public function index(VoucherDataTable $dataTable)
    {
        return $dataTable->render('pages.vouchers.index');
    }

    public function create($studentId = null)
    {
        $student = Student::find($studentId);
        $invoiceId = 'VOU-' . now()->format('YmdHis');

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

        if (empty($studentIds)) {
            return back()->withErrors(['student_id' => 'Please select at least one student.']);
        }

        $request->validate([
            'invoice_id' => 'required|unique:vouchers,invoice_id',
            'notes' => 'nullable|string|max:50',
            'month_year' => 'required|string|max:7', 
            'payment_date' => 'required|date',
            'fee_type' => 'required|array|min:1',
            'fee_amount' => 'required|array|min:1|max:999999',
            'fee_type.*' => 'required|string',
            'fee_amount.*' => 'required|numeric|min:0|max:999999',
        ]);


        $totalAmount = array_sum($request->fee_amount);

        foreach ($studentIds as $studentId) {
            if (!Student::where('id', $studentId)->exists()) {
                continue;
            }

            $voucher = Voucher::create([
                'student_id' => $studentId,
                'invoice_id' => 'VOU-' . now()->format('YmdHis') . '-' . $studentId,
                'status' => 'unpaid',
                'amount' => $totalAmount,
                'notes' => $request->notes,
                'month_year' => $request->month_year,
                'payment_date' => $request->payment_date,
                'user_id'        => Auth::id(),
            ]);

            foreach ($request->fee_type as $index => $type) {
                VoucherItem::create([
                    'voucher_id' => $voucher->id,
                    'fee_type' => $type,
                    'fee_amount' => $request->fee_amount[$index],
                ]);
            }
        }

        return redirect()->route('student.index')->with('success', 'Vouchers created successfully!');
    }

    public function show($id)
    {
        $voucher = Voucher::with(['student', 'items', 'payments'])->findOrFail($id);
        $school = School::first();

        return view('pages.vouchers.show', compact('voucher', 'school'));
    }



    public function edit($id)
    {
        $voucher = Voucher::with('student', 'items')->findOrFail($id);
        return view('pages.vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, $id)
    {
        $voucher = Voucher::findOrFail($id);

        $request->validate([
            'payment_date' => 'required|date',
            'notes' => 'nullable|string|max:50',
            'month_year' => 'required|string|max:7',
            'fee_type' => 'required|array|min:1',
            'fee_amount' => 'required|array|min:1|max:999999',
            'fee_type.*' => 'required|string',
            'fee_amount.*' => 'required|numeric|min:0|max:999999',
        ]);

        $totalAmount = array_sum($request->fee_amount);

        $paidAmount = $voucher->payments()->sum('amount');

        if ($paidAmount == 0) {
            $status = 'Unpaid';
        } elseif ($paidAmount < $totalAmount) {
            $status = 'Partial Paid';
        } else {
            $status = 'Paid';
        }

        $voucher->update([
            'status' => $status,
            'payment_date' => $request->payment_date,
            'month_year' => $request->month_year,
            'notes' => $request->notes,
            'amount' => $totalAmount,
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
