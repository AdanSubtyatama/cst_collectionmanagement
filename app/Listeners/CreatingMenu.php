<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class CreatingMenu
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $menuitems = User::select('system_menu_mapping.*','system_menu.*')
        ->join('system_user_group','system_user_group.user_group_id','=','system_user.user_group_id')
        ->join('system_menu_mapping','system_menu_mapping.user_group_level','=','system_user_group.user_group_level')
        ->join('system_menu','system_menu.id_menu','=','system_menu_mapping.id_menu')
        ->where('system_user.user_id','=',Auth::id())
        ->orderBy('system_menu_mapping.id_menu','ASC')
        ->get();

        $single_menu = array();
        $main_dropdown_menu = array();
        $dropdown_menu_item = array();
        $submain_dropdown_menu = array();
        $submain_dropdown_menu_item = array();
        foreach ($menuitems as $index => $menu) {
            if(strlen($menu->id_menu) == 1 && $menu->type == 'file'){
                array_push($single_menu, $menu);
            }
            if(strlen($menu->id_menu) == 1 && $menu->type == 'folder'){
                array_push($main_dropdown_menu, $menu);
            }
            if(strlen($menu->id_menu) == 2 && $menu->type == 'folder'){
                array_push($submain_dropdown_menu, $menu);
            }
            if(strlen($menu->id_menu) == 2 && $menu->type == 'file'){
                array_push($dropdown_menu_item, $menu);
            }
            if(strlen($menu->id_menu) == 3 && $menu->type == 'file'){
                array_push($submain_dropdown_menu_item, $menu);
            }
        }

        session()->put('single_menu', $single_menu);
        session()->put('main_dropdown_menu', $main_dropdown_menu);
        session()->put('dropdown_menu_item', $dropdown_menu_item);
        session()->put('submain_dropdown_menu', $submain_dropdown_menu);
        session()->put('submain_dropdown_menu_item', $submain_dropdown_menu_item);
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle()
    {
     
    }
}
