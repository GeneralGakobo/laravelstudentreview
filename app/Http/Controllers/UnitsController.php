<?php

namespace App\Http\Controllers;

use App\Models\units;
use Illuminate\Http\Request;
use App\Models\course;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UnitsController extends Controller
{
            
        public function index() {
            $data = DB::table("units")
            ->join('courses','courses.id','=','units.course_id') 
            ->select('units.*', 'courses.course_name')->get();	
            return view('units.index', ["data" => $data,]);
        }
        public function create_page(){
            $course = course::select('courses.*')->get();
            return view('units.add_unit', ["course"=>$course]);
        }

        public function create(Request $requests) {
           
            $course_id =$requests['adjArr'];
            $unit_name=$requests['acjArr'];           
             foreach ($course_id as $key=>$value) {       
                units::create(['course_id'=>$value,'unit_name'=>$unit_name[$key]]);           
                  }     
                 return redirect('/add-unit')->with('success', 'Data saved succesfully');

            }

         public function edit(Request $request){
            $id=$request->id;
            $course_id=$request->course_id;
            $unit_name=$request->unit_name;
           // dd($request);
            units::where('id',$id)->update(['course_id'=>$course_id,'unit_name'=>$unit_name]);
          return redirect('unit')->with('success',"units $course_id $unit_name updated successfully");
         }
            public function delete($id){
                $del = units::findOrFail($id);
                $del->delete();
                return redirect('unit')->with('success', 'Deleted successfully!');           
            }

}
