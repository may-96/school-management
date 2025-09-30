<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{

    public function getByClass($classId)
    {
        $sections = DB::table('class_section')
            ->join('sections', 'class_section.section_id', '=', 'sections.id')
            ->where('class_section.class_id', $classId)
            ->select('class_section.id as id', 'sections.name as section_name')
            ->get();

        return response()->json($sections);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section_name' => 'required|string|max:15|unique:sections,name',
            'classes' => 'nullable|array',
            'classes.*' => 'exists:classes,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('active_tab', 'profile-2');
        }

        $section = Section::create(['name' => $request->section_name]);
        $section->classes()->attach($request->input('classes', []));

        return redirect()->back()
            ->with('success', 'Section created successfully.')
            ->with('active_tab', 'profile-2');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'section_name' => 'required|string|max:15|unique:sections,name,' . $id,
            'classes' => 'nullable|array',
            'classes.*' => 'exists:classes,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('active_tab', 'profile-2');
        }

        $section = Section::findOrFail($id);
        $section->update([
            'name' => $request->section_name,
        ]);

        $section->classes()->sync($request->input('classes', []));

        return redirect()->back()
            ->with('success', 'Section updated successfully.')
            ->with('active_tab', 'profile-2');
    }


    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->back()
            ->with('success', 'Section deleted successfully.')
            ->with('active_tab', 'profile-2');
    }
}
