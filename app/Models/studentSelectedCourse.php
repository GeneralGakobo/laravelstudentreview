<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentSelectedCourse extends Model
{
    use HasFactory;
    protected $table="student_selected_courses";
    protected $fillable=[
        'semester_id',
        'semester_units_id',
        'student_id',
    ];
}
