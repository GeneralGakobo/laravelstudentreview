<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecturer extends Model
{
    use HasFactory;
    protected $table="lecturers";
    protected $fillable=[
        'employment_type_id',
        'staff_category',
        'first_name',
        'last_name',
        'reference_no',
        'email',
        'designation',
        'department_id',
        'mobile',
    ];
}
