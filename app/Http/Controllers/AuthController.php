<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $loginDetails = $request->only('email','password');

        if(Auth::attempt($loginDetails))
            {
                return redirect('/dashboard');
            } else {
                
                // return response()->json(['message'=>'wrong login details']);
                return redirect('/login')->with('notifikasi_gagal','Email atau Password salah!');
            } 

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
