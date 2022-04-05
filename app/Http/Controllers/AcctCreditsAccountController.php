<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcctCreditsAccountRequest;
use App\Models\AcctCreditsAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\AcctCreditsAccountImport;
use Maatwebsite\Excel\Facades\Excel;

class AcctCreditsAccountController extends Controller
{

    public function setToken(){
        session()->put('credits_account_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('credits_account_token');
    }
    public function clearCreditsAgunanTemp(){
        session()->forget('credits_agunan');
    }
    public function index()
    {
        $this->setToken(); $this->clearCreditsAgunanTemp();   
        $acct_credits_account = AcctCreditsAccount::where('data_state', '0')->get();
        return view('creditsAccount.creditsAccount', 
        [
            'first_date'                => '',
            'last_date'                 => '',
            'credits_id'                => '',
            'branch_id'                 => '',
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

        $acct_credits_agunan_credits_account = session()->get('credits_agunan');
        
        $request->merge([
            'credits_account_token' => $this->getToken(),
            'data_state' => 0,
            'created_id' => auth()->id(),  
            'credits_account_due_date' => Date('Y-m-d', strtotime(request()->credits_account_due_date)),
            'credits_account_payment_amount' => str_replace(",", "", request()->credits_account_payment_amount),
            'credits_account_total_amount' => str_replace(",", "", request()->credits_account_total_amount),
            'credits_account_last_balance' => str_replace(",", "", request()->credits_account_last_balance),    
            'credits_account_interest_amount'   => str_replace(",", "", $request->credits_account_interest_amount),
            'credits_account_interest_last_balance'   => str_replace(",", "", $request->credits_account_interest_last_balance),
            'credits_account_accumulated_fines'   => str_replace(",", "", $request->credits_account_accumulated_fines),
        ]);
        if(AcctCreditsAccount::checkToken( $this->getToken())){
            return redirect('/credits-account')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        // dd(session()->get('credits_agunan'));
        $credits_account = AcctCreditsAccount::create($request->all()) ;
        // dd($credits_account->credits_account_id);
        if($acct_credits_agunan_credits_account){
            foreach($acct_credits_agunan_credits_account as $credits_agunan){
                $credits_agunan['credits_account_id'] = $credits_account->credits_account_id;
                AcctCreditsAccount::addCreditsAgunan( $credits_agunan );
            }
        }
       
        $credits_account ? $msg = 'Data Berhasil Ditambahkan !' : $msg = 'Data gagal Ditambahkan !';
        return redirect('/credits-account')->with('success', $msg);            
    }

    public function filterCreditsAccount(Request $request){
        $this->setToken(); $this->clearCreditsAgunanTemp();
        $acct_credits_account = AcctCreditsAccount::where('data_state', '0');
        
        if($request->first_date != ''){
            $acct_credits_account->where('credits_account_date', '>=', $request->first_date);
        }
        if($request->last_date != ''){
            $acct_credits_account->where('credits_account_date', '<=', $request->last_date);
        }
        if($request->credits_id != ''){
            $acct_credits_account->where('credits_id', $request->credits_id);
        }
         if($request->branch_id != ''){
            $acct_credits_account->where('branch_id', $request->branch_id);
        }
        
        return view('creditsAccount.creditsAccount', 
        [
            'first_date'                => $request->first_date,
            'last_date'                 => $request->last_date,
            'credits_id'                => $request->credits_id,
            'branch_id'                 => $request->branch_id,
            'acct_credits_account'      => $acct_credits_account->get(),
            'acct_credits_account_edit' => new AcctCreditsAccount,
            'core_province'             => AcctCreditsAccount::getAllProvince(),
            'core_business_officer'     => AcctCreditsAccount::getAllBusinessOfficer(),
            'core_branch'               => AcctCreditsAccount::getAllBranch(),
            'acct_source_fund'          => AcctCreditsAccount::getAllSourceFund(),
            'acct_credits'              => AcctCreditsAccount::getAllCredits(),
        ]);
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
            'data_state'                        => 0,
            'updated_id'                        => auth()->id(),
            'credits_account_due_date'          => Date('Y-m-d', strtotime($request->credits_account_due_date)),
            'credits_account_payment_amount'    => str_replace(",", "", $request->credits_account_payment_amount),
            'credits_account_total_amount'      => str_replace(",", "", $request->credits_account_total_amount),
            'credits_account_last_balance'      => str_replace(",", "", $request->credits_account_last_balance),
            'credits_account_interest_amount'   => str_replace(",", "", $request->credits_account_interest_amount),
            'credits_account_interest_last_balance'   => str_replace(",", "", $request->credits_account_interest_last_balance),
            'credits_account_accumulated_fines'   => str_replace(",", "", $request->credits_account_accumulated_fines),            
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

    public function processImportExcelCreditsAccount(Request $request ){
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file',$nama_file);
 
		// import data
		Excel::import(new AcctCreditsAccountImport, public_path('/file/'.$nama_file));
 
		// notifikasi dengan session
		session()->flash('success','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/credits-account');
    }
    
}
