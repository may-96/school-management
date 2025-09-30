<?php

namespace App\Http\Controllers;

use App\Models\DashboardStats;
use App\Models\School;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Jobs\UpdateDashboardStatsJob;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = DashboardStats::pluck('value', 'stat_name');
        $lastChecked = $stats['last_stats_checked_at'] ?? null;
        $school = School::latest()->first();

        return view('dashboard', compact('stats', 'school', 'lastChecked'));
    }

    public function refreshStats()
    {
        UpdateDashboardStatsJob::dispatchSync();

        $stats = DashboardStats::pluck('value', 'stat_name');
        $lastChecked = $stats['last_stats_checked_at'] ?? null;

        return response()->json([
            'message' => 'Dashboard stats refreshed successfully.',
            'stats' => $stats,
            'last_checked' => $lastChecked
        ]);
    }

    // students and teachers charts data
    public function getCourseReportChartData()
    {
        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create(null, $month, 1)->format('M');
        });

        $teacherData = [];
        $studentData = [];
        $employeeData = [];

        foreach (range(1, 12) as $month) {
            $teacherCount = DB::table('teachers')->whereMonth('created_at', $month)->whereYear('created_at', now()->year)->count();

            $studentCount = DB::table('students')->whereMonth('created_at', $month)->whereYear('created_at', now()->year)->count();

            $employeeCount = DB::table('employees')->whereMonth('created_at', $month)->whereYear('created_at', now()->year)->count();

            $teacherData[] = $teacherCount;
            $studentData[] = $studentCount;
            $employeeData[] = $employeeCount;
        }

        return response()->json([
            'months' => $months,
            'teacher_data' => $teacherData,
            'student_data' => $studentData,
            'employee_data' => $employeeData,
        ]);
    }

    // payrollreportbarchart
    public function getPayrollReportChartData()
    {
        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create(null, $month, 1)->format('M');
        });

        $paidData = [];
        $unpaidData = [];

        foreach (range(1, 12) as $month) {
            $paidCount = DB::table('payrolls')->whereMonth('created_at', $month)->whereYear('created_at', now()->year)->where('status', 'paid')->count();

            $unpaidCount = DB::table('payrolls')->whereMonth('created_at', $month)->whereYear('created_at', now()->year)->where('status', 'unpaid')->count();

            $paidData[] = $paidCount;
            $unpaidData[] = $unpaidCount;
        }

        return response()->json([
            'months' => $months,
            'paid_data' => $paidData,
            'unpaid_data' => $unpaidData,
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

        $tooltipPaid = [];
        $tooltipPartial = [];
        $tooltipUnpaid = [];
        $tooltipTotal = [];

        foreach (range(1, 12) as $m) {

            $totalPaid = Voucher::whereMonth('created_at', $m)
                ->where('status', 'paid')->count();

            $partialCount = Voucher::whereMonth('created_at', $m)
                ->where('status', 'partial paid')->count();

            $unpaidCount = Voucher::whereMonth('created_at', $m)
                ->where('status', 'unpaid')->count();

            $totalCount = $totalPaid + $partialCount + $unpaidCount;


            $paidVoucherIds = Voucher::whereMonth('created_at', $m)
                ->where('status', 'paid')
                ->pluck('id');

            $totalPaidAmount = DB::table('payments')
                ->whereIn('voucher_id', $paidVoucherIds)
                ->sum('amount');

            $partialPaidVoucherIds = Voucher::whereMonth('created_at', $m)
                ->where('status', 'partial paid')
                ->pluck('id');

            $partialAmount = DB::table('payments')
                ->whereIn('voucher_id', $partialPaidVoucherIds)
                ->sum('amount');

            $partialRemaining = Voucher::whereMonth('created_at', $m)
                ->where('status', 'partial paid')
                ->select(DB::raw('SUM(amount - (SELECT COALESCE(SUM(payments.amount), 0) FROM payments WHERE payments.voucher_id = vouchers.id)) AS remaining'))
                ->value('remaining') ?? 0;

            $unpaidAmount = Voucher::whereMonth('created_at', $m)
                ->where('status', 'unpaid')
                ->sum('amount');

            // $totalAmount = $totalPaidAmount + $partialAmount + $partialRemaining + $unpaidAmount;

            $paid[] = $totalPaid;
            $partial[] = $partialCount;
            $unpaid[] = $unpaidCount;
            $total[] = $totalCount;

            $tooltipPaid[] = "{$totalPaid} (" . number_format($totalPaidAmount + $partialAmount) . " PKR)";
            $tooltipPartial[] = "{$partialCount} (" . number_format($partialAmount) . " PKR)";
            $tooltipUnpaid[] = "{$unpaidCount} (" . number_format($unpaidAmount + $partialRemaining) . " PKR)";
            $tooltipTotal[] = "{$totalCount} (" . number_format($totalPaidAmount + $partialAmount + $partialRemaining + $unpaidAmount) . " PKR)";
        }

        return response()->json([
            'months' => $months,
            'paid' => $paid,
            'partial' => $partial,
            'unpaid' => $unpaid,
            'total' => $total,

            'tooltipPaid' => $tooltipPaid,
            'tooltipPartial' => $tooltipPartial,
            'tooltipUnpaid' => $tooltipUnpaid,
            'tooltipTotal' => $tooltipTotal,
        ]);
    }
}
