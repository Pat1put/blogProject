<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

class AuthController extends Controller
{
    public function showLogin(Request $request){
        return view('content.login');
    }

    public function Logout(Request $request){
         Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return view('content.login');
    }

    public  function checkLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->intended('/content');
        }

        return back()->withErrors([
            'email' => "Credentials do not match our records"
        ]);
    }
}