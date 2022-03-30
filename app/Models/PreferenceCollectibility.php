<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferenceCollectibility extends Model
{
    protected $table = 'preference_collectibility';
    protected $primaryKey   = 'collectibility_id';
    public $timestamps = false;
    
    protected $guarded = [
        'last_update',
    ];

    use HasFactory;
}
