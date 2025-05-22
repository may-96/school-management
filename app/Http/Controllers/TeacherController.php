<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\DataTables\TeacherDataTable;
// use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function create()
    {
        return view("pages.teachers.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'     => 'required',
            'last_name'      => 'required',
            'email'          => 'required|email|unique:teachers,email',
            'date_of_birth'  => 'nullable|date',
            'joining_date'   => 'nullable|date',
            'mobile_number'  => 'nullable',
            'gender'         => 'required',
            'department'     => 'required',
            'class'          => 'nullable',
            'education'      => 'nullable',
            'profile_photo'  => 'required|mimes:jpg,jpeg,png|max:2048',

        ]);

        $fileName = null;
        if ($request->hasFile('profile_photo')) {
            $fileName = $this->uploadProfilePhoto($request->file('profile_photo'));
        }

        $data = $request->except('profile_photo');
        $data['profile_image'] = $fileName;

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
            'first_name'     => 'required',
            'last_name'      => 'required',
            'email'          => 'required|email|unique:teachers,email,' . $teacher->id,
            'date_of_birth'  => 'nullable|date',
            'joining_date'   => 'nullable|date',
            'mobile_number'  => 'nullable',
            'gender'         => 'required',
            'department'     => 'required',
            'class'          => 'nullable',
            'education'      => 'nullable',
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
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'joining_date'  => $request->joining_date,
            'mobile_number' => $request->mobile_number,
            'gender'        => $request->gender,
            'department'    => $request->department,
            'class'         => $request->class,
            'education'     => $request->education,
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
