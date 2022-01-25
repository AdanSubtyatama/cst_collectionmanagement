<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcctCreditsAgunan extends Model
{
    protected $table = 'acct_credits_agunan';
    protected $primaryKey   = 'acct_credits_agunan_id';
    
    protected $guarded = [
        'acct_credits_agunan_id',
        'created_at',
        'updated_at',
    ];

    public function checkToken($token){
    return AcctCreditsAgunan::where('acct_credits_agunan_token',  $token)->first() ? true : false;
    }

    public function credits_account(){
        return $this->belongsTo(AcctCreditsAccount::class, 'credits_account_id');
    }
    use HasFactory;
}
