<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreBusinessOfficer extends Model
{
    protected $table = 'core_business_officer';
    protected $primaryKey   = 'business_officer_id';
    
    protected $guarded = [
        'business_officer_id',
        'created_at',
        'updated_at',
    ];
    use HasFactory;

    public function checkToken($token){
        return CoreBusinessOfficer::where('business_officer_token',  $token)->first() ? true : false;
    }

}
