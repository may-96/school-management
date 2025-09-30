<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\Teacher;
use App\Models\Employee;
use App\Models\PayType;
use App\Models\PayrollDetail;
use Illuminate\Support\Facades\DB;
use App\DataTables\PayrollDataTable;
// use App\Jobs\UpdateDashboardStatsJob;

class PayrollController extends Controller
{

    /**
     * Display the payroll DataTable
     */
    public function index(PayrollDataTable $dataTable)
    {
        $currentMonth = now()->startOfMonth()->format('Y-m-d');

        $alreadyRun = Payroll::where('payroll_month', $currentMonth)->exists();

        $eligibleStaffCount = collect([Teacher::class, Employee::class])->sum(function ($model) use ($currentMonth) {
            return $model::where('monthly_salary', '>', 0)
                ->whereDoesntHave('payrolls', function ($q) use ($currentMonth) {
                    $q->where('payroll_month', $currentMonth);
                })->count();
        });

        return $dataTable->render('pages.payrolls.index', compact('alreadyRun', 'eligibleStaffCount'));
    }

    // Generate payroll for all eligible teachers/employees
    public function create()
    {
        $currentMonth = now()->startOfMonth()->format('Y-m-d');

        // Teachers without payroll this month
        $teachers = Teacher::where('monthly_salary', '>', 0)
            ->whereDoesntHave('payrolls', function ($q) use ($currentMonth) {
                $q->where('payroll_month', $currentMonth);
            })->get();

        // Employees without payroll this month
        $employees = Employee::where('monthly_salary', '>', 0)
            ->whereDoesntHave('payrolls', function ($q) use ($currentMonth) {
                $q->where('payroll_month', $currentMonth);
            })->get();

        if ($teachers->isEmpty() && $employees->isEmpty()) {
            return redirect()->route('payrolls.index')
                ->with('error', 'Payroll for all teachers and employees has already been generated for ' . now()->format('F Y') . '.');
        }

        // Ensure PayType for Basic Salary exists
        $basicPayType = \App\Models\PayType::firstOrCreate(
            ['name' => 'Basic Salary'],
            ['is_deductible' => 0] // default to allowance
        );

        // Helper function for DRY code
        $createPayroll = function ($model, $employeeType) use ($currentMonth, $basicPayType) {
            $payroll = $model->payrolls()->create([
                'employee_type'  => $employeeType,
                'employee_id'    => $model->id,
                'monthly_salary' => $model->monthly_salary,
                'payroll_month'  => $currentMonth,
                'status'         => 'unpaid',
            ]);

            // Insert Basic Salary row
            $payroll->details()->create([
                'pay_type_id' => $basicPayType->id,
                'amount'      => $model->monthly_salary,
            ]);
        };

        foreach ($teachers as $teacher) {
            $createPayroll($teacher, Teacher::class);
        }

        foreach ($employees as $employee) {
            $createPayroll($employee, Employee::class);
        }

        return redirect()->route('payrolls.index')
            ->with('success', 'Payroll generated successfully for ' . now()->format('F Y') . '.');
    }

    //   Create a single payroll
    public function createSingle($employee_type, $employee_id)
    {
        if (!is_numeric($employee_id)) abort(404);

        $currentMonth = now()->startOfMonth()->format('Y-m-d');
        $employeeClass = $employee_type === 'teacher' ? Teacher::class : Employee::class;

        // Payroll existence check (optional, uncomment if required)
        // $exists = Payroll::where('employee_type', $employeeClass)
        //     ->where('employee_id', $employee_id)
        //     ->where('payroll_month', $currentMonth)
        //     ->exists();

        // if ($exists) {
        //     return redirect()->route('payrolls.index')
        //         ->with('error', 'Payroll already exists for this month.');
        // }

        $employee = $employeeClass::findOrFail($employee_id);
        $payTypes = PayType::all();

        return view('pages.payrolls.create-single', compact(
            'employee',
            'employee_type',
            'payTypes',
            'currentMonth'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_type'   => 'required|in:teacher,employee',
            'employee_id'     => 'required|integer',
            'payroll_month'   => 'required|date',
            'pay_type_id.*'   => 'nullable|integer|exists:pay_types,id',
            'pay_amount.*'    => 'nullable|numeric|min:0|max:2000000',
            'notes'           => 'nullable|string|max:225',
        ]);

        $payrollMonth = \Carbon\Carbon::parse($validated['payroll_month'])
            ->startOfMonth()
            ->format('Y-m-d');

        $employeeClass = $validated['employee_type'] === 'teacher'
            ? \App\Models\Teacher::class
            : \App\Models\Employee::class;

        $payroll = Payroll::create([
            'employee_type'  => $employeeClass,
            'employee_id'    => $validated['employee_id'],
            'payroll_month'  => $payrollMonth,
            'monthly_salary' => 0, // calculate from rows
            'status'         => 'unpaid',
            'notes'          => $validated['notes'] ?? null,
        ]);

        $netSalary = 0;

        if ($request->has('pay_type_id') && $request->has('pay_amount')) {
            foreach ($request->pay_type_id as $index => $payTypeId) {
                $amount = $request->pay_amount[$index] ?? 0;

                if (!$payTypeId || $amount <= 0) {
                    continue;
                }

                $type = PayType::find($payTypeId);

                $payroll->details()->create([

                    'pay_type_id' => $payTypeId,
                    'amount'      => $amount,
                ]);

                // Net salary calculation
                $netSalary += $type && $type->is_deductible ? -$amount : $amount;
            }
        }

        $payroll->update(['net_salary' => $netSalary]);

        if ($validated['employee_type'] === 'teacher') {
            return redirect()
                ->route('teachers.index')
                ->with('success', 'Payroll created successfully for teacher.');
        }

        if ($validated['employee_type'] === 'employee') {
            return redirect()
                ->route('employees.index')
                ->with('success', 'Payroll created successfully for employee.');
        }
    }

    // Show payroll details
    public function show($id)
    {
        $payroll = Payroll::with(['employeeable', 'details.payType'])->findOrFail($id);
        $employee = $payroll->employeeable;

        return view('pages.payrolls.show', compact('payroll', 'employee'));
    }

    //  Edit payroll
    public function edit($id)
    {
        $payroll   = Payroll::with('details.payType')->findOrFail($id);
        $payDetails = $payroll->details;

        $payTypes  = PayType::all();
        $employee  = $payroll->employeeable;

        return view('pages.payrolls.edit', compact(
            'payroll',
            'payTypes',
            'employee',
            'payDetails'
        ));
    }

    public function update(Request $request, Payroll $payroll)
    {
        $validated = $request->validate([
            'employee_type'   => 'required|in:teacher,employee',
            'employee_id'     => 'required|integer',
            'payroll_month'   => 'required|date',
            'pay_type_id.*'   => 'nullable|integer|exists:pay_types,id',
            'pay_amount.*'    => 'nullable|numeric|min:0|max:2000000',
            'notes'           => 'nullable|string|max:225',
        ]);

        $netSalary = 0;

        $payroll->details()->delete();

        if ($request->has('pay_type_id') && $request->has('pay_amount')) {
            foreach ($request->pay_type_id as $index => $payTypeId) {
                $amount = $request->pay_amount[$index] ?? 0;

                if (!$payTypeId || $amount <= 0) {
                    continue;
                }

                $type = PayType::find($payTypeId);

                $payroll->details()->create([
                    'pay_type_id' => $payTypeId,
                    'amount'      => $amount,
                ]);

                // dd($payroll->id, $payroll->exists);

                // Net salary calculation
                $netSalary += $type && $type->is_deductible ? -$amount : $amount;
            }
        }

        $payroll->update([
            'net_salary' => $netSalary,
            'notes'      => $validated['notes'] ?? null,
        ]);

        return redirect()->route('payrolls.index')->with('success', 'Payroll updated successfully.');
    }

    //  Store payment
    public function storePayment(Request $request)
    {
        $validated = $request->validate([
            'payroll_id'     => 'required|exists:payrolls,id',
            'payment_method' => 'required|in:cash,cheque,bank-transfer',
            'payment_date'   => 'required|date|before_or_equal:today',
            'transaction_id' => 'nullable|string|max:30',
        ]);

        $payroll = Payroll::findOrFail($validated['payroll_id']);
        $payroll->payment_method = $validated['payment_method'];
        $payroll->payment_date   = $validated['payment_date'];
        $payroll->transaction_id = $validated['transaction_id'] ?? null;
        $payroll->status = 'paid';
        $payroll->save();

        return redirect()->route('payrolls.index')->with('success', 'Payment saved. Status updated to paid.');
    }

    public function bulkPayment(Request $request)
    {
        $request->validate([
            'payroll_ids' => 'required|string',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string',
            'transaction_id' => 'nullable|string|max:30',
        ]);

        $ids = explode(",", $request->payroll_ids);

        DB::transaction(function () use ($ids, $request) {
            foreach ($ids as $id) {
                $payroll = Payroll::find($id);
                if ($payroll && strtolower($payroll->status) !== 'paid') {
                    $payroll->update([
                        'status' => 'Paid',
                        'payment_date' => $request->payment_date,
                        'payment_method' => $request->payment_method,
                        'transaction_id' => $request->transaction_id,
                    ]);
                }
            }
        });

        return redirect()->back()->with('success', 'Payments saved. Status updated to paid.');
    }

    //   Toggle payment status
    public function togglePayment(Request $request)
    {
        $request->validate(['payroll_id' => 'required|exists:payrolls,id']);
        $payroll = Payroll::findOrFail($request->payroll_id);

        if ($payroll->status === 'paid') {
            $payroll->payment_method = null;
            $payroll->payment_date   = null;
            $payroll->transaction_id = null;
            $payroll->status         = 'unpaid';
            $payroll->save();

            return redirect()->route('payrolls.index')->with('success', 'Payment removed. Status updated to unpaid.');
        }

        return redirect()->route('payrolls.index')->with('error', 'Payroll is already unpaid.');
    }

    public function bulkTogglePayment(Request $request)
    {
        $request->validate([
            'payroll_ids' => 'required|string', // comma separated IDs
        ]);

        $payrollIds = explode(',', $request->payroll_ids);
        $updatedCount = 0;

        foreach ($payrollIds as $id) {
            $payroll = Payroll::find($id);
            if ($payroll && $payroll->status === 'paid') {
                $payroll->payment_method = null;
                $payroll->payment_date   = null;
                $payroll->transaction_id = null;
                $payroll->status         = 'unpaid';
                $payroll->save();
                $updatedCount++;
            }
        }

        if ($updatedCount > 0) {
            return redirect()->route('payrolls.index')->with('success', "$updatedCount payments removed. Status updated to unpaid.");
        }

        return redirect()->route('payrolls.index')->with('error', 'No payments were removed. Either already unpaid or invalid payrolls.');
    }

    // Delete payroll
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $payroll = Payroll::findOrFail($id);

            if ($payroll->status === 'paid') {
                return redirect()->route('payrolls.index')
                    ->with('error', 'Remove payment first.');
            }

            PayrollDetail::where('payroll_id', $payroll->id)->delete();
            $payroll->delete();

            DB::commit();
            return redirect()->route('payrolls.index')->with('success', 'Payroll deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('payrolls.index')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
