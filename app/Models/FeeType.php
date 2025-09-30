<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FeeType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function voucherItems()
    {
        return $this->hasMany(VoucherItem::class, 'fee_type_id');
    }

}
