<?php

namespace App\Http\Controllers;

use App\Models\admins;
use Illuminate\Http\Request;
use App\Models\user;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
            
        public function index() {
            $data = DB::table('admins')->select('admins.*')      
            ->orderBy('id', 'asc')->get();	
            return view('admins.index', ["data" => $data,]);
        }
        public function create_page(){
            $admins = admins::select('admins.*')->get();
            return view('admins.add_admin', ["admins"=>$admins]);
        }

        public function create(Request $request) {
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required',
   
            ]);
        
            if($validator->fails()){
                return back()->with('success', 'Input all fields');
            }

            $form_data = $request->all();
            unset($form_data['password']);
            unset($form_data['repeat_password']);
            //return $form_data;

            admins::create($form_data);

            if(!empty($request->password)){
                if($request->password == $request->repeat_password){
                    $user = new user;
                    $user->user_type_id = 4;
                    $user->user_name = $request->name;
                    $user->email = $request->email;
                    $pass = Hash::make($request->password);
                    $user->password = $pass;

                    $user->save();
                }
            }

           return redirect('/add-admin')->with('success','Data saved succesfully!');
        }
        public function edit(Request $request){
            $id=$request->id;
            $name=$request->name;
            $email=$request->email;
           // dd($request);
            admins::where('id',$id)->update(['name'=>$name,'email'=>$email]);
            return redirect('/admin')->with('success', "admins $name $email updated successfully");
        }
            
            public function delete($id){
                $del = admins::findOrFail($id);
                $del->delete();
                return redirect('admin')->with('success', 'Deleted successfully!');           
            }

}
