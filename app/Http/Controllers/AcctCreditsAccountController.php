<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcctCreditsAccountRequest;
use App\Models\AcctCreditsAccount;

class AcctCreditsAccountController extends Controller
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
        $acct_credits_account = AcctCreditsAccount::where('data_state', '0')->get();
        return view('creditsAccount.creditsAccount', 
        [
        'acct_credits_account'      => $acct_credits_account,
        'acct_credits_account_edit' => new AcctCreditsAccount,
        'core_province'             => AcctCreditsAccount::getAllProvince(),
        'core_business_officer'     => AcctCreditsAccount::getAllBusinessOfficer(),
        'core_branch'               => AcctCreditsAccount::getAllBranch(),
        'acct_source_fund'          => AcctCreditsAccount::getAllSourceFund(),
        'acct_credits'              => AcctCreditsAccount::getAllCredits(),
        
        ]);
    }

    public function processAddCreditsAccount(AcctCreditsAccountRequest $request)
    {   
        $request->merge([
            'credits_account_token' => $this->getToken(),
            'data_state' => 0,
            'created_id' => auth()->id(),  
            'credits_account_due_date' => Date('Y-m-d', strtotime(request()->credits_account_due_date)),
            'credits_account_payment_amount' => str_replace(",", "", request()->credits_account_payment_amount),
            'credits_account_total_amount' => str_replace(",", "", request()->credits_account_total_amount),
            'credits_account_last_balance' => str_replace(",", "", request()->credits_account_last_balance),         
        ]);

        if(AcctCreditsAccount::checkToken( $this->getToken())){
            return redirect('/credits-account')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        AcctCreditsAccount::create($request->all()) ? $msg = 'Data Berhasil Ditambahkan !' : $msg = 'Data gagal Ditambahkan !';
        
        return redirect('/credits-account')->with('success', $msg);            
    }

    public function editCreditsAccount(AcctCreditsAccount $acct_credits_account_edit)
    {
        return view('creditsAccount.edit', 
        [
            'acct_credits_account_edit' => $acct_credits_account_edit,
            'core_province'             => AcctCreditsAccount::getAllProvince(),
            'core_business_officer'     => AcctCreditsAccount::getAllBusinessOfficer(),
            'core_branch'               => AcctCreditsAccount::getAllBranch(),
            'acct_source_fund'          => AcctCreditsAccount::getAllSourceFund(),
            'acct_credits'              => AcctCreditsAccount::getAllCredits(),
        ]);
    }


    public function processEditCreditsAccount(AcctCreditsAccountRequest $request, $credits_account_id)
    {
        $request->merge([
            'credits_account_token' => $this->getToken(),
            'data_state' => 0,
            'updated_id' => auth()->id(),
            'credits_account_due_date' => Date('Y-m-d', strtotime($request->credits_account_due_date)),
            'credits_account_payment_amount' => str_replace(",", "", $request->credits_account_payment_amount),
            'credits_account_total_amount' => str_replace(",", "", $request->credits_account_total_amount),
            'credits_account_last_balance' => str_replace(",", "", $request->credits_account_last_balance),
        ]);

        if(AcctCreditsAccount::checkToken( $this->getToken())){
            return redirect('/credits-account')->with('success', 'Data sudah diubah Sebelumnya !');            
        };
        AcctCreditsAccount::findOrFail($credits_account_id)->update($request->all()) ?
        $msg = 'Data berhasil Diubah !' :$msg = 'Data gagal diubah !';

        return redirect('/credits-account')->with('success', $msg); 
             
    }

    public function processDeleteCreditsAccount($credits_account_id)
    {
        $credits_account                        = AcctCreditsAccount::findOrFail($credits_account_id);
        $credits_account->credits_account_token = $this->getToken();
        $credits_account->data_state            = 1;
        $credits_account->deleted_id            = auth()->id();
        $credits_account->deleted_at            = date("Y-m-d H:i:s");
        if(AcctCreditsAccount::checkToken($this->getToken())){
            return redirect('/credits-account')->with('success', 'Data sudah dihapus Sebelumnya !');            
        };
        $credits_account->save() ? $msg = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

        return redirect('/credits-account')->with('success',$msg);
    }

    public function getCityfromProvince($province_id){
        return AcctCreditsAccount::getCityFromProvince($province_id);
    }

    public function getKecamatanfromProvince($city_id){
        return AcctCreditsAccount::getKecamatanFromCity($city_id);
    }
}