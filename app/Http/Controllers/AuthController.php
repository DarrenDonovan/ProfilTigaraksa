<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    function login(){ //sesuaikan nama function dengan yang dibuat pada route
        return view('admin.login');
    }

    function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            DB::table('user_log')->insert([
                'user_id' => Auth::id(),
                'email' => $credentials['email'],
                'action' => 'login',
                'time' => Carbon::now('Asia/Jakarta'),
            ]);
 
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Login Invalid',
        ])->onlyInput('email');
    
    }

    function logout(Request $request) {
        if(Auth::check()){
            DB::table('user_log')->insert([
                'user_id' => Auth::id(),
                'email' => Auth::user()->email,
                'action' => 'logout',
                'time' => Carbon::now('Asia/Jakarta'),
            ]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    
}
