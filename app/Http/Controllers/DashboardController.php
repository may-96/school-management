<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Payment;
use App\Models\School;
use App\Models\Voucher;

class DashboardController extends Controller

{
    public function index()
    {
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();
        $totalPaid = Payment::count();
        $school = School::latest()->first();
        $totalUnpaid = Voucher::count();

        return view('dashboard', compact('totalTeachers', 'totalStudents', 'totalPaid', 'school', 'totalUnpaid'));
    }

 
}
