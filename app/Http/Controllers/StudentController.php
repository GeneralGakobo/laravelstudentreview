<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use App\Models\school;
use App\Models\course;
use App\Models\user;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
            
        public function index() {
            $data = DB::table('students')->select('students.*', 'courses.course_name')
            ->join('courses','courses.id','=','students.course_id',)       
            ->orderBy('id', 'asc')->get();	
            return view('students.index', ["data" => $data,]);
        }
        public function create_page(){
            $course = course::select('courses.*')->get();
            return view('students.add_student', ["course"=>$course]);
        }

        public function create(Request $request) {
            $validator = Validator::make($request->all(),[
                'first_name'=>'required',
                'last_name'=>'required',
                'reg_no'=>'required',
                'course_id'=>'required',
                'study_year_id'=>'required',
                'gender'=>'required',
                'mobile'=>'required',
                'email'=>'required',
   
            ]);
        
            if($validator->fails()){
                return back()->with('success', 'Input all fields');
            }

            $form_data = $request->all();
            unset($form_data['password']);
            unset($form_data['repeat_password']);
            //return $form_data;

            student::create($form_data);

            if(!empty($request->password)){
                if($request->password == $request->repeat_password){
                    $user = new user;
                    $user->user_type_id = 4;
                    $user->user_name = $request->first_name.' '.$request->last_name;
                    $user->email = $request->email;
                    $pass = Hash::make($request->password);
                    $user->password = $pass;

                    $user->save();
                }
            }

           return redirect('/add-student')->with('success','Data saved succesfully!');
        }

            
            public function delete($id){
                $del = student::findOrFail($id);
                $del->delete();
                return redirect('student')->with('success', 'Deleted successfully!');           
            }

}
