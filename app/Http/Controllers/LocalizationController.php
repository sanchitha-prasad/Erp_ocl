<?php

namespace App\Http\Controllers;

use App;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    
     /**
     * @param $locale
     * @return RedirectResponse
     */
    public function index($locale)
    {
        if(array_key_exists($locale,Config::get('languages'))){
            Session::put('applocale',$locale);
        }
        
        return redirect()->back();
    }
}
