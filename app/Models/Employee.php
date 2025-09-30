<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'mobile_no',
        'dob',
        'joining_date',
        'email',
        'department',
        'monthly_salary',
        'status',
        'employee_profile',
        'address',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function payrolls()
    // {
    //     return $this->hasMany(Payroll::class, 'employee_id', 'id')
    //         ->where('employee_type', 'employee');
    // }

    public function payrolls()
    {
        return $this->morphMany(Payroll::class, 'employeeable', 'employee_type', 'employee_id');
    }
}
