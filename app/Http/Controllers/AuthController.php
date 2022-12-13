<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public function register(Request $request){
        if($request->method() == "GET") return view('page.auth.register');

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:12'],
        ]);

        User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email
        ]);
        return redirect()->route('login');
    }
    public function login(Request $request){
        if($request->method() == "GET") return view('page.auth.login');
        
        $auth = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if(Auth::attempt($auth)){
            $request->session()->regenerate();
            $request->session()->put('logged', true);
            return redirect()->intended('/');
        }

        return back()->withErrors(['message', 'Email & password fails'])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        session()->invalidate();
        return redirect()->route('home');
    }
}