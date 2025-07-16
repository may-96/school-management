<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\DataTables\TeacherDataTable;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function create()
    {
        return view('pages.teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:25',
            'gender' => 'required',
            'mobile_number' => 'required|string|max:25',
            'date_of_birth' => 'required|date',
            'joining_date' => 'required|date',
            'email' => 'nullable|email|unique:teachers,email',
            'class' => 'nullable',
            'department' => 'nullable|string|max:40',
            'education' => 'nullable|string|max:40',
            'profile_photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fileName = null;
        if ($request->hasFile('profile_photo')) {
            $fileName = $this->uploadProfilePhoto($request->file('profile_photo'));
        }

        $data = $request->except('profile_photo');
        $data['profile_image'] = $fileName;
        $data['user_id'] = Auth::id();

        Teacher::create($data);

        return redirect()->route('teacher.index')->with('success', 'Teacher added successfully!');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('pages.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:25',
            'gender' => 'required',
            'mobile_number' => 'required|string|max:25',
            'date_of_birth' => 'required|date',
            'joining_date' => 'required|date',
            'email' => 'nullable|email|unique:teachers,email,' . $teacher->id,
            'class' => 'nullable',
            'department' => 'nullable|string|max:40',
            'education' => 'nullable|string|max:40',
            'profile_photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($teacher->profile_image && file_exists(storage_path('app/public/teachers/' . $teacher->profile_image))) {
                unlink(storage_path('app/public/teachers/' . $teacher->profile_image));
            }

            $imagePath = $this->uploadProfilePhoto($request->file('profile_photo'));
        } else {
            $imagePath = $teacher->profile_image;
        }

        $teacher->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'joining_date' => $request->joining_date,
            'mobile_number' => $request->mobile_number,
            'gender' => $request->gender,
            'department' => $request->department,
            'class' => $request->class,
            'education' => $request->education,
            'profile_image' => $imagePath,
        ]);

        return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully!');
    }

    public function index(TeacherDataTable $dataTable)
    {
        return $dataTable->render('pages.teachers.index');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher->profile_image && file_exists(storage_path('app/public/teachers/' . $teacher->profile_image))) {
            unlink(storage_path('app/public/teachers/' . $teacher->profile_image));
        }

        $teacher->delete();

        return redirect()->back()->with('success', 'Teacher deleted successfully!');
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('pages.teachers.show', compact('teacher'));
    }

    private function uploadProfilePhoto($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(storage_path('app/public/teachers'), $fileName);
        return $fileName;
    }
}
