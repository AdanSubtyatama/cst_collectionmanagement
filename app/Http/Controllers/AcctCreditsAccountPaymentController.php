<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcctCreditsAccountPaymentRequest;
use App\Models\AcctCreditsAccountPayment;

use App\Models\PreferenceCollectibility;
use DateTime;
use Illuminate\Http\Request;

class AcctCreditsAccountPaymentController extends Controller
{

    public function setToken(){
        session()->put('credits_payment_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('credits_payment_token');
    }
  
    public function index()
    {
        $this->setToken(); 
        
        $acct_credits_account_payment = AcctCreditsAccountPayment::where('data_state', '0')->get();
        return view('creditsAccountPayment.creditsAccountPayment', 
        [
            'first_date'                             => '',
            'last_date'                              => '',
            'branch_id'                              => '',
            'acct_credits_account_payment'           => $acct_credits_account_payment,
            'credits_account_payment_edit'           => new AcctCreditsAccountPayment,
            'core_branch'                            => AcctCreditsAccountPayment::getAllBranch(),
            'acct_credits_account'                   => AcctCreditsAccountPayment::getAllCreditsAccount(),
        ]);

    }
    
    public function filterCreditsAccountPayment(Request $request){
        $this->setToken();
        $credits_account_payment = new AcctCreditsAccountPayment;

        if($request->first_date){
            $credits_account_payment->where('credits_payment_date', '>=', $request->first_date);
        }
        if($request->last_date){
            $credits_account_payment->where('credits_payment_date', '<=', $request->last_date);
        }
       
        if($request->branch_id){
            $credits_account_payment->where('branch_id', $request->branch_id);
        }
        return view('creditsAccountPayment.creditsAccountPayment', 
        [
            'first_date'                        => $request->first_date,
            'last_date'                         => $request->last_date,
            'branch_id'                         => $request->branch_id,
            'acct_credits_account_payment'      => $credits_account_payment->get(),
            'credits_account_payment_edit'      => new AcctCreditsAccountPayment,
            'core_branch'                       => AcctCreditsAccountPayment::getAllBranch(),
            'acct_credits_account'              => AcctCreditsAccountPayment::getAllCreditsAccount(),

        ]);
    }
    public function addCreditsAccountPayment()
    {
        $this->setToken(); 
        
        $acct_credits_account_payment = AcctCreditsAccountPayment::where('data_state', '0')->get();
        return view('creditsAccountPayment.add', 
        [
            'acct_credits_account_payment'           => $acct_credits_account_payment,
            'credits_account_payment_edit'           => new AcctCreditsAccountPayment,
            'core_branch'                            => AcctCreditsAccountPayment::getAllBranch(),
            'acct_credits_account'                   => AcctCreditsAccountPayment::getAllCreditsAccount(),
        ]);

    }
    public function processAddCreditsAccountPayment(AcctCreditsAccountPaymentRequest $request)
    {   
        $request->merge([
            'credits_payment_date'  => Date("Y-m-d"),
            'credits_payment_token' => $this->getToken(),
            'created_id'            => auth()->id(),
            'created_on'            => Date("Y-m-d"),
        ]);

        if(AcctCreditsAccountPayment::checkToken($this->getToken())){
            return redirect('/credits-account-payment')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        AcctCreditsAccountPayment::create($request->all()) ? $msg = 'Data Berhasil Ditambahkan !' : $msg = 'Data gagal Ditambahkan !';
        
        return redirect('/credits-account-payment')->with('success', $msg);            
    }

    public function editCreditsAccountPayment(AcctCreditsAccountPayment $credits_payment_edit)
    {
        $acct_business_collector_report = AcctCreditsAccountPayment::where('data_state', '0')->get();
        return view('creditsAccountPayment.edit',  [
            'first_date'                             => '',
            'last_date'                              => '',
            'core_business_collector_report'         => $acct_business_collector_report,
            'acct_credits_account_collector'         => AcctCreditsAccountPayment::getCreditsAccountCollector(),
            'business_collector_report_edit'         => $credits_payment_edit,
            'core_branch'                            => AcctCreditsAccountPayment::getAllBranch(),
            'acct_credits_account'                   => AcctCreditsAccountPayment::getAllCreditsAccount(),
        ]);
    }


    public function processCreditsAccountPayment(AcctCreditsAccountPaymentRequest $request, $credits_payment_id)
    {
        $request->merge([
            'credits_payment_date'  => Date("Y-m-d"),
            'credits_payment_token' => $this->getToken(),
            'created_id'            => auth()->id(),
            'created_on'            => Date("Y-m-d"),
        ]);

        if(AcctCreditsAccountPayment::checkToken( $this->getToken())){
            return redirect('/credits-account-payment')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        
        AcctCreditsAccountPayment::find($credits_payment_id)->update($request->all()) ?
        $msg = 'Data berhasil Diubah !' :$msg = 'Data gagal diubah !';
        return redirect('/credits-account-payment')->with('success', $msg); 
             
    }

    public function processDeleteCollectorReport($credits_payment_id)
    {
        $credits_payment                                   = AcctCreditsAccountPayment::findOrFail($credits_payment_id);
        $credits_payment->credits_payment_report_token      = $this->getToken();
        $credits_payment->data_state                       = 1;
        $credits_payment->deleted_id                       = auth()->id();
        $credits_payment->deleted_at                       = date("Y-m-d H:i:s");
        $credits_payment->save() ? $msg                    = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

        return redirect('/credits-account-payment')->with('success',$msg);
    }
   
}
