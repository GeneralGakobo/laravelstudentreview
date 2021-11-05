<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competenciesGroups extends Model
{
    use HasFactory;
    protected $table='competencies_groups';
    protected $fillable=[
        'competency_group',
    ];
}
