<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Payment;
use App\Models\School;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller

{
    public function index()
    {
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();
        $totalPaid = Payment::count();
        $totalUnpaid = Voucher::where('status', 'unpaid')->count();
        $school = School::latest()->first();

        return view('dashboard', compact('totalTeachers', 'totalStudents', 'totalPaid', 'school', 'totalUnpaid'));
    }


    public function getCourseReportChartData()
    {
        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create(null, $month, 1)->format('M');
        });

        $teacherData = [];
        $studentData = [];

        foreach (range(1, 12) as $month) {
            $teacherCount = DB::table('teachers')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', now()->year)
                ->count();

            $studentCount = DB::table('students')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', now()->year)
                ->count();

            $teacherData[] = $teacherCount;
            $studentData[] = $studentCount;
        }

        return response()->json([
            'months'       => $months,
            'teacher_data' => $teacherData,
            'student_data' => $studentData,
        ]);
    }
}
