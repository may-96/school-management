<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VoucherItem;
use App\Models\Payment;

class Voucher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(VoucherItem::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function voucherItems()
    {
        return $this->hasMany(VoucherItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

      public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
}
