<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;


class LoginUserController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){
        $attribute = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($attribute)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, credentials do not match.'
            ]);
        }
        
        
        request()->session()->regenerate();
        
        if(Auth::check() && (Auth::User()->usertype == 1)){
            return redirect('dashboard');
        }
        else{
            return redirect('show_product');
        }
        

        
    }

    public function destroy(){
        Auth::guard('web')->logout();
        request()->session()->invalidate();
       request()->session()->regenerateToken();

       return redirect('/');
    }
}
