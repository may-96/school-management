<?php

namespace App\Models;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'invoice_id',
        'reference_no',
        'payment_method',
        'amount',
        'payment_date',
        'notes',
    ];

 
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    
}
