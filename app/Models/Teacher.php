<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model

{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classSection()
    {
        return $this->belongsTo(ClassSection::class);
    }
    
    public function assignments()
    {
        return $this->hasMany(ClassSectionSubjectTeacher::class);
    }

    public function payrolls()
    {
        return $this->morphMany(Payroll::class, 'employeeable', 'employee_type', 'employee_id');
    }
}
