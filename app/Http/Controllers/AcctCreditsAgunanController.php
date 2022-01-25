<?php

namespace App\Http\Controllers;

use App\Models\AcctCreditsAgunan;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AcctCreditsAgunanController extends Controller
{
    public function setToken(){
        session()->put('credits_agunan_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('credits_agunan_token');
    }

    public function index()
    {
        $this->setToken();
        $acct_credits_agunan = AcctCreditsAgunan::where('data_state', '0')->get();
        return view('agunan.agunan', ['acct_credits_agunan' => $acct_credits_agunan]);
    }
    // public function processUpdateStatus($credits_agunan_id){
    //     $credits_agunan               = AcctCreditsAgunan::findOrFail($credits_agunan_id);
    //     $credits_agunan->credits_token = $this->getToken();
    //     $credits_agunan->credits_agunan_type   = 1;
    //     if(AcctCreditsAgunan::checkToken($this->getToken())){
    //         return redirect('/agunan')->with('success', 'Data sudah dihapus Sebelumnya !');            
    //     };
    //     $credits_agunan->save() ? $msg = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

    //     return redirect('/agunan')->with('success',$msg);
    // }
}
