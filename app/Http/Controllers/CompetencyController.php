<?php

namespace App\Http\Controllers;

use App\Models\competency;
use Illuminate\Http\Request;
use App\Models\competenciesGroups;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CompetencyController extends Controller
{
            
        public function index() {
            $data = DB::table("competencies")
            ->join('competencies_groups','competencies_groups.id','=','competencies.competency_group_id') 
            ->select('competencies.*', 'competencies_groups.competency_group')->get();	
            return view('competency.index', ["data" => $data,]);
        }
        public function create_page(){
            $competenciesGroups = competenciesGroups::select('competencies_groups.*')->get();
            return view('competency.add_competency', ["competenciesGroups"=>$competenciesGroups]);
        }

        public function create(Request $requests) {
           
            $competency_group_id =$requests['adjArr'];
            $competency_name=$requests['acjArr'];                      
             foreach ($competency_group_id as $key=>$value) {       
                competency::create(['competency_group_id'=>$value,'competency_name'=>$competency_name[$key]]);           
                  }     
                 return redirect('/add-competency')->with('success', 'Data saved succesfully');

            }

         public function edit(Request $request){
            $id=$request->id;
            $competency_group_id=$request->competency_group_id;
            $competency_name=$request->competency_name;
           // dd($request);
            competency::where('id',$id)->update(['competency_group_id'=>$competency_group_id,'competency_name'=>$competency_name]);
            $row = competency::where('id',$request->get('id'))->first();
            return "<td>".$row->id."</td>
            <td>".$row->competency_group_id."</td>
            <td>".$row->competency_name."</td>
            <td> <button type='button' class='btn btn-primary' data-toggle='modal' onclick='showDialog($row->id)'>Update</button></td>
            ";
         }
            
            public function delete($id){
                $del = competency::findOrFail($id);
                $del->delete();
                return redirect('competency')->with('success', 'Deleted successfully!');           
            }

}
