<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semesterUnits extends Model
{
    use HasFactory;
    protected  $table="semester_units";
    protected $fillable=[
        'reference_id',
        'unit_id',
        'group',
        'lecturer_id',
        'semester_id',
    ];
}
