<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferenceCompany extends Model
{
    protected $table = 'preference_company';
    protected $primaryKey   = 'company_id';
    public $timestamps = false;
    
    protected $guarded = [
        'company_id',
    ];

    use HasFactory;
}
