<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class usercontroller extends Controller
{
    //
    public function AddUser(Request $req){
        try {
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->role = $req->role;
        $user->emp_id = $req->emp_id;
        $user->save();
        $user->assignRole($req->role);
        $notify[] =['success', 'User Added Successfully.'];
        return back()->withNotify($notify);

}
    catch (\Illuminate\Database\QueryException $e) {
        $notify[] = ['error', 'User Could not be added .'];
        return back()->withNotify($notify);
        // echo $e;
    
    }
    }

    public function UpdateUser(Request $req){
        try {
        $user = User::findOrFail($req->id);
        $user->name = $req->name;
       if($req->password == ''){

       }
       else{
        $user->password = Hash::make($req->password);
       }
        
        $user->role = $req->role;
        $user->save();
        $notify[] =['success', 'User Added Successfully.'];
        return back()->withNotify($notify);

}
    catch (\Illuminate\Database\QueryException $e) {
        $notify[] = ['error', 'User Could not be added .'];
        return back()->withNotify($notify);
        // echo $e;
    
    }
    }

    public function RemoveUser(Request $req){
        try{
            
                $user = User::where('id','=',$req->id)->delete();
                
                $notify[] = ['success', 'User Remove Successfully.'];
                return back()->withNotify($notify);
            
        
    }
    catch (\Illuminate\Database\QueryException $e) {
       $notify[] = ['error', 'User Could not be Remove .'];
       return back()->withNotify($notify);
   
   }
    }
}
