<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemMenuMapping extends Model
{
 
    protected $table = 'system_menu_mapping';
    protected $primaryKey   = 'id_menu_mapping';
    public $timestamps = false;

    protected $guarded = [
        'id_menu_mapping',
    ];
    use HasFactory;
}
