<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    //

    public function loginView(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|string|min:3',
        ]);
        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
        if(Auth::guard('admin')->attempt($credentials, $request->get('remember_me'))){
            return redirect()->route('home')->with('success', 'Login Successfully');
        }else{
            return redirect()->back()->with('error', 'Login Failed check the credentials');
        }
    }

    public function logout(Request $request){
        Auth('admin')->logout();
        return redirect()->route('login.view');
    }

    public function registerView(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:3',
            'password_confirmation'=>'required|same:password',
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'user_type' => 'user',
        ]);

        return redirect()->route('login.view')->with('success', 'register Successfully');
    }


}
