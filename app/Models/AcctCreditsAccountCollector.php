<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcctCreditsAccountCollector extends Model
{
    protected $table = 'acct_credits_account_collector';
    protected $primaryKey   = 'credits_account_collector_id';
    
    protected $guarded = [
        'credits_account_collector_id',
        'created_at',
        'updated_at',
    ];
    use HasFactory;

    public function checkToken($token){
        return AcctCreditsAccountCollector::where('credits_account_collector_token',  $token)->first() ? true : false;
    }

    public function creditsAccount(){
        return $this->belongsTo(AcctCreditsAccount::class, 'credits_account_id');
    }
    public function businessCollector(){
        return $this->belongsTo(CoreBusinessCollector::class, 'business_collector_id');
    }
    public function creditsAccountCollectorHasMany()
    {
        return $this->hasMany(AcctBusinessCollectorReport::class);
    }
    public function preferenceCompany(){
        return preferenceCompany::first();
    }
}
