<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class suppliercontroller extends Controller
{
    //
    public function AddSupplier(Request $req){
        try {
            
            $supplier = new supplier();
          
            $supplier->b_name = $req->bname;
            $supplier->b_address = $req->baddress;
            $supplier->bt_Number = $req->bt;
            $supplier->br_Number = $req->br;
            $supplier->p_name = $req->pname;
            $supplier->r_address = $req->raddress;
            $supplier->n_f_y_business = $req->noyb;
            $supplier->nic = $req->nic;
            $supplier->bank = $req->bank;
            $supplier->branch = $req->branch;
            $supplier->a_c_number = $req->acnumber;
            $supplier->signature1 = $req->sig1;
            $supplier->signature2 = $req->sig2;
            $supplier->user = Auth::id();
            $supplier->save();
            $notify[] =['success', 'Supplier Added Successfully.'];
                return back()->withNotify($notify);

        }
            catch (\Illuminate\Database\QueryException $e) {
                $notify[] = ['error', 'Supplier Could not be added .'];
                // return back()->withNotify($notify);
                echo $e;
            
            }
        }

        public function UpdateSupplier(Request $req){
            try {
                
               $update = supplier::where('id','=',$req->sup_id)->update([
                   'b_name'=>$req->bname,
                   'b_address' =>$req->baddress,
                   'bt_Number' => $req->bt,
                   'br_Number' =>$req->br,
                   'p_name'=>$req->pname,
                   'r_address' =>$req->raddress,
                   'n_f_y_business'=>$req->noyb,
                   'nic'=>$req->nic,
                   'bank' =>$req->bank,
                   'branch' =>$req->branch,
                   'a_c_number' =>$req->acnumber,
                   'signature1'=> $req->sig1,
                   'signature2' => $req->sig2,
                   'user'=>Auth::id()
               ]);
                $notify[] =['success', 'Supplier Updated Successfully.'];
                    return back()->withNotify($notify);
    
            }
                catch (\Illuminate\Database\QueryException $e) {
                    $notify[] = ['error', 'Supplier Could not be Updated .'];
                    // return back()->withNotify($notify);
                    echo $e;
                
                }
            }

            public function RemoveSupplier(Request $req){
                try{
                    
                        $supplier = supplier::where('id','=',$req->id)->delete();
                        $notify[] = ['success', 'Supplier Remove Successfully.'];
                        return back()->withNotify($notify);
                    
                
            }
            catch (\Illuminate\Database\QueryException $e) {
               $notify[] = ['error', 'Supplier Could not be Remove .'];
               return back()->withNotify($notify);
           
           }
        }
    
}
