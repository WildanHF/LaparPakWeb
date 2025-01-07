<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('Auth.login');
    }

    public function register(){
        return view('Auth.register');
    }

    public function verifikasi(){
        return view('Auth.verifikasi');
    }

    public function resetPassword(){
        return view('Auth.resetPass');
    }
}