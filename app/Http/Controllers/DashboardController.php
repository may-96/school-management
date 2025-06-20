<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Payment;
use App\Models\School;

class DashboardController extends Controller

{
    public function index()
    {
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();
        $totalPaid = Payment::count();
        $school = School::latest()->first();
        // $totalUnpaid = Payment::count();

        return view('dashboard', compact('totalTeachers', 'totalStudents', 'totalPaid', 'school'));
    }

 
}
