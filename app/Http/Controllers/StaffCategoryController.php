<?php

namespace App\Http\Controllers;

use App\Models\staffCategory;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class StaffCategoryController extends Controller
{
   
    public function index()
    {
        $staffcategory = DB::table('staff_categories')->orderBy('id', 'asc')->get();
		return view('staffcategory.index', ["staffcategory" => $staffcategory]);
    }   

        public function create_page(){
            return view('staffcategory.add_staffcategory');
        }

        public function create(Request $requests) {              
            $staffcategory =$requests['adjArr'];		//return;
            foreach ($staffcategory as $key=>$value) {
                
                $validator = Validator::make($requests->all(), [
                    'staff_category'=>'unique:staff_category',
                ]);
                if ($validator->fails()) {
                    return redirect('/add-staffcategory')
                        ->withInput()
                        ->withErrors($validator);
                }	
                staffcategory::create(['staff_category'=>$value]); 
            }
            return redirect('/add-staffcategory')->with('success', 'Data saved succesfully');
        }

        public function edit(Request $request){
            $id=$request->id;
            $staff_category=$request->staff_category;
           // dd($request);
            staffCategory::where('id',$id)->update(['staff_category'=>$staff_category]);
            $row = staffCategory::where('id',$id)->first();
            return redirect('staffcategory')->with('success', "Staff Category $staff_category Updated succesfully!");
            // return "<td>".$row->id."</td>
            // <td>".$row->staff_category."</td>
            // <td> <button type='button' class='btn btn-success' data-toggle='modal' onclick='showDialog($row->id)'>Updated</button></td>
            // ";

        }
        public function delete($id){

            $del = staffcategory::findOrFail($id);
            $del->delete();
            return redirect('staffcategory')->with('success', 'Deleted successfully!');
                
        }
    

    
}
