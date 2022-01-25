<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreKelurahan extends Model
{
    protected $table = 'core_kelurahan';
    protected $primaryKey   = 'kelurahan_id';
    
    protected $guarded = [
        'kelurahan_id',
    ];

    use HasFactory;
}
