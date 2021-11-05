<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class units extends Model
{
    use HasFactory;
    protected $table="units";
    protected $fillable=[
        'course_id',
        'unit_name',
    ];
}
