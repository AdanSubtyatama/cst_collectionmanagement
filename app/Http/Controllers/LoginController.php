<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        if(User::where(['username' => $request->username, 'data_state'=> '0'])->first()){
            if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
                User::find(auth()->id())->update(['log_stat' => 'on']);
                return redirect('/')->with('success', 'You are now logged in !');
            }
        }
      
        return redirect('/login')->with('error', 'Your account has been deleted !');
        throw ValidationException::withMessages([
            'username' => 'Your account credentials does not match our records. Please check your Username or Password !'
        ]);
    }

}
