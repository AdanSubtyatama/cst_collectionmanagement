<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcctCredits extends Model
{
    protected $table = 'acct_credits';
    protected $primaryKey   = 'credits_id';
    
    protected $guarded = [
        'credits_id',
        'created_at',
        'updated_at',
    ];

    public function checkToken($token){
    return AcctCredits::where('credits_token',  $token)->first() ? true : false;
    }

    use HasFactory;
}
