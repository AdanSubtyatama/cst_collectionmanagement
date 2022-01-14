<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        User::find(auth()->id())->update(['log_stat' => 'off']);
        Auth::logout();
        return redirect('/login')->with('success', 'Anda berhasil logout !');
    }
}
