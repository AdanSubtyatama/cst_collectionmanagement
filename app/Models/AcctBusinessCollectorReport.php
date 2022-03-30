<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcctBusinessCollectorReport extends Model
{
    protected $table = 'acct_business_collector_report';
    protected $primaryKey   = 'business_collector_report_id';
    
    protected $guarded = [
        'business_collector_report_id',
        'created_at',
        'updated_at',
    ];
    use HasFactory;

    public function checkToken($token){
        return AcctBusinessCollectorReport::where('business_collector_report_token',  $token)->first() ? true : false;
    }

    public function creditsAccountCollector(){
        return $this->belongsTo(AcctCreditsAccountCollector::class, 'credits_account_collector_id');
    }
    public function branch(){
        return $this->belongsTo(CoreBranch::class, 'branch_id');
    }
    public function getAllBusinessCollector(){
        return CoreBusinessCollector::get();
    }
    public function getCreditsAccountCollector(){
        return AcctCreditsAccountCollector::get();
    }
    public function getAllCreditsAccount()
    {
        return AcctCreditsAccount::get();
    }   
    public function getAllBranch(){
        return CoreBranch::get();
    }

    // public function getFromLetterInforming($credits_account_id, ){
    //     return CoreCity::where('province_id',  $province_id)->get();
    // }

    public function creditsAccountCollectorHasMany(){
        return $this->hasMany(AcctCreditsAccountCollector::class, 'credits_account_collector_id');
    }
    public function checkBusinessCollectorFromCreditsAccountColelctor($id_businesss_collector){
        // return AcctBusinessCollectorReport::join('acct_credits_account_collector','acct_business_collector_report.credits_account_collector_id', '=' ,'acct_credits_account_collector.credits_account_collector_id')
        // ->where('acct_credits_account_collector.business_collector_id', '=',$id_businesss_collector);

        return AcctBusinessCollectorReport::join('acct_credits_account_collector',function($q) use ($id_businesss_collector)
        {
            $q->on('acct_credits_account_collector.credits_account_collector_id', '=', 'acct_business_collector_report.credits_account_collector_id')
                ->where('acct_credits_account_collector.business_collector_id', '=', $id_businesss_collector);
        })->select('acct_credits_account_collector.*');
    }
}
