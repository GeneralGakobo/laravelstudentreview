<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competency extends Model
{
    use HasFactory;
    protected $table="competencies";
    protected $fillable=[
        'competency_group_id',
        'competency_name',
    ];
}
