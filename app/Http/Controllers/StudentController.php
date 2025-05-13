<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
// use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    // Show the student form
    public function create()
    {
        return view('pages.students.create');
    }

    // Store student data
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'registration_date' => 'required|date',
            'admission_no' => 'required|string|max:255',
            'roll_no' => 'required|string|max:255',
            'class' => 'required|string',
            'section' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|string',
            'parents_name' => 'required|string',
            'parents_mobile' => 'required|numeric',
            'secondary_mobile' => 'nullable|numeric',
            'profile_photo' => 'required|mimes:jpg,jpeg,png|max:2048',
            'address' => 'required|string',
        ]);

        // Handle file upload
        $fileName = null;
        if ($request->hasFile('profile_photo')) {
            $fileName = $this->uploadProfilePhoto($request->file('profile_photo'));
        }

        $data = $request->except('profile_photo');
        $data['profile_image'] = $fileName;

        // Save the student data
        Student::create($data);

        return redirect()->route('student.index')->with('success', 'Student registered successfully!');
    }

    // Show the student edit form
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('pages.students.edit', compact('student'));
    }

    // Update student data
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'registration_date' => 'required|date',
            'admission_no' => 'required|string|max:255',
            'roll_no' => 'required|string|max:255',
            'class' => 'required|string',
            'section' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|string',
            'parents_name' => 'required|string',
            'parents_mobile' => 'required|numeric',
            'secondary_mobile' => 'nullable|numeric',
            'profile_photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'address' => 'required|string',
        ]);

        $student = Student::findOrFail($id);

        if ($request->hasFile('profile_photo')) {
            if ($student->profile_image && file_exists(storage_path('app/public/students/' . $student->profile_image))) {
                unlink(storage_path('app/public/students/' . $student->profile_image));
            }

            $imagePath = $this->uploadProfilePhoto($request->file('profile_photo'));
        } else {
            $imagePath = $student->profile_image;
        }

        // Update the student data
        $student->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'dob' => $request->input('dob'),
            'registration_date' => $request->input('registration_date'),
            'admission_no' => $request->input('admission_no'),
            'roll_no' => $request->input('roll_no'),
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'gender' => $request->input('gender'),
            'status' => $request->input('status'),
            'parents_name' => $request->input('parents_name'),
            'parents_mobile' => $request->input('parents_mobile'),
            'secondary_mobile' => $request->input('secondary_mobile'),
            'profile_image' => $imagePath,
            'address' => $request->input('address'),
        ]);

        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }

    // List all students
    public function index()
    {
        $students = Student::latest()->get();
        return view('pages.students.index', compact('students'));
    }

    // Delete student data
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->profile_image && file_exists(storage_path('app/public/students/' . $student->profile_image))) {
            unlink(storage_path('app/public/students/' . $student->profile_image));
        }

        $student->delete();

        return redirect()->back()->with('success', 'Student deleted successfully!');
    }

    // Show student information
    public function show($id)
    {
        $student = Student::with('payments')->findOrFail($id); 
        return view('pages.students.show', compact('student'));
    }
    

    // Function to upload profile photo
    private function uploadProfilePhoto($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(storage_path('app/public/students'), $fileName);
        return $fileName;
    }
}
