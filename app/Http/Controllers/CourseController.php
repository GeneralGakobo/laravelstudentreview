<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
            
        public function index() {
            $data = DB::table("courses")
            ->join('departments','departments.id','=','courses.department_id') 
            ->select('courses.*', 'departments.department')->get();	
            return view('course.index', ["data" => $data,]);
        }
        public function create_page(){
            $Department = Department::select('departments.*')->get();
            return view('course.add_course', ["Department"=>$Department]);
        }

        public function create(Request $requests) {
           
            $department_id =$requests['adjArr'];
            $course_id=$requests['acjArr'];           
            $course_name=$requests['abjArr'];           
             foreach ($department_id as $key=>$value) {       
                course::create(['department_id'=>$value,'course_id'=>$course_id[$key],'course_name'=>$course_name[$key]]);           
                  }     
                 return redirect('/add-course')->with('success', 'Data saved succesfully');

            }

         public function edit(Request $request){
            $id=$request->id;
            $department_id=$request->department_id;
            $course_id=$request->course_id;
            $course_name=$request->course_name;
           // dd($request);
            course::where('id',$id)->update(['department_id'=>$department_id,'course_id'=>$course_id,'course_name'=>$course_name]);
            return redirect('/course')->with('success',"courses $department_id $course_id $course_name upadated successfully");
         }
            
            public function delete($id){
                $del = course::findOrFail($id);
                $del->delete();
                return redirect('course')->with('success', 'Deleted successfully!');           
            }

}
