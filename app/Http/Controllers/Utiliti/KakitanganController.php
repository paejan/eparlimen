<?php

namespace App\Http\Controllers\Utiliti;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kakitangan;
use App\Bahagian;
use App\GroupMenu;
use App\TableMenu;
use App\TableMenuUser;
use Illuminate\Support\Facades\Auth;

class KakitanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // dd($request->all());
        $grp = GroupMenu::where('status',0)->orderBy('grp_id')->get();
        // dd($grp);
        $tbl = TableMenu::where('menu_status',0)->orderBy('grp_id')->orderBy('sort')->get();
        // dd($tbl);
        $bah = Bahagian::where('status',0)->orderBy('nama_bahagian')->get();
        if(empty($request->except('page'))){
            $staff = Kakitangan::where('id_kakitangan','<>',0)->where('is_delete',0)->paginate(10);            
            // dd($bah);
            return view('/utiliti/kakitangan/index', compact('staff','bah','grp','tbl'));
        } else {
            // $staff = $request->all();
            // dd($staff);
            $row = Kakitangan::where('id_kakitangan','<>',0);
            if(!empty($request->bahagian)){
                $row->where('id_bahagian',$request->bahagian);
            }
            if(!empty($request->carian)){
                $row->where('nama_kakitangan','LIKE','%'.$request->carian.'%')->orWhere('no_kp_kakitangan','LIKE','%'.$request->carian.'%');    
            }
            if(!empty($request->status)){
                $row->where('type',$request->status);
            }
            if($request->kat <> ''){
                if($request->kat == 99){
                    $row->where('is_delete',1);
                } else {
                    $row->where('status',$request->kat);
                }
            } else {
                $row->where('is_delete',0);
            }

            $staff = $row->paginate(10);
            // dd($row);

            return view('/utiliti/kakitangan/index', compact('staff','bah','grp','tbl'));
        }

    }

    public function unactive(Request $request)
    {
        // dd($request->all());
        $grp = GroupMenu::where('status',0)->orderBy('grp_id')->get();
        // dd($grp);
        $tbl = TableMenu::where('menu_status',0)->orderBy('grp_id')->orderBy('sort')->get();
        // dd($tbl);
        $bah = Bahagian::where('status',0)->orderBy('nama_bahagian')->get();
        if(empty($request->except('page'))){
            $staff = Kakitangan::where('id_kakitangan','<>',0)
                                ->where(function($query) {
                                    $query->where('is_delete',1)
                                          ->orWhere(function($q) {
                                              $q->where('status','<>',0)
                                                ->where('is_delete',0);
                                          });
                                })
                                ->paginate(10);            
            // dd($bah);
            return view('/utiliti/kakitangan/index', compact('staff','bah','grp','tbl'));
        } else {
            // $staff = $request->all();
            // dd($staff);
            $row = Kakitangan::where('id_kakitangan','<>',0);
            if(!empty($request->bahagian)){
                $row->where('id_bahagian',$request->bahagian);
            }
            if(!empty($request->carian)){
                $row->where('nama_kakitangan','LIKE','%'.$request->carian.'%')->orWhere('no_kp_kakitangan','LIKE','%'.$request->carian.'%');    
            }
            if(!empty($request->status)){
                $row->where('type',$request->status);
            }
            if($request->kat <> ''){
                if($request->kat == 99){
                    $row->where('is_delete',1);
                } else {
                    $row->where('status',$request->kat);
                }
            } else {
                $row->where(function($query) {
                    $query->where('is_delete',1)
                          ->orWhere(function($q) {
                              $q->where('status','<>',0)
                                ->where('is_delete',0);
                          });
                });
            }

            $staff = $row->paginate(10);
            // dd($row);

            return view('/utiliti/kakitangan/index', compact('staff','bah','grp','tbl'));
        }

    }

    public function form(Request $request)
    {
        // dd($request->all());
        $rsData = Kakitangan::where('id_kakitangan',$request->ids)->first();

        $bah = Bahagian::where('status',0)->orderBy('nama_bahagian')->get();

        return view('/utiliti/kakitangan/form',compact('rsData','bah'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $id = Auth::user()->id_kakitangan;
        // dd($id);

        if(empty($request->is_semak)){
            $semak = 0;
        } else {
            $semak = 1;
        }

        if(empty($request->is_lulus))
        {
            $lulus = 0;
        } else {
            $lulus = 1;
        }

        // dd($semak.$lulus);

        if(empty($request->ids)){
            if(Kakitangan::find($request->no_kp_kakitangan))
            {
                return response()->json('ADA');
            } else {
                // dd('tiada');

                $user = new Kakitangan();
                $user->nama_kakitangan = $request->nama_kakitangan;
                $user->no_kp_kakitangan = $request->no_kp_kakitangan;
                $user->jawatan_kakitangan = $request->jawatan_kakitangan;
                $user->no_telefon = $request->no_telefon;
                $user->no_hp = $request->no_hp;
                $user->id_bahagian = $request->id_bahagian;
                $user->gred = $request->gred;
                $user->type = $request->type;
                $user->userid = $request->no_kp_kakitangan;
                $user->pass = md5($request->no_kp_kakitangan);
                $user->email = $request->email;
                $user->is_semak = $semak;
                $user->is_lulus = $lulus;
                $user->fldupdate_dt = now();
                $user->fldupdate_by = $id;
                $user->status = $request->stat;

                $user->save();

                return response()->json('OK');
            }
        } else {
            // dd($request->ids);
            $data = array('nama_kakitangan'=> $request->nama_kakitangan, 'no_kp_kakitangan' => $request->no_kp_kakitangan, 'jawatan_kakitangan' => $request->jawatan_kakitangan,
                    'no_telefon'=> $request->no_telefon, 'no_hp'=> $request->no_hp, 'id_bahagian'=> $request->id_bahagian, 'gred'=> $request->gred, 'type'=> $request->type, 
                    'userid'=> $request->no_kp_kakitangan, 'email'=> $request->email, 'is_semak'=> $semak, 'is_lulus'=> $lulus, 'fldupdate_dt'=> now(),
                    'fldupdate_by'=> $id, 'status'=> $request->stat);
            
            $user = Kakitangan::where('id_kakitangan', $request->ids)->update($data);

            return response()->json('OK');
        }
    }

    public function menus(Request $request)
    {
        // dd($request->all());
        $rs = Kakitangan::find($request->ids);

        $rs_m = GroupMenu::where('status',0)->orderBy('grp_id')->get();
        // dd($rs_m->count());

        $rsmd = [];
        $rs_data = [];
        for ($i=0; $i < $rs_m->count(); $i++) {
            $rsmd[$i] = TableMenu::where('menu_status',0)->where('grp_id',$rs_m[$i]->grp_id)->orderBy('sort')->get();
            // dd($rsmd[$i][$j]->menu_id);

            for ($j=0; $j < $rsmd[$i]->count(); $j++) {
                $rs_data[$i][$j] = TableMenuUser::where('id_kakitangan',$request->ids)->where('menu_id',$rsmd[$i][$j]->menu_id)->first();
            }
        }
        // dd($rsmd);
        // dd($rs_data);

        return view('utiliti/kakitangan/menus',compact('rs','rs_m','rsmd','rs_data'));
    }

    public function menu_store(Request $request)
    {
        // dd($request->all());
        $sql = TableMenuUser::where('id_kakitangan',$request->id_kakitangan)->where('menu_id',$request->id_menu)->first();
        // dd($sql);
        if($request->type == 'M'){
            if(empty($sql)){
                $sqlr = new TableMenuUser();
                $sqlr->menu_id = $request->id_menu;
                $sqlr->id_kakitangan = $request->id_kakitangan;
                $sqlr->is_add = 0;
                $sqlr->is_upd = 0;
                $sqlr->is_del = 0;

                $sqlr->save();
            } else {
                $sql = TableMenuUser::where('id_kakitangan',$request->id_kakitangan)->where('menu_id',$request->id_menu)->delete();
            }
        } else {
            $sql = TableMenuUser::where('id_kakitangan',$request->id_kakitangan)->where('menu_id',$request->id_menu)->first();

            if(empty($sql)){
                $sqlr = new TableMenuUser();
                $sqlr->menu_id = $request->id_menu;
                $sqlr->id_kakitangan = $request->id_kakitangan;
                $sqlr->is_add = 0;
                $sqlr->is_upd = 0;
                $sqlr->is_del = 0;

                $sqlr->save();
            }

            $query = TableMenuUser::where('id_kakitangan',$request->id_kakitangan)->where('menu_id',$request->id_menu)->first();

            if($request->type == 'A'){
                if($query->is_add == 0){
                    $sql = TableMenuUser::where('id_kakitangan',$request->id_kakitangan)->where('menu_id',$request->id_menu)->update(['is_add'=>1]);
                } else {
                    $sql = TableMenuUser::where('id_kakitangan',$request->id_kakitangan)->where('menu_id',$request->id_menu)->update(['is_add'=>0]);
                }
            } else if($request->type == 'U'){
                if($query->is_upd == 0) {
                    $sql = TableMenuUser::where('id_kakitangan',$request->id_kakitangan)->where('menu_id',$request->id_menu)->update(['is_upd'=>1]);
                } else {
                    $sql = TableMenuUser::where('id_kakitangan',$request->id_kakitangan)->where('menu_id',$request->id_menu)->update(['is_upd'=>0]);
                }       
            } else if($request->type == 'D'){
                if($query->is_del == 0){
                    $sql = TableMenuUser::where('id_kakitangan',$request->id_kakitangan)->where('menu_id',$request->id_menu)->update(['is_del'=>1]);
                } else {
                    $sql = TableMenuUser::where('id_kakitangan',$request->id_kakitangan)->where('menu_id',$request->id_menu)->update(['is_del'=>0]);
                }
            }
            
            return response()->json($request->id_menu);
        }

    }

    public function reset($id)
    {
        $auth = Auth::user()->id_kakitangan;
        // dd($id);
        $new = Kakitangan::where('id_kakitangan', $id)->pluck('no_kp_kakitangan');
        // dd($new[0]);
        $data = array('pass'=> md5($new[0]), 'fldupdate_dt'=> now(), 'fldupdate_by'=> $auth);

        $reset = Kakitangan::where('id_kakitangan', $id)->update($data);

        return response()->json('OK');
    }

    public function delete($id)
    {
        $auth = Auth::user()->id_kakitangan;
        // dd($id);
        $data = array('is_delete'=> 1, 'fldupdate_dt'=> now(), 'fldupdate_by'=> $auth);

        $reset = Kakitangan::where('id_kakitangan', $id)->update($data);
    }
}
