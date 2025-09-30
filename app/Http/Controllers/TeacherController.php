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
            'email' => 'nullable|email|max:30|unique:teachers,email',
            'department' => 'nullable|string|max:25',
            'education' => 'nullable|string|max:25',
            'monthly_salary' => 'required|numeric|min:0|max:10000000',
            'status' => 'nullable|string|max:20',
            'profile_photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'address' => 'nullable|string|max:100',
        ]);

        $fileName = null;
        if ($request->hasFile('profile_photo')) {
            $fileName = $this->uploadProfilePhoto($request->file('profile_photo'));
        }

        $data = $request->except('profile_photo');
        $data['profile_image'] = $fileName;
        $data['user_id'] = Auth::id();

        Teacher::create($data);

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully!');
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
            'email' => 'nullable|email|max:30|unique:teachers,email,' . $teacher->id,
            'department' => 'nullable|string|max:25',
            'education' => 'nullable|string|max:25',
            'monthly_salary' => 'required|numeric|min:0|max:10000000',
            'status' => 'nullable|string|max:20',
            'profile_photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'address' => 'nullable|string|max:100',
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
            'education' => $request->education,
            'monthly_salary' => $request->monthly_salary,
            'status' => $request->status,
            'profile_image' => $imagePath,
            'address' => $request->input('address'),

        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }

    public function index(TeacherDataTable $dataTable)
    {
        return $dataTable->render('pages.teachers.index');
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $teacher = Teacher::with([
            'assignments.classSection.class',
            'assignments.classSection.section',
            'assignments.subject'
        ])->findOrFail($id);

        return view('pages.teachers.show', compact('teacher'));
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher->payrolls()->exists()) {
            return redirect()->back()->with('info', 'Teacher cannot be deleted because payroll has already been created.');
        }

        if ($teacher->profile_image && file_exists(storage_path('app/public/teachers/' . $teacher->profile_image))) {
            unlink(storage_path('app/public/teachers/' . $teacher->profile_image));
        }

        $teacher->delete();

        return redirect()->back()->with('success', 'Teacher deleted successfully!');
    }

    private function uploadProfilePhoto($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(storage_path('app/public/teachers'), $fileName);
        return $fileName;
    }
}
