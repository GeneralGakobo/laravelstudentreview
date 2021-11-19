<?php

namespace App\Http\Controllers;

use App\Models\competencyScore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class  CompetencyScoreController extends Controller
{
            
        public function index() {
            $data = DB::table("competency_scores")
            ->select('competency_scores.*')->get();	
            return view('competencyscores.index', ["data" => $data,]);
        }
        public function create_page(){
            return view('competencyscores.add_competencyscore');
        }

        public function create(Request $requests) {
         
            $score_name =$requests['aajArr'];
            $score_value=$requests['abjArr'];                                                                
             foreach($score_name as $key=>$value) {
                $validator = Validator::make($requests->all(), [
                    'score_name'=>'score_name',
                    'score_value'=>'score_value',
                ]);
                if ($validator->fails()) {
                    return redirect('/add-competencyscore')
                        ->withInput()
                        ->withErrors($validator);
                }       
                competencyScore::create(['score_name'=>$score_name[$key],'score_value'=>$score_value[$key]]);           
                  }     
                 return redirect('/add-competencyscore')->with('success', 'Data saved succesfully');

            }

         public function edit(Request $request){
            $id=$request->id;
            $score_name=$request->score_name;
            $score_value=$request->score_value;
           // dd($request);
           competencyScore::where('id',$id)->update(['score_name'=>$score_name,'score_value'=>$score_value]);
            $row = competencyScore::where('id',$request->get('id'))->first();
            return "<td>".$row->id."</td>
            <td>".$row->score_name."</td>
            <td>".$row->score_value."</td>
            <td> <button type='button' class='btn btn-primary' data-toggle='modal' onclick='showDialog($row->id)'>Update</button></td>
            ";
         }
            
            public function delete($id){
                $del = competencyScore::findOrFail($id);
                $del->delete();
                return redirect('competencyscore')->with('success', 'Deleted successfully!');           
            }

}
