<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeType;
use App\Models\VoucherItem;

class FeeTypeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30|unique:fee_types,name',
        ]);

        FeeType::create($request->only('name'));

        return redirect()->back()
            ->with('success', 'Fee type created successfully.')
            ->with('active_tab', 'profile-4');
    }

    public function update(Request $request, $id)
    {
        $feeType = FeeType::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:30|unique:fee_types,name,' . $feeType->id,
        ]);

        $feeType->update($request->only('name'));

        return redirect()->back()
            ->with('success', 'Fee type updated successfully.')
            ->with('active_tab', 'profile-4');
    }

    public function destroy($id)
    {
        $feeType = FeeType::findOrFail($id);
        $isUsed =  VoucherItem::where('fee_type_id', $feeType->id)->exists();

        if ($isUsed) {
            return redirect()->back()
                ->with('error', 'Cannot delete: Fee type is already used in a voucher.')
                ->with('active_tab', 'profile-4');
        }

        $feeType->delete();

        return redirect()->back()
            ->with('success', 'Fee type deleted successfully.')
            ->with('active_tab', 'profile-4');
    }
}
