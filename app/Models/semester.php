<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    use HasFactory;
    protected $table="semesters";
    protected $fillable=[
        'semester_name',
        'date_from',
        'date_to',
        'academic_year',
        'is_active',
    ];
}
