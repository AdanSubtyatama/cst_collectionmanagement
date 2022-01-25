<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreKecamatan extends Model
{
    protected $table = 'core_kecamatan';
    protected $primaryKey   = 'kecamatan_id';
    
    protected $guarded = [
        'kecamatan_id',
    ];

    use HasFactory;
}
