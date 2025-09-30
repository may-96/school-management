<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    public function create()
    {
        $school = School::first();
        return view('appsetting', compact('school'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:225',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $school = School::first();

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();

            if ($school && $school->logo && Storage::disk('public')->exists('schools/' . $school->logo)) {
                Storage::disk('public')->delete('schools/' . $school->logo);
            }

            Storage::disk('public')->putFileAs('schools', $file, $fileName);

            $data['logo'] = $fileName;
        }

        if ($school) {
            $school->update($data);
        } else {
            School::create($data);
        }

        return redirect()->route('dashboard')->with('success', 'School saved successfully.');
    }

    public function index()
    {
        $schools = School::all();
        return view('dashboard', compact('schools'));
    }
}
