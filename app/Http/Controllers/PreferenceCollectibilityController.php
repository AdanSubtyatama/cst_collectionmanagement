<?php

namespace App\Http\Controllers;

use App\Models\PreferenceCollectibility;
use Illuminate\Http\Request;


class PreferenceCollectibilityController extends Controller
{

    public function setToken(){
        session()->put('credits_account_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('credits_account_token');
    }
    public function index()
    {
        $this->setToken(); 
        $preference_collectibility = PreferenceCollectibility::get();
        return view('preferenceCollectibility.preferenceCollectibility', 
        [
            'preference_collectibility'      => $preference_collectibility,
        ]);
    }

    public function updateKonfigurasiKolektibilitas(Request $request){
        $request->validate([
                'collectibility_id'         => ['required'],
                'collectibility_bottom'     => ['required'],
                'collectibility_top'        => ['required'],
                'collectibility_ppap'       => ['required'],
        ]);

        $jenis_konfigurasi = $request->collectibility_id;
        foreach($jenis_konfigurasi as $row => $key){
            $collectibility = PreferenceCollectibility::find($request->collectibility_id[$row]);
            $collectibility->collectibility_bottom = $request->collectibility_bottom[$row];
            $collectibility->collectibility_top = $request->collectibility_top[$row];
            $collectibility->collectibility_ppap = $request->collectibility_ppap[$row];
            $collectibility->save();
        }

        return redirect('/configuration-collectibility')->with('success', 'Kolektibilitas Telah Dikonffirmasi'); 
    }
   
}
