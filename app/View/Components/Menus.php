<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Menus extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $id = Auth::user()->id_kakitangan;
        $type = Auth::user()->type;
        // dd($type);

        if ($type == 'P') {
            $group = DB::table('tbl_menu')
                ->join('kod_grpmenu', 'tbl_menu.grp_id', '=', 'kod_grpmenu.grp_id')
                ->where('tbl_menu.menu_status', '0')
                ->where('tbl_menu.is_pegawai', '0')
                ->orderBy('kod_grpmenu.grp_id')
                ->distinct()
                ->get(['kod_grpmenu.grp_name', 'tbl_menu.grp_id']);

            $menu = DB::table('tbl_menu')
                ->join('kod_grpmenu', 'tbl_menu.grp_id', '=', 'kod_grpmenu.grp_id')
                ->where('tbl_menu.menu_status', '0')
                ->where('tbl_menu.is_pegawai', '0')
                ->orderBy('tbl_menu.sort')
                ->orderBy('tbl_menu.menu_id')
                ->get();
        } else {
            $group = DB::table('tbl_menu_user')
                ->join('tbl_menu', 'tbl_menu_user.menu_id', 'tbl_menu.menu_id')
                ->join('kod_grpmenu', 'tbl_menu.grp_id', 'kod_grpmenu.grp_id')
                ->where('tbl_menu.menu_status', '0')
                ->where('tbl_menu_user.id_kakitangan', $id)
                ->orderBy('kod_grpmenu.grp_id')
                ->distinct()
                ->get(['kod_grpmenu.grp_name', 'tbl_menu.grp_id']);

            $menu = DB::table('tbl_menu_user')
                ->join('tbl_menu', 'tbl_menu_user.menu_id', 'tbl_menu.menu_id')
                ->join('kod_grpmenu', 'tbl_menu.grp_id', 'kod_grpmenu.grp_id')
                ->where('tbl_menu.menu_status', '0')
                ->where('tbl_menu_user.id_kakitangan', $id)
                ->orderBy('tbl_menu.grp_id')
                ->orderBy('tbl_menu.sort')
                ->orderBy('tbl_menu_user.menu_uid')
                ->get();
        }

        //Bahagian

        $bahagian = DB::table('kakitangan')
            ->join('kod_bahagian', 'kakitangan.id_bahagian', '=', 'kod_bahagian.id_bahagian')
            ->where('kakitangan.id_kakitangan', $id)
            ->pluck('nama_bahagian');
        // dd($bahagian);

        //User
        if ($type == 'A') {
            $user = 'Pengurus Sistem';
        } else if ($type == 'B') {
            $user = 'Penyelaras Bahagian';
        } else if ($type == 'P') {
            $user = 'Pegawai Bertugas';
        } else if ($type == 'U') {
            $user = 'Urusetia Parlimen';
        } else {
            $user = 'Pemandu';
        }


        // dd($menu);
        return view('components.menus', compact('group', 'menu', 'user', 'bahagian'));
    }
}
