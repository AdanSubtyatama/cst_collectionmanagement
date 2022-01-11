<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreBusinessCollector extends Model
{
    protected $table = 'core_business_collector';
    protected $primaryKey   = 'business_collector_id';
    
    protected $guarded = [
        'business_collector_id',
        'created_at',
        'updated_at',
    ];
    use HasFactory;

    public function checkToken($token){
        return CoreBusinessCollector::where('business_collection_token',  $token)->first() ? true : false;
    }
}
