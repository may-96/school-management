<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Voucher;

class VoucherItem extends Model

{
    use HasFactory;

    protected $guarded = [];

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function feeType()
    {
        return $this->belongsTo(FeeType::class, 'fee_type_id');
    }
}
