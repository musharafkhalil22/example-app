<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    public function create(){
      return  view('auth.register');

     
    }

    public function store()
    {
       $attribute = request()->validate([
        'name' => ['required', 'string', 'max:255'],
        'phone' => ['required'],
        'address' => ['required'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
       ]);

       $user = User::create($attribute);
       
        Auth::login('$user');

        return redirect('/');
    }
}
