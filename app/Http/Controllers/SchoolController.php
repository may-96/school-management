<?php

namespace App\Http\Controllers;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    // Show the form
    public function create()
    {
        return view('appsetting');
    }

    // Store the form data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        School::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard')->with('success', 'School saved successfully.');
    }

    // Show saved data
    public function index()
    {
        $schools = School::all();
        return view('dashboard', compact('schools'));
    }
}
