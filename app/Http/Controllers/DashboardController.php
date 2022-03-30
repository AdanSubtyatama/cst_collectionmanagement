<?php

namespace App\Http\Controllers;

use App\Models\AcctCreditsAccount;
use App\Models\PreferenceCollectibility;
use DateTime;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $acct_credits_account           = AcctCreditsAccount::where('data_state', '0');
        $collectibility_lancar          = $this->getCollectibilityFromCreditsAccount($acct_credits_account->get(), 1);
        $collectibility_kuranglancar    = $this->getCollectibilityFromCreditsAccount($acct_credits_account->get(), 2);
        $collectibility_diragukan       = $this->getCollectibilityFromCreditsAccount($acct_credits_account->get(), 3);
        $collectibility_sangatdiragukan = $this->getCollectibilityFromCreditsAccount($acct_credits_account->get(), 4);
        $collectibility_macet           = $this->getCollectibilityFromCreditsAccount($acct_credits_account->get(), 5);

        return view('dashboard.dashboard', compact('collectibility_lancar', 'collectibility_kuranglancar', 'collectibility_diragukan', 'collectibility_sangatdiragukan', 'collectibility_macet'));
    }

    public function getCollectibilityFromCreditsAccount($acct_credits_account, $collectibility){
        $date 	= date('Y-m-d');
        $acct_credits_account = $acct_credits_account;
        $preferencecollectibility = PreferenceCollectibility::get();
        $acct_credits_account_view = $acct_credits_account;
        $count=0;
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
                    $collectibility_id = $v['collectibility_id'];
                }
            }
            $acct_credits_account[$row]->collectibility_id = $collectibility_id;
            if($acct_credits_account[$row]->collectibility_id == $collectibility){
                $count ++;
            }
        }
        return $count;
    }
}
