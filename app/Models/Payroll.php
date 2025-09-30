<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_type',
        'employee_id',
        'monthly_salary',
        'payroll_month',
        'status',
        'notes',
        'items',
        'payment_method',
        'payment_date',
        'transaction_id',
        'net_salary', // <-- add this

    ];


    public function employeeable()
    {
        return $this->morphTo(__FUNCTION__, 'employee_type', 'employee_id');
    }

    /**
     * Accessor for employee name (works for Teacher or Employee)
     */
    public function getEmployeeNameAttribute()
    {
        if ($this->employeeable) {
            return $this->employeeable->first_name . ' ' . $this->employeeable->last_name;
        }
        return null;
    }

    /**
     * Grand Total = Base salary + additions - deductions
     */
    public function getGrandTotalAttribute()
    {
        $base = $this->monthly_salary;
        $items = $this->details->sum(function ($detail) {
            return $detail->payType->is_deductible ? -$detail->amount : $detail->amount;
        });
        return $base + $items;
    }

    /**
     * Payroll details
     */
    public function details()
    {
        return $this->hasMany(PayrollDetail::class, 'payroll_id', 'id');
    }
}
