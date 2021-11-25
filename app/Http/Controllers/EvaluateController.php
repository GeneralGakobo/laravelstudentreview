<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;
Use App\Models\Student;
Use App\Models\semesterUnits;
use App\Models\StudentSelectedCourse;
Use App\Models\Competency;
use App\Models\Semester;
use App\Models\units;
Use App\Models\competencyscore;
Use App\Models\resultsTable;

class EvaluateController extends Controller
{
    public function student_courses(){
        $active_semester = Semester::where('is_active',true)->first();
        $active_semester_id = $active_semester->id;
         $user = Auth::user();
        $user_email = $user->email;

        $student_details = Student::where('email',$user_email)->first();
        $student_id = $student_details->id;

        $student_units = StudentSelectedCourse::select('student_selected_courses.*')
        ->where('student_id','=',$student_id)
        ->where('semester_id','=',$active_semester_id)
        ->get();
       // return json_encode($student_units);
       return view('evaluate.index', ["studentunits"=>$student_units]);
    }
    public function assess($id){
            $competencies = Competency::select('competencies.*')->get();
            $competencyscores=competencyscore::select('competency_scores.*')->get();

            return view('evaluate.assess', ["competencies"=>$competencies,"competencyscores"=>$competencyscores], compact('id'));
    }
}
