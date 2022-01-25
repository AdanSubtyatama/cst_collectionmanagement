<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcctSourceFund extends Model
{
    protected $table = 'acct_source_fund';
    protected $primaryKey   = 'source_fund_id';
    
    protected $guarded = [
        'source_fund_id',
        'created_at',
        'updated_at',
    ];

    public function checkToken($token){
    return AcctSourceFund::where('source_fund_token',  $token)->first() ? true : false;
    }

    use HasFactory;
}
