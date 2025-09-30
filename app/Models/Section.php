<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_section', 'section_id', 'class_id');
    }
}
