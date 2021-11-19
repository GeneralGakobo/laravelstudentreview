<?php

namespace App\Http\Controllers;

use App\Models\hod;
use Illuminate\Http\Request;
use App\Models\staffCategory;
use App\Models\designation;
use App\Models\Department;
use App\Models\employmentType;
use App\Models\user;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HodController extends Controller
{
 
        public function index() {
            $data = DB::table("hods")
            ->join('departments','departments.id','=','hods.department_id')       
            ->join('staff_categories','staff_categories.id','=','hods.staff_category_id')       
            ->join('employment_types','employment_types.id','=','hods.employment_type_id')       
            ->join('designations','designations.id','=','hods.designation')       
            ->select('hods.*', 'staff_categories.staff_category','departments.department','employment_types.employment_type','designations.designation_name')
          ->get();	
            return view('hod.index', ["data" => $data]);
        }
        public function create_page(){
            $employmentType = employmentType::select('employment_types.*')->get();
            $staffCategory = staffCategory::select('staff_categories.*')->get();
            $designation = designation::select('designations.*')->get();
            $Department = Department::select('departments.*')->get();
            return view('hod.add_hod', ["Department"=>$Department,"designation"=>$designation,"staffCategory"=>$staffCategory,"employmentType"=>$employmentType]);
        }

        public function create(Request $request) {
            $validator = Validator::make($request->all(),[
                'first_name'=>'required',
                'last_name'=>'required',
                'reference_no'=>'required',
                'department_id'=>'required',
                'staff_category_id'=>'required',
                'employment_type_id'=>'required',
                'designation'=>'required',
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

            hod::create($form_data);

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

           return redirect('/add-hod')->with('success','Data saved succesfully!');
        }

            
            public function delete($id){
                $del = hod::findOrFail($id);
                $del->delete();
                return redirect('hod')->with('success', 'Deleted successfully!');           
            }

}
