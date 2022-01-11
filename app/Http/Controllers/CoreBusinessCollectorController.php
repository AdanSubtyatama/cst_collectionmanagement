<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoreBusinessCollectorRequest;
use App\Models\CoreBusinessCollector;

class CoreBusinessCollectorController extends Controller
{

    public function setToken(){
        session()->put('businessCollector_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('businessCollector_token');
    }
    public function index()
    {
        $this->setToken();
        $businessCollectors = CoreBusinessCollector::where('data_state', '0')->get();
        return view('BusinessCollector.BusinessCollector', ['businessCollectors' => $businessCollectors, 'businessCollector' => new CoreBusinessCollector]);
    }

    public function store(CoreBusinessCollectorRequest $request)
    {   
        $request->merge([
            'business_collection_token' => $this->getToken(),
            'data_state' => 0,
            'created_id' => '1'
        ]);
        if(CoreBusinessCollector::checkToken( $this->getToken())){
            return redirect('/businessCollector')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        CoreBusinessCollector::create($request->all()) ? $msg = 'Data Berhasil Ditambahkan !' : $msg = 'Data gagal Ditambahkan !';
        
        return redirect('/businessCollector')->with('success', $msg);            
    }

    public function edit(CoreBusinessCollector $businessCollector)
    {
        return view('businessCollector.edit', compact('businessCollector'));
    }


    public function update(CoreBusinessCollectorRequest $request, $id)
    {
        $request->merge([
            'business_collection_token' => $this->getToken(),
            'data_state' => 0,
            'updated_id' => '1'
        ]);
        if(CoreBusinessCollector::checkToken( $this->getToken())){
            return redirect('/businessCollector')->with('success', 'Data sudah diubah Sebelumnya !');            
        };
        CoreBusinessCollector::find($id)->update($request->all()) ?
        $msg = 'Data berhasil Diubah !' :$msg = 'Data gagal diubah !';
        return redirect('/businessCollector')->with('success', $msg); 
             
    }

    public function delete($id)
    {
        $businessCollector               = CoreBusinessCollector::findOrFail($id);
        $businessCollector->business_collection_token = $this->getToken();
        $businessCollector->data_state   = 1;
        $businessCollector->deleted_id   = '1';
        $businessCollector->deleted_at   = date("Y-m-d H:i:s");
        $businessCollector->save() ? $msg = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

        return redirect('/businessCollector')->with('success',$msg);
    }
}
