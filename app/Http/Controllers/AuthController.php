<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

// class AuthController extends Controller
// {
//     public function login(){
//         return view('Auth.login');
//     }

//     public function register(){
//         return view('Auth.verifikasi');
//     }

//     public function verifikasi(){
//         return view('Auth.verifikasi');
//     }

//     public function resetPassword(){
//         return view('Auth.resetPass');
//     }
// }


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi dan buat pengguna baru
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}