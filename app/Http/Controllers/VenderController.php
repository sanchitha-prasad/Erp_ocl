<?php

namespace App\Http\Controllers;

use App\Models\vender;
use App\Models\venderfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class VenderController extends Controller
{

    public function Addvender(Request $req){
        try {
        $cus = new vender();
        $cus->v_id = $req->v_id;
        $cus->v_name = $req->name;
        $cus->active = $req->active ?? 0;
        $cus->ac_number = $req->ac_number;
        $cus->m_address = $req->maddress;
        $cus->city = $req->city;
        $cus->st = $req->st;
        $cus->zip = $req->zip;
        $cus->country = $req->country;
        $cus->v_type = $req->vtype;
        $cus->onet = $req->onet ?? 'null';
        $cus->e_account = $req->Eaccount;
        $cus->contact = $req->contact;
        $cus->website = $req->web ?? 'null';
        $cus->t1 = $req->t1;
        $cus->t2 = $req->t2 ?? 'null';
        $cus->fax = $req->fax ?? 'null';
        $cus->email = $req->email ?? 'null';
     
        $cus->save();
        $notify[] =['success', 'Vender Added Successfully.'];
        return back()->withNotify($notify);
    }
    catch (\Illuminate\Database\QueryException $e) {
        // $notify[] = ['error', 'Vender Could not be added .'];
        // return back()->withNotify($notify);
        echo $e;
    
    }

    }
    
    public function Updatevender(Request $req){
        try {
            
        $cus = vender::findOrFail($req->id);
        
       
       
        if($req->active == '0' || $req->active == 'on'){
            $at = 'on';
        }
        else{
            $at = '0';
        }
       
       
        $cus->active = $at;
        $cus->v_id = $req->v_id;
        $cus->v_name = $req->name;
        $cus->active = $at;
        $cus->ac_number = $req->ac_number;
        $cus->m_address = $req->maddress;
        $cus->city = $req->city;
        $cus->st = $req->st;
        $cus->zip = $req->zip;
        $cus->country = $req->country;
        $cus->v_type = $req->vtype;
        $cus->onet = $req->onet ;
        $cus->e_account = $req->Eaccount;
        $cus->contact = $req->contact;
        $cus->website = $req->web ;
        $cus->t1 = $req->t1;
        $cus->t2 = $req->t2 ;
        $cus->fax = $req->fax ;
        $cus->email = $req->email ;
        $cus->save();
        $notify[] =['success', 'Vender Update Successfully.'];
        return back()->withNotify($notify);
    }
    catch (\Illuminate\Database\QueryException $e) {
        $notify[] = ['error', 'Vender Could not be Update .'];
        return back()->withNotify($notify);
        // echo $e;
    
    }

    }

    public function Removevender($id){
        try {
            $cus = vender::where('id','=',$id)->delete();
            $notify[] =['success', 'Vender Deleted Successfully.'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Vender Could not be Deleted .'];
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
        $vender = new venderfile();
        // echo $a;
        // print($files->extension());
        if($image[$a]->extension() == 'pdf'){
            $imageName = md5(rand(1000,10000)).'pdf.'.$image[$a]->extension();
        }
        else{
            $imageName = md5(rand(1000,10000)).'.'.$image[$a]->extension();
        }
        $image[$a]->move(public_path('upload/vender'), $imageName);
        $img[] =  $imageName;
        $vender->file =$imageName;
        $vender->vender_id = $req->vender_id;
        $vender->save();
        }
    
       
        $notify[] =['success', 'Vender Added Successfully.'];
        return back()->withNotify($notify);
    
}
    catch (\Illuminate\Database\QueryException $e) {
        $notify[] = ['error', 'Vender Could not be Added .'];
        return back()->withNotify($notify);
        // echo $e;
    
    
}

}

public function filevender(Request $req){
    try {
        $vender = venderfile::where('vender_id','=',$req->id)->get();
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

public function Removevendefile(Request $req){
    try{
        $filename = public_path('upload/vender/'.$req->image);
        if(File::exists($filename)) {
            File::delete($filename);
            $vender = venderfile::where('id','=',$req->id)->delete();
            return response()->json(['data' => 'File Remove Successfully']);
            
        }else{
            $vender = venderfile::where('id','=',$req->id)->delete();
            return response()->json(['data' => 'File Remove Successfully']);
        }
    
}
catch (\Illuminate\Database\QueryException $e) {
 
    return response()->json(['data' => '0']);
}
}

}
