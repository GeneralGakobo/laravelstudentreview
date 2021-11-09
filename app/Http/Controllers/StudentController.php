<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
  
    public function register_student()
    {
       return view('student-register');
    }

  
    public function create_student(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required | unique:users',
            'mobile'=>'unique:students',
            'user_type_id'=>'required',
            'reg_no'=>'required | unique:students',
            'gender'=>'required',
            'course_id'=>'required',
            'study_year'=>'required',
           

        ]);
        

        if ($validator->fails()) {
            return redirect('/register-student')
                ->withInput()
                ->withErrors($validator);
        }
        $form_data = $request->all();
        return json_encode($form_data);
        
        unset($form_data['user_type_id']);
        unset($form_data['password']);
        unset($form_data['repeat_password']);
   
        return student::create($form_data);

         if(!empty($request->password)){
        //check password
        if ($request->password == $request->repeat_password) {
            $user = new User;
            $user->user_type_id = $request->user_type_id;
            $user->name = $request->first_name." ".$request->last_name;
            $pass = Hash::make($request->password);
            $user->password = $pass;
            $user->email = $request->email;
            $user->save();
         } 
        }

        return redirect('/register-student')->with('success', 'You are registered succesfully');

    }

   
    public function store(Request $request)
    {
        //
    }


    public function show(student $student)
    {
        //
    }

 
    public function edit(student $student)
    {
        //
    }

    
    public function update(Request $request, student $student)
    {
        //
    }

    public function destroy(student $student)
    {
        //
    }
}
