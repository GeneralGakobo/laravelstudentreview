<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
Use\App\Models\User;
Use\App\Models\Student;
Use\App\Models\semesterUnits;
Use\App\Models\Competency;
Use\App\Models\competencyscore;
Use\App\Models\resultsTable;

class EvaluateController extends Controller
{
    public function student_courses(){
    $user = Auth::user();
        $user_email = $user->email;

        $student_details = Student::where('email',$user_email)->first();
        $student_id = $student_details->id;

        $student_units = SemesterUnits
    }
}
