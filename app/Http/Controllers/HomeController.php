<?php

namespace App\Http\Controllers;

use App\Models\vender;
use App\Models\customer;
use App\Models\employee;
use App\Models\supplier;
use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function department()
    {
        $ladtid =DB::table('departments')->latest()->first();
        if($ladtid == '' || $ladtid == null){
            $last = '0';
           
        }
        else{
            $last =  $ladtid->id;
        }
        $data = department::all();
      
       
        return view('pages.department',['lastid' => $last,'datas'=>$data]);
    }
    public function employee()
    {
        $ladtid =DB::table('employees')->latest()->first();
        if($ladtid == '' || $ladtid == null){
            $last = '0';
           
        }
        else{
            $last =  $ladtid->id;
        }
        $data = employee::all();
        return view('pages.employee',['lastid' => $last,'datas'=>$data]);
    }
    public function user()
    {
        $employe = employee::all();
        $data =User::join('employees','users.emp_id', '=', 'employees.id')
            ->orderBy('users.id','asc')
            -> get(['users.*','employees.profile','employees.emp_name','employees.emp_email','employees.emp_nic','employees.emp_address']);
        return view('pages.user',['employees'=> $employe,'datas'=>$data]);
    }
    public function customer()
    {
        $ladtid =DB::table('customers')->latest()->first();
        if($ladtid == '' || $ladtid == null){
            $last = '0';
           
        }
        else{
            $last =  $ladtid->id;
        }
        $data = customer::all();
        return view('pages.customer',['last_id'=>$last,'datas' =>$data]);
    }
    public function supplier()
    {
        $ladtid =DB::table('suppliers')->latest()->first();
        if($ladtid == '' || $ladtid == null){
            $last = '0';
           
        }
        else{
            $last =  $ladtid->id;
        }
        $data = supplier::all();
        return view('pages.supplier',['lastid' => $last,'datas'=>$data]);
    }
    public function deliver()
    {
        return view('pages.deliver');
    }

    public function profile(){
        $profile = User::find(Auth::id());
        return view('profile.profile',['users' => $profile]);
    }

    public function vender(){
        $ladtid =DB::table('venders')->latest()->first();
        if($ladtid == '' || $ladtid == null){
            $last = '0';
           
        }
        else{
            $last =  $ladtid->id;
        }
        
        $data = vender::all();
        // $profile = User::find(Auth::id());
        return view('pages.vendor',['lastid' => $last,'datas'=>$data]);
    }

}
