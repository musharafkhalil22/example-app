<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        if(Auth::check() && (Auth::User()->usertype == 1)){
            return view('admin.dashboard');
        }
        else{

            return redirect('login');
            
         }
        
    }
}
