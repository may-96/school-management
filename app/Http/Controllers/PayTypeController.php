<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayType;

class PayTypeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:30|unique:pay_types,name',
            'confirm' => 'nullable|boolean',
        ]);

        PayType::create([
            'name'         => $request->name,
            'is_deductible' => $request->confirm ?? null,
        ]);

        return redirect()->back()
            ->with('success', 'Pay Type created successfully.')
            ->with('active_tab', 'profile-5');
    }

    public function update(Request $request, $id)
    {
        $payType = PayType::findOrFail($id);

        if ($payType->name === 'Basic Salary') {
            return back()
                ->with('error', 'Basic Salary cannot be edited.')
                ->with('active_tab', 'profile-5');
        }

        $request->validate([
            'name'    => 'required|string|max:30|unique:pay_types,name,' . $payType->id,
            'confirm' => 'nullable|boolean',
        ]);

        $payType->update([
            'name'         => $request->name,
            'is_deductible' => $request->confirm ?? null,
        ]);

        return redirect()->back()
            ->with('success', 'Pay Type updated successfully.')
            ->with('active_tab', 'profile-5');
    }

    public function destroy($id)
    {
        $payType = PayType::findOrFail($id);

        if ($payType->name === 'Basic Salary') {
            return back()
                ->with('error', 'Basic Salary cannot be deleted.')
                ->with('active_tab', 'profile-5');
        }

        // Replace 'type_id' with the actual column in your payrolls table
        $isUsed = \App\Models\PayrollDetail::where('pay_type_id', $payType->id)->exists();

        if ($isUsed) {
            return redirect()->back()
                ->with('error', 'Cannot delete this Pay Type because it is used in payroll.')
                ->with('active_tab', 'profile-5');
        }

        $payType->delete();

        return redirect()->back()
            ->with('success', 'Pay Type deleted successfully.')
            ->with('active_tab', 'profile-5');
    }
}
