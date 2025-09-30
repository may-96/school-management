<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\ClassModel;
use App\Models\Section;
use App\Models\Subject;
use App\Models\ClassSection;
use App\Models\ClassSectionSubjectTeacher;
use Illuminate\Http\Request;

class TeacherAssignmentController extends Controller
{
    // Get all assignments for a teacher
    public function getAssignment(Teacher $teacher)
    {
        $assignments = ClassSectionSubjectTeacher::with([
            'classSection.class',
            'classSection.section',
            'subject'
        ])
            ->where('teacher_id', $teacher->id)
            ->get();

        return response()->json([
            'assignments'    => $assignments,
            'classes'        => ClassModel::select('id', 'name')->get(),
            'sections'       => Section::select('id', 'name')->get(),
            'subjects'       => Subject::select('id', 'name')->get(),
            'class_sections' => ClassSection::with(['class', 'section'])->get(),
        ]);
    }

    // Assign a class/section/subject to a teacher
    public function assignClass(Request $request)
    {
        $data = $request->validate([
            'teacher_id'       => 'required|exists:teachers,id',
            'class_section_id' => 'required|exists:class_section,id',
            'subject_id'       => 'nullable|exists:subjects,id',
            'is_head_master'   => 'nullable|boolean',
        ]);

        // If trying to assign as Head Master
        if (!empty($data['is_head_master']) && $data['is_head_master']) {
            $headMasterExists = ClassSectionSubjectTeacher::where('class_section_id', $data['class_section_id'])
                ->where('is_head_master', true)
                ->exists();

            if ($headMasterExists) {
                return redirect()->back()->withErrors([
                    'This class-section already has a Head Master assigned. Only one Head Master is allowed.'
                ])->with('active_tab', 'profile-2');
            }
        }

        //  Block any new assignment if Head Master already exists for that class-section
        $headMasterAlreadyAssigned = ClassSectionSubjectTeacher::where('class_section_id', $data['class_section_id'])
            ->where('is_head_master', true)
            ->exists();

        if ($headMasterAlreadyAssigned) {
            return redirect()->back()->withErrors([
                'This class-section already has a Head Master. No further assignments are allowed.'
            ])->with('active_tab', 'profile-2');
        }

        // Prevent duplicate assignment for same class-section + subject (nullable subject)
        $alreadyAssignedQuery = ClassSectionSubjectTeacher::where('class_section_id', $data['class_section_id']);
        if (!empty($data['subject_id'])) {
            $alreadyAssignedQuery->where('subject_id', $data['subject_id']);
        } else {
            $alreadyAssignedQuery->whereNull('subject_id');
        }

        if ($alreadyAssignedQuery->exists()) {
            return redirect()->back()->withErrors([
                'This class-section-subject is already assigned to another teacher.'
            ])->with('active_tab', 'profile-2');
        }

        ClassSectionSubjectTeacher::create($data);

        return redirect()->back()
            ->with('success', 'Assignment created successfully.')
            ->with('active_tab', 'profile-2');
    }

    public function edit($id)
    {
        $assignment = ClassSectionSubjectTeacher::with([
            'classSection.class',
            'classSection.section',
            'subject'
        ])->findOrFail($id);

        $classes = ClassModel::select('id', 'name')->get();
        $subjects = Subject::select('id', 'name')->get();

        return response()->json([
            'assignment' => [
                'id' => $assignment->id,
                'teacher_id' => $assignment->teacher_id,
                'class_id' => $assignment->classSection->class_id,  
                'class_section_id' => $assignment->class_section_id, 
                'subject_id' => $assignment->subject_id,
                'is_head_master' => $assignment->is_head_master,
            ],
            'classes' => $classes,
            'subjects' => $subjects,
        ]);
    }

    public function updateAssignment(Request $request, $id)
    {
        $assignment = ClassSectionSubjectTeacher::findOrFail($id);

        $data = $request->validate([
            'teacher_id'       => 'required|exists:teachers,id',
            'class_section_id' => 'required|exists:class_section,id',
            'subject_id'       => 'nullable|exists:subjects,id',
            'is_head_master'   => 'nullable|boolean',
        ]);

        // Prevent multiple Head Masters in same section
        if (!empty($data['is_head_master']) && $data['is_head_master']) {
            $headMasterExists = ClassSectionSubjectTeacher::where('class_section_id', $data['class_section_id'])
                ->where('is_head_master', true)
                ->where('id', '!=', $assignment->id)
                ->exists();

            if ($headMasterExists) {
                return redirect()->back()->withErrors([
                    'This class-section already has a Head Master assigned. Only one Head Master is allowed.'
                ])->with('active_tab', 'profile-2');
            }
        }

        // Prevent duplicate assignment for same section + subject
        $alreadyAssignedQuery = ClassSectionSubjectTeacher::where('class_section_id', $data['class_section_id'])
            ->where('id', '!=', $assignment->id);

        if (!empty($data['subject_id'])) {
            $alreadyAssignedQuery->where('subject_id', $data['subject_id']);
        } else {
            $alreadyAssignedQuery->whereNull('subject_id');
        }

        if ($alreadyAssignedQuery->exists()) {
            return redirect()->back()->withErrors([
                'This class-section-subject is already assigned to another teacher.'
            ])->with('active_tab', 'profile-2');
        }

        // Update assignment
        $assignment->update($data);

        return redirect()->back()
            ->with('success', 'Assignment updated successfully.')
            ->with('active_tab', 'profile-2');
    }

    // Delete assignment
    public function destroy($id)
    {
        $assignment = ClassSectionSubjectTeacher::findOrFail($id);
        $assignment->delete();

        return redirect()->back()
            ->with('success', 'Assignment deleted successfully.')
            ->with('active_tab', 'profile-2');
    }
}
