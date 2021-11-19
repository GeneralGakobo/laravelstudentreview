<?php

namespace App\Http\Controllers;

use App\Models\semesterUnits;
use Illuminate\Http\Request;
use App\Models\units;
use App\Models\semester;
use App\Models\lecturer;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SemesterUnitsController extends Controller
{
            
        public function index() {
            $data = DB::table("semester_units")
            ->join('units','units.id','=','semester_units.unit_id') 
            ->join('semesters','semesters.id','=','semester_units.semester_id') 
            ->join('lecturers','lecturers.id','=','semester_units.lecturer_id') 
            ->select('semester_units.*', 'semesters.semester_name','lecturers.first_name','units.unit_name')->get();	
            return view('semesterunits.index', ["data" => $data,]);
        }
        public function create_page(){
            $units = units::select('units.*')->get();
            $lecturer = lecturer::select('lecturers.*')->get();
            $semester = semester::select('semesters.*')->get();
            return view('semesterunits.add_semesterunit', ["units"=>$units,"lecturer"=>$lecturer,"semester"=>$semester]);
        }

        public function create(Request $requests) {
           
            $reference_id =$requests['aajArr'];
            $unit_id=$requests['abjArr'];                      
            $group=$requests['acjArr'];                      
            $lecturer_id=$requests['adjArr'];                      
            $semester_id=$requests['aejArr'];                      
             foreach ($reference_id as $key=>$value) {       
                semesterUnits::create(['reference_id'=>$value,'unit_id'=>$unit_id[$key],'group'=>$group[$key],'lecturer_id'=>$lecturer_id[$key],'semester_id'=>$semester_id[$key]]);           
                  }     
                 return redirect('/add-semesterunit')->with('success', 'Data saved succesfully');

            }

         public function edit(Request $request){
            $id=$request->id;
            $reference_id=$request->reference_id;
            $unit_id=$request->unit_id;
            $group=$request->group;
            $lecturer_id=$request->lecturer_id;
            $semester_id=$request->semester_id;
           // dd($request);
            semesterUnits::where('id',$id)->update(['reference_id'=>$reference_id,'unit_id'=>$unit_id,'group'=>$group,'lecturer_id'=>$lectuere_id,'semester_id'=>$semester_id]);
            $row = semesterUnits::where('id',$request->get('id'))->first();
            return "<td>".$row->id."</td>
            <td>".$row->reference_id."</td>
            <td>".$row->unit_name."</td>
            <td>".$row->group."</td>
            <td>".$row->lecturer_id."</td>
            <td>".$row->semester_id."</td>
            <td> <button type='button' class='btn btn-primary' data-toggle='modal' onclick='showDialog($row->id)'>Update</button></td>
            ";
         }
            
            public function delete($id){
                $del = semesterUnits::findOrFail($id);
                $del->delete();
                return redirect('semesterunit')->with('success', 'Deleted successfully!');           
            }

}
