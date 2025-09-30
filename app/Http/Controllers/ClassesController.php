<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassesController extends Controller
{

    // Store a new class
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:15|unique:classes,name',
            'sections' => 'nullable|array',
            'sections.*' => 'exists:sections,id',
        ]);



        $class = ClassModel::create(['name' => $request->class_name]);
        $class->sections()->attach($request->input('sections', []));

        return redirect()->back()->with('success', 'Class created successfully.');
    }

    // Update a class
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_name' => 'required|string|max:15|unique:classes,name,' . $id,
            'sections' => 'nullable|array',
            'sections.*' => 'exists:sections,id',
        ]);

        $class = ClassModel::findOrFail($id);

        $class->update([
            'name' => $request->class_name,
        ]);

        $class->sections()->sync($request->input('sections', []));

        return redirect()->back()->with('success', 'Class updated successfully.');
    }



    // Delete a class
    public function destroy($id)
    {

        $class = ClassModel::findOrFail($id);
        $class->delete();

        return redirect()->back()->with('success', 'Class deleted successfully.');
    }
}
