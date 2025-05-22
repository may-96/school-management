<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();

        return view('dashboard', compact('totalTeachers', 'totalStudents'));
    }
}
