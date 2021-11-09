<?php

namespace App\Http\Controllers;

use App\Models\school;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
   
    public function index()
    {
        $schools = DB::table('schools')->orderBy('id', 'asc')->get();
		return view('schools.school', ["schools" => $schools]);
    }   

        public function create_page(){
            return view('schools.add_school');
        }

        public function create(Request $requests) {              
            $schools =$requests['adjArr'];		//return;
            foreach ($schools as $key=>$value) {
                
                $validator = Validator::make($requests->all(), [
                    'school_name'=>'unique:school_name',
                ]);
                if ($validator->fails()) {
                    return redirect('/add-school')
                        ->withInput()
                        ->withErrors($validator);
                }	
                school::create(['school_name'=>$value]); 
            }
            return redirect('/add-school')->with('success', 'Data saved succesfully');
        }

        public function edit(Request $request){
            $id=$request->id;
            $school_name=$request->school_name;
           // dd($request);
            school::where('id',$id)->update(['school_name'=>$school_name]);
            $row = school::where('id',$id)->first();
            return "<td>".$row->id."</td>
            <td>".$row->school_name."</td>
            <td> <button type='button' class='btn btn-success' data-toggle='modal' onclick='showDialog($row->id)'>Updated</button></td>
            ";

        }
        public function delete($id){

            $del = school::findOrFail($id);
            $del->delete();
            return redirect('schools')->with('success', 'Deleted successfully!');
                
        }
    

    
}
