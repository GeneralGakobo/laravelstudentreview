<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competencyScore extends Model
{
    use HasFactory;
    protected $table="competency_scores";
    protected $fillable=[
        'score_name',
        'score_value',
    ];
}
