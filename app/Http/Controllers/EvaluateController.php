<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;
Use App\Models\student;
Use App\Models\semesterUnits;
use App\Models\studentSelectedCourse;
Use App\Models\competency;
use App\Models\semester;
use App\Models\units;
Use App\Models\competencyScore;
Use App\Models\resultsTable;

class EvaluateController extends Controller
{
    public function student_courses(){
        $active_semester = semester::where('is_active',true)->first();
        $active_semester_id = $active_semester->id;
         $user = Auth::user();
        $user_email = $user->email;

        $student_details = student::where('email',$user_email)->first();
        $student_id = $student_details->id;

        $student_units = studentSelectedCourse::select('student_selected_courses.*')
        ->where('student_id','=',$student_id)
        ->where('semester_id','=',$active_semester_id)
        ->get();
       // return json_encode($student_units);
       return view('evaluate.index', ["studentunits"=>$student_units]);
    }
    public function assess($id){
            $competencies = competency::select('competencies.*')->get();
            $competencyscores=competencyScore::select('competency_scores.*')->get();

            return view('evaluate.assess', ["competencies"=>$competencies,"competencyscores"=>$competencyscores], compact('id'));
    }
    public function sub(Request $request){
        $competency_id = $request['adjArr'];
        $score_id = $request['acjArr'];
        $student_id=$request->student_id;
        $semester_units_id=$request->semester_units_id;
    
      
            foreach ($competency_id as $key => $value) {
                $acjValue = $score_id[$key];
                resultsTable::create(['semester_units_id'=>$semester_units_id,'student_id'=>$student_id,'competency_id'=>$value,'score_id'=>$acjValue]);
    
            }
            return redirect('evaluate')->with('success', 'Data saved succesfully');
        
    }
}
