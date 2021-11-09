<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\school;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
            
        public function index() {
            $data = DB::table('departments')->select('departments.*', 'schools.school_name')
            ->join('schools','schools.id','=','departments.school_id')       
            ->orderBy('id', 'asc')->get();	
            return view('departments.index', ["data" => $data,]);
        }
        public function create_page(){
            $school = school::select('schools.*')->get();
            return view('departments.add_department', ["school"=>$school]);
        }

        public function create(Request $requests) {
           
            $school_id =$requests['adjArr'];
            $department=$requests['acjArr'];           
             foreach ($school_id as $key=>$value) {       
                Department::create(['school_id'=>$value,'department'=>$department[$key]]);           
                  }     
                 return redirect('/add-department')->with('success', 'Data saved succesfully');

            }

         public function edit(Request $request){
            $id=$request->id;
            $school_id=$request->school_id;
            $department=$request->department;
           // dd($request);
            department::where('id',$id)->update(['school_id'=>$school_id,'department'=>$department]);
            $row = department::where('id',$request->get('id'))->first();
            return "<td>".$row->id."</td>
            <td>".$row->school_id."</td>
            <td>".$row->department."</td>
            <td> <button type='button' class='btn btn-primary' data-toggle='modal' onclick='showDialog($row->id)'>Update</button></td>
            ";
         }
            
            public function delete($id){
                $del = Department::findOrFail($id);
                $del->delete();
                return redirect('departments')->with('success', 'Deleted successfully!');           
            }

}
