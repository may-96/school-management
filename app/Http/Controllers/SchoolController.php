<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $school = School::first();
        if ($school) {
            $school->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        } else {
            School::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'School saved successfully.');
    }


    public function index()
    {
        $schools = School::all();
        return view('dashboard', compact('schools'));
    }
}
