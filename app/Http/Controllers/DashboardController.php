<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Payment;

class DashboardController extends Controller

{
    public function index()
    {
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();
        $totalPaid = Payment::count();
        // $totalUnpaid = Payment::count();

        return view('dashboard', compact('totalTeachers', 'totalStudents', 'totalPaid'));
    }
}
