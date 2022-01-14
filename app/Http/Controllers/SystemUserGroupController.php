<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemUserGroupRequest;
use App\Models\SystemMenu;
use App\Models\SystemMenuMapping;
use App\Models\SystemUserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SystemUserGroupController extends Controller
{
    public function index()
    {
        $system_user_group_edit = new SystemUserGroup;
        $system_user_group = SystemUserGroup::where('data_state', '0')->get();
        $system_menu = SystemMenu::get();
        $system_menu_checklist = new SystemMenu();
        return view('systemUserGroup.systemUserGroup',compact('system_user_group_edit','system_menu' ,'system_user_group', 'system_menu_checklist'));
    }

    public function processAddUserGroup (SystemUserGroupRequest $request)
    {
        $request->validate([
            'user_group_level' => 'unique:system_user_group,user_group_level'
        ]);
      
        foreach ($request->id_menu as $id_menu) {
        SystemMenuMapping::create([
            'id_menu' => $id_menu,
            'user_group_level' => $request->user_group_level
        ]);
        }
        SystemUserGroup::create([
            'user_group_level' => $request->user_group_level,
            'user_group_name' => $request->user_group_name,
            'data_state' => '0',
        ]) ?  $msg = 'Tambah System User Group Berhasil' :  $msg = 'Tambah System User Group Gagal';;
       
        return redirect('/user-group')->with('success',$msg);
    }

    public function editUserGroup(SystemUserGroup $system_user_group_edit)
    {
        $system_menu = SystemMenu::get();
        $system_menu_checklist = SystemMenuMapping::where('user_group_level', $system_user_group_edit->user_group_level)->get();
        return view('systemUserGroup.edit',compact('system_menu_checklist', 'system_user_group_edit', 'system_menu'));
    }

    public function processEditUserGroup(SystemUserGroupRequest $request, $user_group_id)
    {
        $system_user_group = SystemUserGroup::find($user_group_id);
        $system_menu_mapping_delete = SystemMenuMapping::where('user_group_level', $system_user_group->user_group_level); 
        $system_menu_mapping_delete->delete();

        foreach ($request->id_menu as $id_menu) {
            SystemMenuMapping::create([
                'id_menu' => $id_menu,
                'user_group_level' => $request->user_group_level
            ]);
            }
        $dataEditUSerGroup = [
            'user_group_level' => $request->user_group_level,
            'user_group_name' => $request->user_group_name
        ];
        SystemUserGroup::findOrFail($user_group_id)->update($dataEditUSerGroup) ?  $msg = 'Update User Group Berhasil' :  $msg = 'Update User Group Gagal';;
       
        return redirect('/user-group')->with('success',$msg);
    }

    public function processDeleteUserGroup($user_group_id){
        
        $user_group               = SystemUserGroup::findOrFail($user_group_id);
        $user_group->data_state   = '1';
        $user_group->save() ? $msg = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

        return redirect('/user-group')->with('success',$msg);
    }

}
