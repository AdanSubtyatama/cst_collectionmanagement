<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemUserGroup extends Model
{
    use HasFactory;
    protected $table = 'system_user_group';
    protected $primaryKey   = 'user_group_id';
    
    protected $guarded = [
        'user_group_id',
    ];
}
