<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30|unique:subjects,name',
        ]);

        Subject::create([
            'name' => $request->name,
        ]);

        return redirect()->back()
            ->with('success', 'Subject created successfully.')
            ->with('active_tab', 'profile-3');
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:30|unique:subjects,name,' . $subject->id,
        ]);

        $subject->update([
            'name' => $request->name,
        ]);

        return redirect()->back()
            ->with('success', 'Subject updated successfully.')
            ->with('active_tab', 'profile-3');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->back()->with('success', 'Subject deleted successfully!')
            ->with('active_tab', 'profile-3');
    }
}
