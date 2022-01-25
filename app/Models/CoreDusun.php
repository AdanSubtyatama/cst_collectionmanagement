<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreDusun extends Model
{
    protected $table = 'core_dusun';
    protected $primaryKey   = 'dusun_id';
    
    protected $guarded = [
        'dusun_id',
    ];

    use HasFactory;
}
