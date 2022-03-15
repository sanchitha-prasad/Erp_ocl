<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\customerfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class CustomerController extends Controller
{
    public function AddCustomer(Request $req){
        try {
        $cus = new customer();
        $cus->cus_id = $req->cus_id;
        $cus->cus_name = $req->cus_name;
        $cus->prospect = $req->prospect ?? 0;
        $cus->active = $req->active ?? 0;
        $cus->ac_number = $req->ac_number;
        $cus->b_address = $req->b_address;
        $cus->city = $req->city;
        $cus->st = $req->st;
        $cus->zip = $req->zip;
        $cus->country = $req->country;
        $cus->sellsTax = $req->tax;
        $cus->c_type = $req->ctype;
        $cus->website = $req->web ?? 'null';
        $cus->co_name = $req->co_name;
        $cus->company = $req->company;
        $cus->job = $req->job;
        $cus->t1 = $req->t1;
        $cus->t2 = $req->t2 ?? 'null';
        $cus->fax = $req->fax ?? 'null';
        $cus->email = $req->email ?? 'null';
        $cus->gender = $req->gender ?? 'null';
        $cus->address = $req->address ?? 'nul';
        $cus->note = $req->note ?? 'null';
        $cus->default = $req->default ?? 0;
        $cus->save();
        $notify[] =['success', 'Customer Added Successfully.'];
        return back()->withNotify($notify);
    }
    catch (\Illuminate\Database\QueryException $e) {
        $notify[] = ['error', 'Customer Could not be added .'];
        return back()->withNotify($notify);
        // echo $e;
    
    }

    }
    
    public function UpdateCustomer(Request $req){
        try {
            
        $cus = customer::findOrFail($req->id);
        $cus->cus_id = $req->cus_id;
        $cus->cus_name = $req->cus_name;
       
        if($req->prospect == '0' || $req->prospect == 'on'){
            $st = 'on';
        }
        else{
            $st = '0';
        }
        if($req->active == '0' || $req->active == 'on'){
            $at = 'on';
        }
        else{
            $at = '0';
        }
        if($req->default == '0' || $req->default == 'on'){
            $df = 'on';
        }
        else{
            $df = '0';
        }
        $cus->prospect = $st;
        $cus->active = $at;
        $cus->ac_number = $req->ac_number;
        $cus->b_address = $req->b_address;
        $cus->city = $req->city;
        $cus->st = $req->st;
        $cus->zip = $req->zip;
        $cus->country = $req->country;
        $cus->sellsTax = $req->tax;
        $cus->c_type = $req->ctype;
        $cus->website = $req->web ?? 'null';
        $cus->co_name = $req->co_name;
        $cus->company = $req->company;
        $cus->job = $req->job;
        $cus->t1 = $req->t1;
        $cus->t2 = $req->t2 ?? 'null';
        $cus->fax = $req->fax ?? 'null';
        $cus->email = $req->email ?? 'null';
        $cus->gender = $req->gender ?? 'null';
        $cus->address = $req->address ?? 'nul';
        $cus->note = $req->note ?? 'null';
        $cus->default = $df;
        $cus->save();
        $notify[] =['success', 'Customer Update Successfully.'];
        return back()->withNotify($notify);
    }
    catch (\Illuminate\Database\QueryException $e) {
        $notify[] = ['error', 'Customer Could not be Update .'];
        return back()->withNotify($notify);
        // echo $e;
    
    }

    }

    public function RemoveCustomer($id){
        try {
            $cus = customer::where('id','=',$id)->delete();
            $notify[] =['success', 'Customer Deleted Successfully.'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Customer Could not be Deleted .'];
            return back()->withNotify($notify);
            // echo $e;
        
        
    }
}
public function uploadfile(Request $req){
    try {
        // dd($req);
    $image = $req->image;
    
     $img =array();
    for ($a =0;$a<count($image);$a++) {
        $vender = new customerfile();
        // echo $a;
        // print($files->extension());
        if($image[$a]->extension() == 'pdf'){
            $imageName = md5(rand(1000,10000)).'pdf.'.$image[$a]->extension();
        }
        else{
            $imageName = md5(rand(1000,10000)).'.'.$image[$a]->extension();
        }
        $image[$a]->move(public_path('upload/customer'), $imageName);
        $img[] =  $imageName;
        $vender->file =$imageName;
        $vender->customer_id = $req->vender_id;
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

public function filecustomer(Request $req){
    try {
        $vender = customerfile::where('customer_id','=',$req->id)->get();
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

public function Removecustomerfile(Request $req){
    try{
        $filename = public_path('upload/customer/'.$req->image);
        if(File::exists($filename)) {
            File::delete($filename);
            $vender = customerfile::where('id','=',$req->id)->delete();
            return response()->json(['data' => 'File Remove Successfully']);
            
        }else{
            $vender = customerfile::where('id','=',$req->id)->delete();
            return response()->json(['data' => 'File Remove Successfully']);
        }
    
}
catch (\Illuminate\Database\QueryException $e) {
 
    return response()->json(['data' => '0']);
}
}
}
