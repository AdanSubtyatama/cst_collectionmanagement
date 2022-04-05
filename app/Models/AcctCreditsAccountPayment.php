<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcctCreditsAccountPayment extends Model
{
    protected $table = 'acct_credits_payment';
    protected $primaryKey   = 'credits_payment_id';
    public $timestamps = false;

    protected $guarded = [
        'credits_payment_id',
    ];
    use HasFactory;

    public function checkToken($token){
        return AcctCreditsAccountPayment::where('credits_payment_token',  $token)->first() ? true : false;
    }

    public function creditsAccount(){
        return $this->belongsTo(AcctCreditsAccount::class, 'credits_account_id');
    }
   
    public function getAllBranch(){
        return CoreBranch::get();
    }

    public function getAllCreditsAccount(){
        return AcctCreditsAccount::get();
    }
  
}
