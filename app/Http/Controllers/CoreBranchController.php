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
        $core_city = CoreCity::get(); 
        $core_branch = CoreBranch::where('data_state', '0')->get();
        return view('branch.branch', ['core_branch' => $core_branch, 'core_branch_edit' => new CoreBranch, 'core_city'=> $core_city ]);
    }

    public function processAddBranch(CoreBranchRequest $request)
    {   
        $request->merge([
            'branch_token' => $this->getToken(),
            'data_state' => 0,
            'created_id' => auth()->id()
        ]);
        if(CoreBranch::checkToken( $this->getToken())){
            return redirect('/branch')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        CoreBranch::create($request->all()) ? $msg = 'Data Berhasil Ditambahkan !' : $msg = 'Data gagal Ditambahkan !';
        
        return redirect('/branch')->with('success', $msg);            
    }

    public function editBranch(CoreBranch $core_branch_edit)
    {
        $core_city = CoreCity::all(); 
        return view('branch.edit', compact('core_branch_edit', 'core_city'));
    }


    public function processEditBranch(CoreBranchRequest $request, $branch_id)
    {
        $request->merge([
            'branch_token' => $this->getToken(),
            'data_state' => 0,
            'updated_id' => auth()->id()
        ]);
        if(CoreBranch::checkToken( $this->getToken())){
            return redirect('/branch')->with('success', 'Data sudah diubah Sebelumnya !');            
        };
        CoreBranch::findOrFail($branch_id)->update($request->all()) ?
        $msg = 'Data berhasil Diubah !' :$msg = 'Data gagal diubah !';

        return redirect('/branch')->with('success', $msg); 
             
    }

    public function processDeleteBranch($branch_id)
    {
        $branch               = CoreBranch::findOrFail($branch_id);
        $branch->branch_token = $this->getToken();
        $branch->data_state   = 1;
        $branch->deleted_id   = auth()->id();
        $branch->deleted_at   = date("Y-m-d H:i:s");
        if(CoreBranch::checkToken($this->getToken())){
            return redirect('/branch')->with('success', 'Data sudah dihapus Sebelumnya !');            
        };
        $branch->save() ? $msg = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

        return redirect('/branch')->with('success',$msg);
    }
}
