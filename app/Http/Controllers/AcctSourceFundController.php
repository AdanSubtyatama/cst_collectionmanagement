<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcctSourceFundRequest;
use App\Models\AcctSourceFund;

class AcctSourceFundController extends Controller
{

    public function setToken(){
        session()->put('source_fund_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('source_fund_token');
    }

    public function index()
    {
        $this->setToken();
        $acct_source_fund = AcctSourceFund::where('data_state', '0')->get();
        return view('sourceFund.sourceFund', ['acct_source_fund' => $acct_source_fund, 'acct_source_fund_edit' => new AcctSourceFund ]);
    }

    public function processAddSourceFund(AcctSourceFundRequest $request)
    {   
        $request->merge([
            'source_fund_token' => $this->getToken(),
            'data_state' => 0,
            'created_id' => auth()->id(),
        ]);
        if(AcctSourceFund::checkToken( $this->getToken())){
            return redirect('/source-fund')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        AcctSourceFund::create($request->all()) ? $msg = 'Data Berhasil Ditambahkan !' : $msg = 'Data gagal Ditambahkan !';
        
        return redirect('/source-fund')->with('success', $msg);            
    }

    public function editSourceFund(AcctSourceFund $acct_source_fund_edit)
    {
        return view('sourceFund.edit', compact('acct_source_fund_edit'));
    }


    public function processEditSourceFund(AcctSourceFundRequest $request, $source_fund_id)
    {
        $request->merge([
            'source_fund_token' => $this->getToken(),
            'updated_id' => auth()->id(),
            
        ]);
        if(AcctSourceFund::checkToken( $this->getToken())){
            return redirect('/source-fund')->with('success', 'Data sudah diubah Sebelumnya !');            
        };
        AcctSourceFund::findOrFail($source_fund_id)->update($request->all()) ?
        $msg = 'Data berhasil Diubah !' :$msg = 'Data gagal diubah !';

        return redirect('/source-fund')->with('success', $msg); 
             
    }

    public function processDeleteSourceFund($source_fund_id)
    {
        $source_fund               = AcctSourceFund::findOrFail($source_fund_id);
        $source_fund->source_fund_token = $this->getToken();
        $source_fund->data_state   = 1;
        $source_fund->deleted_id   = auth()->id();
        $source_fund->deleted_at   = date("Y-m-d H:i:s");
        if(AcctSourceFund::checkToken($this->getToken())){
            return redirect('/source-fund')->with('success', 'Data sudah dihapus Sebelumnya !');            
        };
        $source_fund->save() ? $msg = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

        return redirect('/source-fund')->with('success',$msg);
    }
}
