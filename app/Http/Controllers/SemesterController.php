<?php

namespace App\Http\Controllers;

use App\Models\semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class  SemesterController extends Controller
{
            
        public function index() {
            $data = DB::table("semesters")
            ->select('semesters.*')->get();	
            return view('semesters.index', ["data" => $data,]);
        }
        public function create_page(){
            return view('semesters.add_semester');
        }

        public function create(Request $requests) {
         
            $semester_name =$requests['aajArr'];
            $date_from=$requests['abjArr'];                      
            $date_to=$requests['acjArr'];                      
            $academic_year=$requests['adjArr'];                      
            $is_active=$requests['aejArr'];                      
             foreach($semester_name as $key=>$value) {
                $validator = Validator::make($requests->all(), [
                    'semester_name'=>'semester_name',
                    'date_from'=>'date_from',
                    'date_to'=>'date_to',
                    'academic_year'=>'academic_year',
                    'is_active'=>'is_active',
                ]);
                if ($validator->fails()) {
                    return redirect('/add-semester')
                        ->withInput()
                        ->withErrors($validator);
                }       
                semester::create(['semester_name'=>$semester_name[$key],'date_from'=>$date_from[$key],'date_to'=>$date_to[$key],'academic_year'=>$academic_year[$key],'is_active'=>$is_active[$key]]);           
                  }     
                 return redirect('/add-semester')->with('success', 'Data saved succesfully');

            }

         public function edit(Request $request){
            $id=$request->id;
            $semester_name=$request->semester_name;
            $date_from=$request->date_from;
            $date_to=$request->date_to;
            $academic_year=$request->academic_year;
            $is_active=$request->is_active;
           // dd($request);
            semester::where('id',$id)->update(['semester_name'=>$semester_name,'date_from'=>$date_from,'date_to'=>$date_to,'academic_year'=>$academic_year,'is_active]'=>$is_active]);
            $row = semester::where('id',$request->get('id'))->first();
            return "<td>".$row->id."</td>
            <td>".$row->semester_name."</td>
            <td>".$row->date_from."</td>
            <td>".$row->date_to."</td>
            <td>".$row->academic_year."</td>
            <td>".$row->is_active."</td>
            <td> <button type='button' class='btn btn-primary' data-toggle='modal' onclick='showDialog($row->id)'>Update</button></td>
            ";
         }
            
            public function delete($id){
                $del = semester::findOrFail($id);
                $del->delete();
                return redirect('semester')->with('success', 'Deleted successfully!');           
            }

}
