<?php

namespace App\Http\Controllers;

use App\Models\SystemUserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SystemUserGroupController extends Controller
{
    public function index()
    {
        $system_user_edit = new SystemUserGroup;
        $system_user_group = SystemUserGroup::where('data_state', '0')->get();
        return view('systemUserGroup.systemUserGroup',compact('system_user_edit', 'system_user_group',));
    }

    // public function processAddUser (SystemUserGroupRequest $request)
    // {
    //     if($request->avatar != "") {
    //         $request->validate([
    //             'avatar' => 'image|max:2048|mimes:png,jpg,jpeg',
    //         ]);
    //         $file = $request->avatar;
    //         $filename = 'a-' . $request->user_id.'.'.$file->extension();
    //         $file->move(public_path('img/avatar'), $filename);
    //     }else{
    //         $request->avatar = 'default.png';
    //     }

    //     $request->merge([
    //         'data_state' => 0,
    //         'log_stat' => 'off',
    //         'password' => Hash::make($request->password)
    //     ]);
    //     SystemUserGroup::create($request->all()) ?  $msg = 'Tambah System User Berhasil' :  $msg = 'Tambah System User Gagal';;
       
    //     return redirect('/user')->with('success',$msg);
    // }

    // public function editUser(SystemUserGroup $system_user_edit)
    // {
    //     $system_user_group = SystemUserGroup::where('data_state', '0')->get();
    //     return view('systemUser.edit',compact('system_user_edit', 'system_user_group'));
    // }

    // public function processEditUser(SystemUserGroupRequest $request, $user_id)
    // {
    //     $request->request->remove('password');
    //     if($request->avatar != "") {
    //         $request->validate([
    //             'avatar' => 'image|max:2048|mimes:png,jpg,jpeg',
    //         ]);
    //         $file = $request->avatar;
    //         $filename = 'a-' . $user_id.'.'.$file->extension();
    //         $file->move(public_path('img/avatar'), $filename);
    //     }else{
    //         $request->request->remove('avatar');
    //     }
    //     $request->merge([
    //         'data_state' => 0,
    //         'log_stat' => 'off',
    //     ]);
    //     SystemUserGroup::findOrFail($user_id)->update($request->all()) ?  $msg = 'Update User Berhasil' :  $msg = 'Update User Gagal';;
       
    //     return redirect('/user')->with('success',$msg);
    // }

}
