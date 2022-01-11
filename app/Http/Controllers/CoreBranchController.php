<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoreBranchRequest;
use App\Models\CoreBranch;
use App\Models\CoreCity;

class CoreBranchController extends Controller
{

    public function setToken(){
        session()->put('branch_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('branch_token');
    }
    public function index()
    {
        $this->setToken();
        $citys = CoreCity::get(); 
        $branchs = CoreBranch::where('data_state', '0')->get();
        return view('branch.branch', ['brancs' => $branchs, 'branch' => new CoreBranch, 'citys'=> $citys ]);
    }

    public function store(CoreBranchRequest $request)
    {   
        $request->merge([
            'branch_token' => $this->getToken(),
            'data_state' => 0,
            'created_id' => '1'
        ]);
        if(CoreBranch::checkToken( $this->getToken())){
            return redirect('/branch')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        CoreBranch::create($request->all()) ? $msg = 'Data Berhasil Ditambahkan !' : $msg = 'Data gagal Ditambahkan !';
        
        return redirect('/branch')->with('success', $msg);            
    }

    public function edit(CoreBranch $branch)
    {
        $citys = CoreCity::all(); 
        return view('branch.edit', compact('branch', 'citys'));
    }


    public function update(CoreBranchRequest $request, $id)
    {
        $request->merge([
            'branch_token' => $this->getToken(),
            'data_state' => 0,
            'updated_id' => '1'
        ]);
        if(CoreBranch::checkToken( $this->getToken())){
            return redirect('/branch')->with('success', 'Data sudah diubah Sebelumnya !');            
        };
        CoreBranch::findOrFail($id)->update($request->all()) ?
        $msg = 'Data berhasil Diubah !' :$msg = 'Data gagal diubah !';

        return redirect('/branch')->with('success', $msg); 
             
    }

    public function delete($id)
    {
        $branch               = CoreBranch::findOrFail($id);
        $branch->branch_token = $this->getToken();
        $branch->data_state   = 1;
        $branch->deleted_id   = '1';
        $branch->deleted_at   = date("Y-m-d H:i:s");
        if(CoreBranch::checkToken($this->getToken())){
            return redirect('/branch')->with('success', 'Data sudah dihapus Sebelumnya !');            
        };
        $branch->save() ? $msg = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

        return redirect('/branch')->with('success',$msg);
    }
}
