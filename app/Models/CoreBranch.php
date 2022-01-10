<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreBranch extends Model
{
    protected $table = 'core_branch';
    protected $primaryKey   = 'branch_id';
    
    protected $guarded = [
        'branch_id',
        'created_at',
        'updated_at',
    ];
    use HasFactory;

    public function checkToken($token){
        return CoreBranch::where('branch_token',  $token)->first() ? true : false;
    }
}
