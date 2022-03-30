<?php

namespace App\Http\Controllers;

use App\Models\AcctCreditsAccount;
use App\Models\AcctCreditsAccountCollector;
use Illuminate\Http\Request;
use App\Models\CoreBusinessCollector;
use App\Models\PreferenceCollectibility;
use DateTime;
use PDF;

class CollectibiltyCreditsAccountController extends Controller
{

    public function setToken(){
        session()->put('credits_account_collector_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('credits_account_collector_token');
    }
    public function getCollectibilityFromCreditsAccount($acct_credits_account, $collectibility){
        $date 	= date('Y-m-d');
        $acct_credits_account = $acct_credits_account;
        $preferencecollectibility = PreferenceCollectibility::get();
        $acct_credits_account_view = $acct_credits_account;
        $acct_credits_account_temp = array();
        foreach($acct_credits_account_view as $row => $credits_account){
            $date1 = new DateTime($date);
            $date2 = new DateTime($credits_account['credits_account_payment_date']);
            $interval    = $date1->diff($date2);
            $tunggakan = $interval->format('%a');
            if($date2 >= $date1){
                $tunggakan2 = 0;
            }else{
                $tunggakan2 = $tunggakan;
            }

           
            foreach ($preferencecollectibility as $k => $v) {
                if($tunggakan2 >= $v['collectibility_bottom'] && $tunggakan2 <= $v['collectibility_top']){
                    $collectibility_name = $v['collectibility_name'];
                    $collectibility_id = $v['collectibility_id'];
                }
            }
            $acct_credits_account[$row]->collectibility_name = $collectibility_name;
            $acct_credits_account[$row]->collectibility_id = $collectibility_id;
            if($acct_credits_account[$row]->collectibility_id == $collectibility){
                $acct_credits_account_temp[$row] = $acct_credits_account[$row];
            }
        } 
        if($collectibility){
            $acct_credits_account = $acct_credits_account_temp;
        }
        return $acct_credits_account;
    }
    public function index()
    {
        $this->setToken(); 
        $acct_credits_account = AcctCreditsAccount::where('data_state', '0')->get();
        $acct_credits_account_view = $this->getCollectibilityFromCreditsAccount($acct_credits_account, '');
        return view('collectibiltyCreditsAccount.collectibiltyCreditsAccount', 
        [
            'first_date'                => '',
            'last_date'                 => '',
            'credits_id'                => '',
            'branch_id'                 => '',
            'business_collector_id'        => '',
            'business_officer_id'       => '',
            'collectibility_id'         => '',
            'acct_credits_account'      => $acct_credits_account_view,
            'core_branch'               => AcctCreditsAccount::getAllBranch(),
            'core_business_collector'   => AcctCreditsAccount::getAllBusinessCollector(),
            'core_business_officer'     => AcctCreditsAccount::getAllBusinessOfficer(),
            'preference_collectibility' => AcctCreditsAccount::getAllPreferenceCollectibility(),
            'acct_credits'              => AcctCreditsAccount::getAllCredits(),
        ]);
    }


    public function filterCollectibilityCreditsAccount(Request $request){
        $this->setToken();

        $acct_credits_account = AcctCreditsAccount::where('data_state', '0');
        
        if($request->first_date){
            $acct_credits_account->where('credits_account_date', '>=', $request->first_date);
        }
        if($request->last_date){
            $acct_credits_account->where('credits_account_date', '<=', $request->last_date);
        }
        if($request->credits_id){
            $acct_credits_account->where('credits_id', $request->credits_id);
        }
        if($request->branch_id){
            $acct_credits_account->where('branch_id', $request->branch_id);
        }
        if($request->business_collector_id){
            $acct_credits_account->where('business_collector_id', $request->business_collector_id);
        }
        if($request->business_officer_id){
            $acct_credits_account->where('business_officer_id', $request->business_officer_id);
        }
        if($request->collectibility){
            $acct_credits_account = $this->getCollectibilityFromCreditsAccount($acct_credits_account->get(), $request->collectibility);
        }

        return view('collectibiltyCreditsAccount.collectibiltyCreditsAccount', 
        [
            'first_date'                => $request->first_date,
            'last_date'                 => $request->last_date,
            'credits_id'                => $request->credits_id,
            'branch_id'                 => $request->branch_id,
            'business_collector_id'     => $request->business_collector,
            'business_officer_id'       => $request->business_officer_id,
            'collectibility_id'         => $request->collectibility,
            'acct_credits_account'      => $acct_credits_account,
            'acct_credits_account_edit' => new AcctCreditsAccount,
            'core_business_collector'   => AcctCreditsAccount::getAllBusinessCollector(),
            'core_business_officer'     => AcctCreditsAccount::getAllBusinessOfficer(),
            'preference_collectibility' => AcctCreditsAccount::getAllPreferenceCollectibility(),
            'core_branch'               => AcctCreditsAccount::getAllBranch(),
            'acct_credits'              => AcctCreditsAccount::getAllCredits(),
        ]);
    }

    public function editCollectibilityCreditsAccount(CoreBusinessCollector $acct_credits_account){
        
         return $acct_credits_account ? $acct_credits_account : 'null';
    }

    public function processCollectibilityCreditsAccount(Request $request){
        $request->validate([
            'credits_account_id'     => ['required'],
            'credits_account_name'   => ['required'],
            'business_collector_id'  => ['required'],
        ]);
        if(AcctCreditsAccountCollector::checkToken( $this->getToken())){
            return redirect('/account-collectibility')->with('success', 'Data sudah diubah Sebelumnya !');            
        };
        $request->credits_account_collector_id ? $credits_account_collector = AcctCreditsAccountCollector::findOrFail($request->credits_account_collector_id) : $credits_account_collector = new AcctCreditsAccountCollector();
        
        $credits_account_collector->credits_account_id                  = $request->credits_account_id;
        $credits_account_collector->business_collector_id               = $request->business_collector_id;
        $credits_account_collector->credits_account_collector_token     = $this->getToken();
       
        $credits_account_collector->save() ? $msg = 'Collector Berhasil Dipilih !' : $msg = 'Collector Gagal Dipilih !';

        return redirect('/account-collectibility')->with('success',$msg);
    }

    public function printLetterInforming($credits_account_collector_id){

        $acct_credits_account_collector = AcctCreditsAccountCollector::find($credits_account_collector_id);
        Pdf::SetPrintHeader(false);
		PDF::SetPrintFooter(false);
        PDF::SetMargins(20, 30, 20, 20); // put space of 10 on top
        PDF::SetFont('helvetica', '', 10);
        $html = '
        <table>
            <tr>
                <td width="20%">Surat Tugas Kepada </td>
                <td width="20%" style="text-align:right"> : '.$acct_credits_account_collector->businessCollector->business_collector_name.'</td>
            </tr>
        </table>
        
        ';
      
        PDF::SetTitle('Surat Tugas');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output('Surat Tugas.pdf');
    }
}
