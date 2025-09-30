<?php

namespace App\Http\Controllers;

use App\DataTables\VoucherDataTable;
use App\Models\Voucher;
use App\Models\VoucherItem;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\FeeType;
// use App\Jobs\UpdateDashboardStatsJob;

class VoucherController extends Controller
{

    public function index(VoucherDataTable $dataTable)
    {
        return $dataTable->render('pages.vouchers.index');
    }

    public function create($studentId = null)
    {
        if ($studentId && !is_numeric($studentId)) {
            abort(404);
        }

        $student = $studentId ? Student::find($studentId) : null;

        if ($studentId && !$student) {
            abort(404, 'Student not found');
        }

        $invoiceId = 'VOU-' . now()->format('YmdHis');

        // Fetch all fee types from database
        $feeTypes = FeeType::orderBy('name')->get();
        return view('pages.vouchers.create', compact('student', 'invoiceId', 'feeTypes'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
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
            'invoice_id'     => 'required|unique:vouchers,invoice_id',
            'month_year'     => 'required|string|max:7',
            'payment_date'   => 'required|date',
            'fee_type_id'    => 'required|array|min:1',
            'fee_amount'     => 'required|array|min:1',
            'fee_type_id.*'  => 'required|integer|exists:fee_types,id',
            'fee_amount.*'   => 'required|numeric|min:0|max:999999',
            'notes'          => 'nullable|string|max:50',
        ]);

        $totalAmount = array_sum($request->fee_amount);

        foreach ($studentIds as $studentId) {
            if (!Student::where('id', $studentId)->exists()) {
                continue;
            }

            $voucher = Voucher::create([
                'student_id'    => $studentId,
                'invoice_id'    => 'VOU-' . now()->format('YmdHis') . '-' . $studentId,
                'status'        => 'unpaid',
                'amount'        => $totalAmount,
                'notes'         => $request->notes,
                'month_year'    => $request->month_year,
                'payment_date'  => $request->payment_date,
                'user_id'       => Auth::id(),
            ]);

            foreach ($request->fee_type_id as $index => $feeTypeId) {
                VoucherItem::create([
                    'voucher_id'   => $voucher->id,
                    'fee_type_id'  => $feeTypeId,
                    'fee_amount'   => $request->fee_amount[$index],
                ]);
            }
        }

        if ($request->has('redirect_to') && $request->redirect_to === 'show') {
            return redirect()
                ->route('students.show', $request->student_id)
                ->with('success', 'Voucher created successfully!')
                ->with('active_tab', 'profile-2');
        }

        return redirect()
            ->route('students.index')
            ->with('success', 'Voucher created successfully!');
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $voucher = Voucher::with(['student', 'items', 'payments'])->findOrFail($id);
        $school = School::first();

        return view('pages.vouchers.show', compact('voucher', 'school'));
    }

    public function edit($id)
    {
        $voucher = Voucher::with('student', 'items')->findOrFail($id);
        $feeTypes = FeeType::all(); // Fetch all fee types from DB

        return view('pages.vouchers.edit', compact('voucher', 'feeTypes'));
    }

    public function update(Request $request, $id)
    {

        // UpdateDashboardStatsJob::dispatch();

        $voucher = Voucher::findOrFail($id);

        $request->validate([
            'payment_date'   => 'required|date',
            'month_year'     => 'required|string|max:7',
            'fee_type_id'    => 'required|array|min:1',
            'fee_amount'     => 'required|array|min:1|max:999999',
            'notes'          => 'nullable|string|max:50',
            'fee_type_id.*'  => 'required|integer|exists:fee_types,id',
            'fee_amount.*'   => 'required|numeric|min:0|max:999999',
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
            'status'        => $status,
            'payment_date'  => $request->payment_date,
            'month_year'    => $request->month_year,
            'notes'         => $request->notes,
            'amount'        => $totalAmount,
        ]);

        VoucherItem::where('voucher_id', $voucher->id)->delete();

        foreach ($request->fee_type_id as $index => $feeTypeId) {
            VoucherItem::create([
                'voucher_id'  => $voucher->id,
                'fee_type_id' => $feeTypeId,
                'fee_amount'  => $request->fee_amount[$index],
            ]);
        }

        $studentId = $request->input('student_id') ?? $voucher->student_id;

        if ($request->input('redirect_to') === 'show') {
            return redirect()
                ->route('students.show', $studentId)
                ->with('success', 'Voucher updated successfully!')
                ->with('active_tab', 'profile-2');
        }

        if ($request->input('redirect_to') === 'voucher_show') {
            return redirect()
                ->route('voucher.show', $voucher->id)
                ->with('success', 'Voucher updated successfully!');
        }

        return redirect()
            ->route('vouchers.index')
            ->with('success', 'Voucher updated successfully!');
    }

    public function destroy(Request $request, $id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();

        if ($request->input('redirect_to') === 'show') {
            return redirect()
                ->route('students.show', $request->input('student_id'))
                ->with('success', 'Voucher deleted successfully!')
                ->with('active_tab', 'profile-2');
        }

        return redirect()
            ->route('vouchers.index')
            ->with('success', 'Voucher deleted successfully!');
    }
}
