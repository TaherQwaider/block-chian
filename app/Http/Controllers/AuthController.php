<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
