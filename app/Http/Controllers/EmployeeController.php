<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\DataTables\EmployeeDataTable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('pages.employees.index');
    }


    public function create()
    {
        return view('pages.employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:25',
            'last_name' => 'nullable|string|max:25',
            'gender' => 'nullable|in:Male,Female,Other',
            'mobile_no' => 'required|string|max:20|unique:employees,mobile_no',
            'dob' => 'nullable|date',
            'joining_date' => 'nullable|date',
            'email' => 'nullable|email|max:30|unique:employees,email',
            'department' => 'nullable|string|max:25',
            'monthly_salary' => 'required|numeric|min:0|max:10000000',
            'status' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:100',
            'employee_profile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['user_id'] = Auth::id();

        if ($request->hasFile('employee_profile')) {
            $validated['employee_profile'] = $request->file('employee_profile')->store('employee_profiles', 'public');
        }

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }


    public function edit(Employee $employee)
    {
        return view('pages.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {

        // dd($employee->employee_profile);

        $validated = $request->validate([
            'first_name' => 'required|string|max:25',
            'last_name' => 'nullable|string|max:25',
            'gender' => 'nullable|in:Male,Female,Other',
            'mobile_no' => 'required|string|max:20|unique:employees,mobile_no,' . $employee->id,
            'dob' => 'nullable|date',
            'joining_date' => 'nullable|date',
            'email' => 'nullable|email|max:30|unique:employees,email,' . $employee->id,
            'department' => 'nullable|string|max:25',
            'monthly_salary' => 'required|numeric|min:0|max:10000000',
            'status' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:100',
            'employee_profile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('employee_profile')) {
            // delete old profile
            if ($employee->employee_profile && Storage::disk('public')->exists($employee->employee_profile)) {
                Storage::disk('public')->delete($employee->employee_profile);
            }
            $validated['employee_profile'] = $request->file('employee_profile')->store('employee_profiles', 'public');
        }

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $employee = Employee::findOrFail($id);

        return view('pages.employees.show', compact('employee'));
    }

    public function destroy(Employee $employee)
    {

         if ($employee->payrolls()->exists()) {
            return redirect()->back()->with('info', 'Employee cannot be deleted because payroll has already been created.');
        }

        if ($employee->employee_profile && Storage::disk('public')->exists($employee->employee_profile)) {
            Storage::disk('public')->delete($employee->employee_profile);
        }

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
