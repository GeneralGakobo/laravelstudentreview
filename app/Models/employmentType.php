<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employmentType extends Model
{
    use HasFactory;
    protected $table="employment_types";
    protected $fillable=[
        'employment_type',
    ];
}
