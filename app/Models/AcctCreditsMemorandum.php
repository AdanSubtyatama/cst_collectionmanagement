<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcctCreditsMemorandum extends Model
{
    protected $table = 'acct_credits_memorandum';
    protected $primaryKey   = 'credits_memorandum_id';
    
    protected $guarded = [
        'credits_memorandum_id',
        'last_update',
        'created_at',
        'updated_at',
    ];

    public function branch(){
        return $this->belongsTo(CoreBranch::class, 'branch_id');
    }
    public function credits_account(){
        return $this->belongsTo(AcctCreditsAccount::class, 'credits_account_id');
    }
    use HasFactory;
}
