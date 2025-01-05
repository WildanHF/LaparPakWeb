<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('Auth.login');
    }

    public function register(){
        return view('Auth.verifikasi');
    }

    public function verifikasi(){
        return view('Auth.verifikasi');
    }

    public function resetPassword(){
        return view('Auth.resetPass');
    }
}
