<?php

namespace App\Http\Controllers;

use App\Models\employmentType;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EmploymentTypeController extends Controller
{
   
    public function index()
    {
        $employmenttype = DB::table('employment_types')->orderBy('id', 'asc')->get();
		return view('employmenttypes.index', ["employmenttype" => $employmenttype]);
    }   

        public function create_page(){
            return view('employmenttypes.add_employmenttype');
        }

        public function create(Request $requests) {              
            $employmenttype =$requests['adjArr'];		//return;
            foreach ($employmenttype as $key=>$value) {
                
                $validator = Validator::make($requests->all(), [
                    'employment_type'=>'unique:employment_type',
                ]);
                if ($validator->fails()) {
                    return redirect('/add-employmenttype')
                        ->withInput()
                        ->withErrors($validator);
                }	
                employmenttype::create(['employment_type'=>$value]); 
            }
            return redirect('/add-employmenttype')->with('success', 'Data saved succesfully');
        }

        public function edit(Request $request){
            $id=$request->id;
            $employment_type=$request->employment_type;
           // dd($request);
            employmenttype::where('id',$id)->update(['employment_type'=>$employment_type]);
            return redirect("/employmenttype")->with('success',"designation $employment_type updated successfully");
        }
        public function delete($id){

            $del = employmenttype::findOrFail($id);
            $del->delete();
            return redirect('employmenttype')->with('success', 'Deleted successfully!');
                
        }
    

    
}
