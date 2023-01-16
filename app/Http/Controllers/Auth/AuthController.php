<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
   public function dashboardLogin(Request $request)
   {
       $credentials = $request->validate([
           'email' => [ 'required', 'email' , 'max:255','exists:admins'],
           'password' => [ 'required', 'min:8'],
       ]);

       if( auth('admins')->attempt($credentials) )
       {
           return redirect('/dashboard');
       }

       throw ValidationException::withMessages(['password' => 'invalid password']);
   }

   public function webLogin(Request $request)
   {
       session()->put('prev_submitted_url','login');

       $credentials = $request->validate([
           'email' => [ 'required', 'email' , 'max:255','exists:users'],
           'password' => [ 'required', 'min:8'],
       ]);
//           return redirect('/');
       if (Auth::attempt($credentials))
           return redirect()->route('web.index');

       throw ValidationException::withMessages(['password' => 'invalid password']);
   }

    public function register()
    {
        session()->put('prev_submitted_url','register');

        $attributes = request()->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|max:255|email',
            'password' => 'required|min:6|max:255|confirmed',
            'password_confirmation' => 'required|min:6|max:255|same:password'
        ]);
//        unset($attributes['password_confirmation']);

        $user= User::create($attributes);
        auth('web')->login($user);
        return redirect('/');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('web.index');
    }

}
