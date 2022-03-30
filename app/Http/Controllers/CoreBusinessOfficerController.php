<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoreBusinessOfficerRequest;
use App\Models\CoreBusinessOfficer;

class CoreBusinessOfficerController extends Controller
{

    public function setToken(){
        session()->put('business_officer_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('business_officer_token');
    }
    public function index()
    {
        $this->setToken();
        $core_business_officer = CoreBusinessOfficer::where('data_state', '0')->get();
        return view('businessOfficer.businessOfficer', ['core_business_officer' => $core_business_officer, 'core_business_officer_edit' => new CoreBusinessOfficer]);
    }

    public function processAddBusinessOfficer(CoreBusinessOfficerRequest $request)
    {   
        $request->merge([
            'business_officer_token' => $this->getToken(),
            'data_state' => 0,
            'created_id' => auth()->id()
        ]);
        if(CoreBusinessOfficer::checkToken( $this->getToken())){
            return redirect('/business-officer')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        CoreBusinessOfficer::create($request->all()) ? $msg = 'Data Berhasil Ditambahkan !' : $msg = 'Data gagal Ditambahkan !';
        
        return redirect('/business-officer')->with('success', $msg);            
    }

    public function editBusinessOfficer(CoreBusinessOfficer $core_business_officer_edit)
    {
        return view('businessOfficer.edit', compact('core_business_officer_edit'));
    }


    public function processEditBusinessOfficer(CoreBusinessOfficerRequest $request, $business_officer_id)
    {
        $request->merge([
            'business_officer_token' => $this->getToken(),
            'data_state' => 0,
            'updated_id' => auth()->id()
        ]);
        if(CoreBusinessOfficer::checkToken( $this->getToken())){
            return redirect('/core_business_officer')->with('success', 'Data sudah diubah Sebelumnya !');            
        };
        CoreBusinessOfficer::find($business_officer_id)->update($request->all()) ?
        $msg = 'Data berhasil Diubah !' :$msg = 'Data gagal diubah !';
        return redirect('/business-officer')->with('success', $msg); 
             
    }

    public function processDeleteBusinessOfficer($business_officer_id)
    {
        $business_officer               = CoreBusinessOfficer::findOrFail($business_officer_id);
        $business_officer->business_officer_token = $this->getToken();
        $business_officer->data_state   = 1;
        $business_officer->deleted_id   = auth()->id();
        $business_officer->deleted_at   = date("Y-m-d H:i:s");
        if(CoreBusinessOfficer::checkToken($this->getToken())){
            return redirect('/business-officer')->with('success', 'Data sudah dihapus Sebelumnya !');            
        };
        $business_officer->save() ? $msg = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

        return redirect('/business-officer')->with('success',$msg);
    }
}
