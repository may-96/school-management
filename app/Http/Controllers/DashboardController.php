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

        $totalPaidAmount = Voucher::where('status', 'paid')->sum('amount');

        $totalPendingAmount = Voucher::whereIn('status', ['unpaid', 'partial paid'])->sum('amount');

        $totalPaid = Voucher::where('status', 'paid')->count();
        $totalPartialPaid = Voucher::where('status', 'partial paid')->count();
        $totalUnpaid = Voucher::where('status', 'unpaid')->count();

        $totalVouchers = $totalPaid + $totalPartialPaid + $totalUnpaid;

        $school = School::latest()->first();

        return view('dashboard', compact(
            'totalTeachers',
            'totalStudents',
            'totalPaidAmount',
            'totalPendingAmount',
            'totalPaid',
            'totalPartialPaid',
            'totalUnpaid',
            'totalVouchers',
            'school'
        ));
    }


    // students and teachers charts data
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

    // payments and vouchers charts data
    public function getInvoiceChartData()
    {
        $months = collect(range(1, 12))->map(function ($m) {
            return Carbon::create()->month($m)->format('M');
        });

        $paid = [];
        $partial = [];
        $unpaid = [];
        $total = [];

        foreach (range(1, 12) as $m) {
            $paid[] = Voucher::whereMonth('created_at', $m)->where('status', 'paid')->count();
            $partial[] = Voucher::whereMonth('created_at', $m)->where('status', 'partial paid')->count();
            $unpaid[] = Voucher::whereMonth('created_at', $m)->where('status', 'unpaid')->count();
            $total[] = Voucher::whereMonth('created_at', $m)->count();
        }

        return response()->json([
            'months' => $months,
            'paid' => $paid,
            'partial' => $partial,
            'unpaid' => $unpaid,
            'total' => $total
        ]);
    }
}
