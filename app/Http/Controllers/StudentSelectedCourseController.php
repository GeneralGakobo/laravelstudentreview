<?php

namespace App\Http\Controllers;

use App\Models\studentSelectedCourse;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\semester;
use App\Models\semesterUnits;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class StudentSelectedCourseController extends Controller
{
        public function index() {
            $data = DB::table("student_selected_courses")
            ->join('semesters','semesters.id','=','student_selected_courses.semester_id') 
            ->join('semester_units','semester_units.id','=','student_selected_courses.semester_units_id')
            ->join('students','students.id','=','student_selected_courses.student_id') 
            ->select('student_selected_courses.*', 'semesters.semester_name','students.first_name','semester_units.unit_id')->get();	
            return view('studentselectedcourses.index', ["data" => $data,]);
        }
        public function create_page(){
            $student = student::select('students.*')->get();
            $semester = semester::select('semesters.*')->get();
            $semesterUnits=semesterUnits ::select('semester_units.*')->get();
            return view('studentselectedcourses.add_studentselectedcourse', ["student"=>$student,"semester"=>$semester,"semesterUnits"=>$semesterUnits]);
        }

        public function create(Request $requests) {
           
            $semester_id=$requests['aajArr'];
            $semester_units_id=$requests['abjArr'];                      
            $student_id=$requests['acjArr'];                      
                                  
             foreach ($semester_id as $key=>$value) {       
                studentSelectedCourse::create(['semester_id'=>$value,'semester_units_id'=>$semester_units_id[$key],'student_id'=>$student_id[$key]]);          
                  }     
                 return redirect('/add-studentselectedcourse')->with('success', 'Data saved succesfully');

            }

         public function edit(Request $request){
            $id=$request->id;
            $semester_id=$request->semester_id;
            $semester_units_id=$request->semester_units_id;
            $student_id=$request->student_id;
           // dd($request);
            studentSelectedCourse::where('id',$id)->update(['semester_id'=>$semester_id,'semester_units_id'=>$semester_units_id,'student_id'=>$student_id]);
            $row = studentSelectedCourse::where('id',$request->get('id'))->first();
            return "<td>".$row->id."</td>
            <td>".$row->semester_id."</td>
            <td>".$row->semester_units_id."</td>
            <td>".$row->student_id."</td>
            <td> <button type='button' class='btn btn-primary' data-toggle='modal' onclick='showDialog($row->id)'>Update</button></td>
            ";
         }
            public function delete($id){
                $del = studentSelectedCourse::findOrFail($id);
                $del->delete();
                return redirect('studentselectedcourse')->with('success', 'Deleted successfully!');           
            }

}
