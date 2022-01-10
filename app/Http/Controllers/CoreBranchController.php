<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoreBranchRequest;
use App\Models\CoreBranch;
use Illuminate\Http\Request;

class CoreBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setToken(){
        session()->put('branch_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('branch_token');
    }
    public function index()
    {
        $this->setToken();
        return view('branch.branch', ['brancs' => CoreBranch::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        CoreBranch::create($request->all());
        
        return redirect('/branch')->with('success', 'Data Berhasil Ditambahkan !');            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(branch $branch)
    {
        dd($branch->branch_id);
        return view('branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
