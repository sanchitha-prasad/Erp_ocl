<?php

namespace App\Http\Controllers;
use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class DepartmentController extends Controller
{
    //add department
    public function AddDepartment(Request $req){
        try{
        $depertment = new department();
        
        $depertment->dep_name =$req->dep_name;
        $depertment->user =Auth::id();
        $depertment->save();
        $notify[] = ['success', 'Department Added Successfully.'];
       return back()->withNotify($notify);
    }
    catch (\Illuminate\Database\QueryException $e) {
       $notify[] = ['error', 'Department Could not be Added .'];
       return back()->withNotify($notify);
   }
    }
    public function UpdateDepartment(Request $req){
        try{
        $depertment = department::where('id','=',$req->dep_id)->update([
            'dep_name'=>$req->dep_name,
            'user'=>Auth::id()
        ]);
        
        $notify[] = ['success', 'Department Updated Successfully.'];
       return back()->withNotify($notify);
    }
    catch (\Illuminate\Database\QueryException $e) {
       $notify[] = ['error', 'Department Could not be Updated .'];
       return back()->withNotify($notify);
   
   }
    }

    public function RemoveDepartment(Request $req){
        try{
        $depertment = department::where('id','=',$req->dep_id)->delete();
        
        $notify[] = ['success', 'Department Remove Successfully.'];
       return back()->withNotify($notify);
    }
    catch (\Illuminate\Database\QueryException $e) {
       $notify[] = ['error', 'Department Could not be Remove .'];
       return back()->withNotify($notify);
   
   }
    }

    
}
