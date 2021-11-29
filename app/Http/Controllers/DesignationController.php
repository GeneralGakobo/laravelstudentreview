<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
   
    public function index()
    {
        $designations = DB::table('designations')->orderBy('id', 'asc')->get();
		return view('designation.index', ["designations" => $designations]);
    }   

        public function create_page(){
            return view('designation.add_designation');
        }

        public function create(Request $requests) {              
            $designations =$requests['adjArr'];		//return;
            foreach ($designations as $key=>$value) {
                
                $validator = Validator::make($requests->all(), [
                    'designation_name'=>'unique:designation_name',
                ]);
                if ($validator->fails()) {
                    return redirect('/add-designation')
                        ->withInput()
                        ->withErrors($validator);
                }	
                designation::create(['designation_name'=>$value]); 
            }
            return redirect('/add-designation')->with('success', 'Data saved succesfully');
        }

        public function edit(Request $request){
            $id=$request->id;
            $designation_name=$request->designation_name;
           // dd($request);
            designation::where('id',$id)->update(['designation_name'=>$designation_name]);
            return redirect("/designations")->with('success',"designation $designation_name updated successfully");

        }
        public function delete($id){

            $del = designation::findOrFail($id);
            $del->delete();
            return redirect('designations')->with('success', 'Deleted successfully!');
                
        }
    

    
}
