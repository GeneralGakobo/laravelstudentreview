<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resultsTable extends Model
{
    use HasFactory;
    protected $table="results_tables";
    protected $fillable=[
        'semester_units_id',
        'student_id',
        'competency_id',
        'score_id',
    ];
}
