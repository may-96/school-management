<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSectionSubjectTeacher extends Model
{
    use HasFactory;

    protected $table = 'class_section_subject_teacher';

    protected $fillable = [

        'class_section_id',
        'subject_id',
        'teacher_id',
        'is_head_master',
    ];

    // Relationships
    public function classSection()
    {
        return $this->belongsTo(ClassSection::class, 'class_section_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    // ClassSectionSubjectTeacher.php
    public function getClassAttribute()
    {
        return $this->classSection?->class;
    }

    public function getSectionAttribute()
    {
        return $this->classSection?->section;
    }
}
