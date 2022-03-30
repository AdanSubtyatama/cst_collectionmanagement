<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcctCreditsAccount extends Model
{
    protected $table = 'acct_credits_account';
    protected $primaryKey   = 'credits_account_id';
    
    protected $guarded = [
        'credits_account_id',
        'created_at',
        'updated_at',
    ];
    use HasFactory;

    public function addCreditsAgunan($credits_agunan){
        return AcctCreditsAgunan::create($credits_agunan);
    }

    public function checkToken($token){
        return AcctCreditsAccount::where('credits_account_token',  $token)->first() ? true : false;
    }

    public function province(){
        return $this->belongsTo(CoreProvince::class, 'province_id');
    }

    public function kecamatan(){
        return $this->belongsTo(CoreKecamatan::class, 'kecamatan_id');
    }

    public function city(){
        return $this->belongsTo(CoreCity::class, 'city_id');
    }

    public function credits(){
        return $this->belongsTo(AcctCredits::class, 'credits_id');
    }

    public function source_fund(){
        return $this->belongsTo(AcctSourceFund::class, 'source_fund_id');
    }

    public function branch(){
        return $this->belongsTo(CoreBranch::class, 'branch_id');
    }

    public function business_officer(){
        return $this->belongsTo(CoreBusinessOfficer::class, 'business_officer_id');
    }

    public function getAllCredits(){
        return AcctCredits::get();
    }

    public function getCityFromProvince($province_id){
        return CoreCity::where('province_id',  $province_id)->get();
    }

    public function getKecamatanFromCity($city_id){
        return CoreKecamatan::where('city_id',  $city_id)->get();
    }

    public function getAllProvince(){
        return CoreProvince::get();
    }

    public function getAllSourceFund(){
        return AcctSourceFund::get();
    }

    public function getAllBusinessOfficer(){
        return CoreBusinessOfficer::get();
    }

    public function getAllBranch(){
        return CoreBranch::get();
    }
    public function getAllBusinessCollector(){
        return CoreBusinessCollector::get();
    }
    public function getAllPreferenceCollectibility(){
        return PreferenceCollectibility::get();
    }
    public function getCreditsAccountCollector($credits_account_id){
        return AcctCreditsAccountCollector::where('credits_account_id', $credits_account_id)->first();
    }
}
