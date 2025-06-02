<?php

namespace App\Models;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Student;

class Payment extends Model

{
  use HasFactory;

  protected $guarded = [];

  public function voucher()
  {
    return $this->belongsTo(Voucher::class);
  }

  public function student()
  {
    return $this->belongsTo(Student::class);
  }
}
