<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoreBusinessCollectorRequest;
use App\Models\CoreBusinessCollector;

class CoreBusinessCollectorController extends Controller
{

    public function setToken(){
        session()->put('business_collection_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('business_collection_token');
    }
    public function index()
    {
        $this->setToken();
        $core_business_collector = CoreBusinessCollector::where('data_state', '0')->get();
        return view('businessCollector.businessCollector', ['core_business_collector' => $core_business_collector, 'core_business_collector_edit' => new CoreBusinessCollector]);
    }

    public function processAddBusinessCollector(CoreBusinessCollectorRequest $request)
    {   
        $request->merge([
            'business_collection_token' => $this->getToken(),
            'data_state' => 0,
            'created_id' => auth()->id()
        ]);
        if(CoreBusinessCollector::checkToken( $this->getToken())){
            return redirect('/business-collector')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        CoreBusinessCollector::create($request->all()) ? $msg = 'Data Berhasil Ditambahkan !' : $msg = 'Data gagal Ditambahkan !';
        
        return redirect('/business-collector')->with('success', $msg);            
    }

    public function editBusinessCollector(CoreBusinessCollector $core_business_collector_edit)
    {
        return view('businessCollector.edit', compact('core_business_collector_edit'));
    }


    public function processEditBusinessCollector(CoreBusinessCollectorRequest $request, $business_collector_id)
    {
        $request->merge([
            'business_collection_token' => $this->getToken(),
            'data_state' => 0,
            'updated_id' => auth()->id()
        ]);
        if(CoreBusinessCollector::checkToken( $this->getToken())){
            return redirect('/core_business_collector')->with('success', 'Data sudah diubah Sebelumnya !');            
        };
        CoreBusinessCollector::find($business_collector_id)->update($request->all()) ?
        $msg = 'Data berhasil Diubah !' :$msg = 'Data gagal diubah !';
        return redirect('/business-collector')->with('success', $msg); 
             
    }

    public function processDeleteBusinessCollector($business_collector_id)
    {
        $business_collector               = CoreBusinessCollector::findOrFail($business_collector_id);
        $business_collector->business_collection_token = $this->getToken();
        $business_collector->data_state   = 1;
        $business_collector->deleted_id   = auth()->id();
        $business_collector->deleted_at   = date("Y-m-d H:i:s");
        $business_collector->save() ? $msg = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

        return redirect('/business-collector')->with('success',$msg);
    }
}
