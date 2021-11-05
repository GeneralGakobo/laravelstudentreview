<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class designation extends Model
{
    use HasFactory;
    protected $table="designation";
    protected $fillable=[
        'designation_name',
    ];
}
