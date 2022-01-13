<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemMenu extends Model
{
    
    protected $table = 'system_menu';
    protected $primaryKey   = 'id_menu';
    
    protected $guarded = [
        'id_menu',
    ];
    use HasFactory;
}
