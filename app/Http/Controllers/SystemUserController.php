<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemUserRequest;
use App\Models\CoreBranch;
use App\Models\SystemUserGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class SystemUserController extends Controller
{
    public function index()
    {
        $system_user = User::where('data_state','=',0)->get();
        $system_user_edit = new User;
        $system_user_group = SystemUserGroup::where('data_state', '0')->get();
        $core_branch = CoreBranch::where('data_state', '0')->get();
        return view('systemUser.systemUser',compact('system_user', 'system_user_edit', 'system_user_group', 'core_branch'));
    }

    public function processAddUser (SystemUserRequest $request)
    {   
        $request->validate([
            'username' => 'unique:system_user,username'
        ]);
        $dataAddUser = [
            'username' => $request->username,
            'user_name' => $request->user_name,
            'user_group_id' => $request->user_group_id,
            'branch_id' => $request->branch_id,
            'branch_id' => $request->branch_id,
            'data_state' => 0,
            'log_stat' => 'off',
            'password' => Hash::make($request->password),
            'avatar' => 'default.png'
           ];
        if($request->avatar != "") {
            $request->validate([
                'avatar' => 'image|max:2048|mimes:png,jpg,jpeg',
            ]);
            $file = $request->avatar;
            $filename = 'a-' . $request->username.'.'.$file->extension();
            $file->move(public_path('img/avatar'), $filename);
            $dataAddUser['avatar'] = $filename;
        }
       
        User::create($dataAddUser) ?  $msg = 'Tambah System User Berhasil' :  $msg = 'Tambah System User Gagal';;
       
        return redirect('/user')->with('success',$msg);
    }

    public function editUser(User $system_user_edit)
    {
        $system_user_group = SystemUserGroup::where('data_state', '0')->get();
        $core_branch = CoreBranch::where('data_state', '0')->get();
        return view('systemUser.edit',compact('system_user_edit', 'system_user_group', 'core_branch'));
    }

    public function processEditUser(SystemUserRequest $request, $user_id)
    {   
        $request->validate([
            'username' => 'unique:system_user,username' .$user_id,
        ]);
       $dataEditUser = [
        'username' => $request->username,
        'user_name' => $request->user_name,
        'user_group_id' => $request->user_group_id,
        'branch_id' => $request->branch_id,
        'branch_id' => $request->branch_id,
        'data_state' => 0,
        'log_stat' => 'off',
       ];
        $request->request->remove('password');
        if($request->avatar != "") {
            $request->validate([
                'avatar' => 'image|max:2048|mimes:png,jpg,jpeg',
            ]);
            $file = $request->avatar;
            $filename = 'a-' . $request->username.'.'.$file->extension();
            $file->move(public_path('img/avatar'), $filename);
            $dataEditUser['avatar'] = $filename;

        }
       

        User::findOrFail($user_id)->update($dataEditUser) ?  $msg = 'Update User Berhasil' :  $msg = 'Update User Gagal';;
       
        return redirect('/user')->with('success',$msg);
    }

    public function processDeleteUser($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->data_state = 1;
        $user->save() ? $msg = 'Data berhasil dihapus !' : $msg = 'Data gagal dihapus !';

        return redirect('/user')->with('success',$msg);
    }

    public function processResetPassword($user_id){
        $user = User::findOrFail($user_id);
        $user->password = Hash::make('123456');
        $user->save() ? $msg = 'Password berhasil direset !' : $msg = 'Password gagal direset !';

        return redirect('/user')->with('success',$msg);
    }
}
