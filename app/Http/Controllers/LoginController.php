<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index(){
        return view('login.login');
    }
    public function processLogin(Request $request){
        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (auth()->attempt(['email' => $request->username, 'password' => $request->password])) {
            if (auth()->user()->role_id == 'superadmin') {
                return redirect('/dashboard')->with('success', 'You are now logged in !');
            }
            return redirect('/masjid')->with('success', 'You are now logged in !');
        }

        throw ValidationException::withMessages([
            'email' => 'Your account credentials does not match our records. Please check your Email or Password !'
        ]);
    }
}
