<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcctCreditsRequest;
use App\Models\AcctCredits;

class AcctCreditsController extends Controller
{

    public function setToken(){
        session()->put('credits_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('credits_token');
    }

    public function index()
    {
        $this->setToken();
        $acct_credits = AcctCredits::where('data_state', '0')->get();
        return view('credits.credits', ['acct_credits' => $acct_credits, 'acct_credits_edit' => new AcctCredits ]);
    }

    public function processAddCredits(AcctCreditsRequest $request)
    {   
        $request->merge([
            'credits_token' => $this->getToken(),
            'data_state' => 0,
            'created_id' => auth()->id(),
            'credits_fine' => '0',
        ]);
        if(AcctCredits::checkToken( $this->getToken())){
            return redirect('/credits')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        AcctCredits::create($request->all()) ? $msg = 'Data Berhasil Ditambahkan !' : $msg = 'Data gagal Ditambahkan !';
        
        return redirect('/credits')->with('success', $msg);            
    }

    public function editCredits(AcctCredits $acct_credits_edit)
    {
        return view('credits.edit', compact('acct_credits_edit'));
    }


    public function processEditCredits(AcctCreditsRequest $request, $credits_id)
    {
        $request->merge([
            'credits_token' => $this->getToken(),
            'data_state' => 0,
            'updated_id' => '1',
            
        ]);
        if(AcctCredits::checkToken( $this->getToken())){
            return redirect('/credits')->with('success', 'Data sudah diubah Sebelumnya !');            
        };
        AcctCredits::findOrFail($credits_id)->update($request->all()) ?
        $msg = 'Data berhasil Diubah !' :$msg = 'Data gagal diubah !';

        return redirect('/credits')->with('success', $msg); 
             
    }

    public function processDeleteCredits($credits_id)
    {
        $credits               = AcctCredits::findOrFail($credits_id);
        $credits->credits_token = $this->getToken();
        $credits->data_state   = 1;
        $credits->deleted_id   = auth()->id();
        $credits->deleted_at   = date("Y-m-d H:i:s");
        if(AcctCredits::checkToken($this->getToken())){
            return redirect('/credits')->with('success', 'Data sudah dihapus Sebelumnya !');            
        };
        $credits->save() ? $msg = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

        return redirect('/credits')->with('success',$msg);
    }
}
