<?php

namespace App\Models;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassSection;
use App\Models\User;


class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classSection()
    {
        return $this->belongsTo(ClassSection::class, 'class_section_id');
    }
}
