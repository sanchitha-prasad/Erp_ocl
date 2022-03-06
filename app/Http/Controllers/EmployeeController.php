<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\employeefile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    //
    public function AddEmploye(Request $req){
        try{
            
        $emp = new employee();
        $emp->emp_name =$req->emp_name;
        $emp->emp_email =$req->emp_email;
        $emp->emp_nic =$req->emp_nic;
        $emp->emp_address =$req->emp_address;
        $emp->user =Auth::id();
        if($req->image == ''){
            $imageName = 'null';
        }
        else{
            $imageName = time().'.'.$req->image->extension();
            $req->image->move(public_path('upload'), $imageName);
        }
        
        $emp->profile = $imageName;
        $emp->save();
        $notify[] = ['success', 'Employee Added Successfully.'];
       return back()->withNotify($notify);
    }
    catch (\Illuminate\Database\QueryException $e) {
      
       $notify[] = ['error', 'Employee Could not be Added .'];
       return back()->withNotify($notify);
   }
    }

    public function UpdateEmployee(Request $req){
        try{
        if($req->image == "" || $req->image == null){
            $profile = $req->get_img;
        }
        else{
            $profile = time().'.'.$req->image->extension();
            $req->image->move(public_path('upload'), $profile);
            $filename = public_path('upload/'.$req->get_img);

            if(File::exists($filename)) {
                File::delete($filename);
            }
        }
        $depertment = employee::where('id','=',$req->emp_id)->update([
            'profile'=>$profile,
            'emp_name'=>$req->emp_name,
            'emp_email'=>$req->emp_email,
            'emp_address'=>$req->emp_address,
            'emp_nic'=>$req->emp_nic,
            'user'=>Auth::id()
        ]);
        
        
        $notify[] = ['success', 'Employee Updated Successfully.'];
       return back()->withNotify($notify);
    }
    catch (\Illuminate\Database\QueryException $e) {
    //    $notify[] = ['error', 'Employee Could not be Updated .'];
    //    return back()->withNotify($notify);
    echo $e;
   
   }
    }

    public function RemoveEmployee(Request $req){
        try{
            $filename = public_path('upload/'.$req->get_img);
            if(File::exists($filename)) {
                File::delete($filename);
                $depertment = employee::where('id','=',$req->emp_id)->delete();
                
                $notify[] = ['success', 'Employee Remove Successfully.'];
                return back()->withNotify($notify);
            }else{
                $depertment = employee::where('id','=',$req->emp_id)->delete();
                $notify[] = ['success', 'Employee Remove Successfully.'];
                return back()->withNotify($notify);
            }
        
    }
    catch (\Illuminate\Database\QueryException $e) {
       $notify[] = ['error', 'Employee Could not be Remove .'];
       return back()->withNotify($notify);
   
   }
    }

    public function alreadyimageRemove(){

    }
    public function uploadfile(Request $req){
        try {
            // dd($req);
        $image = $req->image;
        
         $img =array();
        for ($a =0;$a<count($image);$a++) {
            $vender = new employeefile();
            // echo $a;
            // print($files->extension());
            if($image[$a]->extension() == 'pdf'){
                $imageName = md5(rand(1000,10000)).'pdf.'.$image[$a]->extension();
            }
            else{
                $imageName = md5(rand(1000,10000)).'.'.$image[$a]->extension();
            }
            $image[$a]->move(public_path('upload/employee'), $imageName);
            $img[] =  $imageName;
            $vender->file =$imageName;
            $vender->emp_id = $req->vender_id;
            $vender->save();
            }
        
           
            $notify[] =['success', 'File Added Successfully.'];
            return back()->withNotify($notify);
        
    }
        catch (\Illuminate\Database\QueryException $e) {
            // $notify[] = ['error', 'File Could not be Added .'];
            // return back()->withNotify($notify);
            echo $e;
        
        
    }
    
    }
    
    public function fileemployee(Request $req){
        try {
            $vender = employeefile::where('emp_id','=',$req->id)->get();
            if($vender->isEmpty()){
                return response()->json(['data' => 'no data']);
            }
            else{
                return response()->json(['data' => $vender]);
            }
            
        
    }
        catch (\Illuminate\Database\QueryException $e) {
            
            return response()->json(['data' => 'no data']);
        
    }
    
    }
    
    public function Removeemployeefile(Request $req){
        try{
            $filename = public_path('upload/employee/'.$req->image);
            if(File::exists($filename)) {
                File::delete($filename);
                $vender = employeefile::where('id','=',$req->id)->delete();
                return response()->json(['data' => 'File Remove Successfully']);
                
            }else{
                $vender = employeefile::where('id','=',$req->id)->delete();
                return response()->json(['data' => 'File Remove Successfully']);
            }
        
    }
    catch (\Illuminate\Database\QueryException $e) {
     
        return response()->json(['data' => '0']);
    }
    }
    
}
