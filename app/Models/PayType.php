<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PayType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_deductible',
    ];

    protected $casts = [
        'is_deductible' => 'boolean',
    ];

    protected static function booted()
    {
        static::updating(function ($payType) {
            if ($payType->name === 'Basic Salary') {
                throw new \Exception("You cannot edit the Basic Salary pay type.");
            }
        });

        static::deleting(function ($payType) {
            if ($payType->name === 'Basic Salary') {
                throw new \Exception("You cannot delete the Basic Salary pay type.");
            }
        });
    }
}
