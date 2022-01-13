<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index(){
        return view('login.login');
    }
    public function processLogin(Request $request){
        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/')->with('success', 'You are now logged in !');
        }

        throw ValidationException::withMessages([
            'username' => 'Your account credentials does not match our records. Please check your Username or Password !'
        ]);
    }

}
