<?php

namespace App\Jobs;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Voucher;
use App\Models\DashboardStats;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateDashboardStatsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        /**
         * Teachers / Students / Employees
         */
        $this->saveStat('total_teachers', Teacher::count());
        $this->saveStat('total_students', Student::count());
        $this->saveStat('total_employees', Employee::count());

        /**
         * Payroll Section
         */
        $this->saveStat('paid_data', Payroll::where('status', 'paid')->count());
        $this->saveStat('unpaid_data', Payroll::where('status', 'unpaid')->count());

        $totalPaidPayroll = Payroll::where('status', 'paid')
            ->withSum('details', 'amount')
            ->get()
            ->sum('details_sum_amount');

        $totalUnpaidPayroll = Payroll::where('status', 'unpaid')
            ->withSum('details', 'amount')
            ->get()
            ->sum('details_sum_amount');

        $this->saveStat('total_paid_amount_data', $totalPaidPayroll);
        $this->saveStat('total_unpaid_amount_data', $totalUnpaidPayroll);

        /**
         * Vouchers Section
         */
        $voucherTotalPaid        = Voucher::where('status', 'paid')->count();
        $voucherTotalUnpaid      = Voucher::where('status', 'unpaid')->count();
        $voucherTotalPartialPaid = Voucher::where('status', 'partial paid')->count();
        $voucherTotalAll         = $voucherTotalPaid + $voucherTotalUnpaid + $voucherTotalPartialPaid;

        $voucherTotalPaidAmount  = DB::table('payments')->sum('amount');

        $partialPaidVoucherIds   = Voucher::where('status', 'partial paid')->pluck('id');
        $voucherTotalPartialPaidAmount = DB::table('payments')
            ->whereIn('voucher_id', $partialPaidVoucherIds)
            ->sum('amount');

        $partialRemaining = Voucher::where('status', 'partial paid')
            ->select(DB::raw('SUM(amount - (SELECT COALESCE(SUM(payments.amount),0) 
                FROM payments WHERE payments.voucher_id = vouchers.id)) AS remaining'))
            ->value('remaining');

        $unpaidRemaining  = Voucher::where('status', 'unpaid')->sum('amount');

        $voucherTotalPendingAmount = ($unpaidRemaining ?? 0) + ($partialRemaining ?? 0);
        $voucherGrandTotalAmount   = $voucherTotalPaidAmount + $voucherTotalPendingAmount;

        // Save Voucher Stats
        $this->saveStat('total_vouchers', $voucherTotalAll);
        $this->saveStat('grand_total_amount', $voucherGrandTotalAmount);

        $this->saveStat('voucher_total_paid', $voucherTotalPaid);
        $this->saveStat('voucher_total_paid_amount', $voucherTotalPaidAmount);

        $this->saveStat('total_partial_paid', $voucherTotalPartialPaid);
        $this->saveStat('total_partial_paid_amount', $voucherTotalPartialPaidAmount);

        $this->saveStat('voucher_total_unpaid', $voucherTotalUnpaid);
        $this->saveStat('voucher_total_unpaid_amount', $voucherTotalPendingAmount);

        /**
         * Fee Section (Fee Received / Pending)
         * Matches your Blade IDs: total_paid, total_paid_amount, total_unpaid, total_pending_amount
         */
        $this->saveStat('total_paid', $voucherTotalPaid);  // Fee Received Count
        $this->saveStat('total_paid_amount', $voucherTotalPaidAmount); // Fee Received Amount

        $this->saveStat('total_unpaid', $voucherTotalUnpaid + $voucherTotalPartialPaid); // Fee Pending Count
        $this->saveStat('total_pending_amount', $voucherTotalPendingAmount); // Fee Pending Amount

        /**
         * Last stats check time
         */
        $this->saveStat('last_stats_checked_at', now());
    }

    private function saveStat($name, $value)
    {
        DashboardStats::updateOrCreate(
            ['stat_name' => $name],
            ['value' => $value ?? 0]
        );
    }
}
