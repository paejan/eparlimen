<?php

namespace App\Http\Controllers\Pegawai;

use App\Bahagian;
use App\Http\Controllers\Controller;
use App\JadualTugas;
use App\Kakitangan;
use App\Mail\JadualPegawaiMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $result_p = JadualTugas::join('kod_sidang','jadual_tugas.id_sidang','kod_sidang.id_sidang')->join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')->where('jadual_tugas.is_deleted',0)->where('kod_sidang.status',0)->get();
        
                    
        $result_t = JadualTugas::join('kod_sidang','jadual_tugas.id_sidang','kod_sidang.id_sidang')->where('jadual_tugas.is_deleted',0)->where('kod_sidang.status',0)->get();
        // dd($result->where('jad_tkh','2018-04-02'));
        return view('pegawai/daftar/index',compact('result_p','result_t'));
    }

    public function add($id)
    {
        // dd($id);

        $rsData = JadualTugas::find($id);
        // dd($rsData);
        $title = "Kemaskini Maklumat Pegawai Bertugas";
        // dd($title);

        $staff = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->orderBy('nama_kakitangan')->get();

        return view('pegawai/daftar/add_pegawai',compact('rsData','title','staff'));
    }
    
    public function add_form($id)
    {
        // dd($id);

        $rsData = JadualTugas::find($id);
        // dd($rsData);
        $title = "Kemaskini Maklumat Pegawai Bertugas";
        // dd($title);

        $urusetia = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('id_kakitangan',$rsData->urusetia)->first();
        $pemandu = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('id_kakitangan',$rsData->pemandu)->first(); 
        $pegawai1 = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('id_kakitangan',$rsData->pegawai1)->first();
        $pegawai2 = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('id_kakitangan',$rsData->pegawai2)->first();
        $pegawai3 = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('id_kakitangan',$rsData->pegawai3)->first();

        return view('pegawai/daftar/add_pegawai_form',compact('rsData','title','urusetia','pemandu','pegawai1','pegawai2','pegawai3'));
    }

    public function cari(Request $request, $id)
    {
        // dd($id);
        // dd($request->all());

        $rsData = $rsData = JadualTugas::find($id);

        $resBhg = Bahagian::where('status',0)->orderBy('nama_bahagian')->get();

        $res_ap = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian');
        if($request->ty == 'pemandu') { $res_ap->where('type','D'); }
        
        if(!empty($request->bahagian)){ $res_ap->where('kakitangan.id_bahagian',$request->bahagian); }
        if(!empty($request->carian)){ $res_ap->where('nama_kakitangan','LIKE','%'.$request->carian.'%'); }

        $res_ap = $res_ap->get();
        // dd($res_ap);

        if(!empty($request->idstaff)){
            $staff = Kakitangan::find($request->idstaff);
            $staff = $staff->id_bahagian;
        } else {
            $staff = '';
        }
        // dd($staff);
        return view('pegawai/daftar/pegawai_cari',compact('rsData','resBhg','res_ap','staff'));
    }

    public function carian(Request $request)
    {
        $res_ap = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian');
        if($request->ty == 'pemandu') { $res_ap->where('type','D'); }
        
        if(!empty($request->bahagian)){ $res_ap->where('kakitangan.id_bahagian',$request->bahagian); }
        if(!empty($request->carian)){ $res_ap->where('nama_kakitangan','LIKE','%'.$request->carian.'%'); }

        $res_ap = $res_ap->get();

        return response()->json($res_ap);
    }

    public function pilihan(Request $request)
    {
        // dd($request->all());

        $staff = Kakitangan::find($request->ids);

        // dd($staff);

        return response()->json($staff);

    }

    public function list()
    {
        $result_p = JadualTugas::join('kod_sidang','jadual_tugas.id_sidang','kod_sidang.id_sidang')->join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')->where('jadual_tugas.is_deleted',0)->where('kod_sidang.status',0)->get();
        
                    
        $result_t = JadualTugas::join('kod_sidang','jadual_tugas.id_sidang','kod_sidang.id_sidang')->where('jadual_tugas.is_deleted',0)->where('kod_sidang.status',0)->get();
        return view('pegawai/daftar/list',compact('result_p','result_t'));
    }

    public function info(Request $request)
    {
        // dd($request->all());
        $title = "Kemaskini Maklumat Pegawai Bertugas";

        $rs = JadualTugas::join('kod_sidang','jadual_tugas.id_sidang','kod_sidang.id_sidang')
                         ->join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')
                         ->where('kod_sidang.status',0)
                         ->whereMonth('jad_tkh',$request->sel_mth)
                         ->whereYear('jad_tkh',$request->sel_year)
                         ->orderBy('jad_tkh')
                         ->get();

        // dd($rs);

        $res_1 = Kakitangan::join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('type','D')->where('is_delete',0)->where('kakitangan.status',0)->get();
        $datap = '';
        $cnt = 0;

        foreach($res_1 as $res_1)
        {
            if($cnt==0){ $datap = $datap . $res_1->id_kakitangan . ";" .$res_1->nama_kakitangan . " [".$res_1->nama_bahagian."]"; }
            else { $datap = $datap . ":" . $res_1->id_kakitangan . ";" .$res_1->nama_kakitangan . " [".$res_1->nama_bahagian."]"; }
            $cnt++;
        }

        $res_1 = Kakitangan::join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('is_delete',0)->where('kakitangan.status',0)->get();
        $data = '';
        $cnt = 0;

        foreach($res_1 as $res_1)
        {
            if($cnt==0){ $data = $data . $res_1->id_kakitangan . ";" .$res_1->nama_kakitangan . " [".$res_1->nama_bahagian."]"; }
            else { $data = $data . ":" . $res_1->id_kakitangan . ";" .$res_1->nama_kakitangan . " [".$res_1->nama_bahagian."]"; }
            $cnt++;
        }

        return view('pegawai/daftar/pegawai_add',compact('title','rs','datap','data'));
    }

    public function info_update(Request $request)
    {
        // dd($request->all());

            if($request->peg==1){
                $data = array(
                    'pegawai1'=>$request->id_p,
                );
            }
            if($request->peg==2){
                $data = array(
                    'pegawai2'=>$request->id_p,
                );
            }
            if($request->peg==3){
                $data = array(
                    'pegawai3'=>$request->id_p,
                );
            }
            if($request->peg==4){
                $data = array(
                    'urusetia'=>$request->id_p,
                );
            }
            if($request->peg==5){
                $data = array(
                    'pemandu'=>$request->id_p,
                );
            }

            // dd($data);
        $sql = JadualTugas::find($request->jad_id)->update($data);

        if($sql){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }

    public function view($id)
    {
        // dd($id);

        $rsData = JadualTugas::find($id);

        $urusetia = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('id_kakitangan',$rsData->urusetia)->first();
        $pemandu = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('id_kakitangan',$rsData->pemandu)->first(); 
        $pegawai1 = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('id_kakitangan',$rsData->pegawai1)->first();
        $pegawai2 = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('id_kakitangan',$rsData->pegawai2)->first();
        $pegawai3 = Kakitangan::where('is_delete',0)->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('id_kakitangan',$rsData->pegawai3)->first();


        return view('pegawai/daftar/view',compact('rsData','urusetia','pemandu','pegawai1','pegawai2','pegawai3'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $auth = Auth::user()->id_kakitangan;
        if($request->pro == 'SAVE') {
            $data = array(
                'jad_status' => $request->jad_status,
                'urusetia' => $request->urusetia,
                'pemandu' => $request->pemandu,
                'pegawai1' => $request->pegawai1,
                'pegawai2' => $request->pegawai2,
                'pegawai3' => $request->pegawai3,
                'update_dt' => now(),
                'update_by' => $auth
            );

            $sql = JadualTugas::find($request->jad_id)->update($data);

            if($sql){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        } else if($request->pro == 'UPD') {
            $data = array(
                'jad_status' => $request->jad_status,
                'update_dt' => now(),
                'update_by' => $auth
            );

            $sql = JadualTugas::find($request->jad_id)->update($data);

            if($sql){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        } else if($request->pro == 'PEG') {
            if($request->ty == 'pegawai1'){
                $data = array(
                    'pegawai1'=> $request->lstPegawai,
                    'pegawai1_bhg' => $request->bahagian,
                );
            } else if($request->ty == 'pegawai2'){
                $data = array(
                    'pegawai2'=> $request->lstPegawai,
                    'pegawai2_bhg' => $request->bahagian,
                );
            } else if($request->ty == 'pegawai3'){
                $data = array(
                    'pegawai3'=> $request->lstPegawai,
                    'pegawai3_bhg' => $request->bahagian,
                );
            } else if($request->ty == 'urusetia'){
                $data = array(
                    'urusetia'=> $request->lstPegawai,
                    'urusetia_bhg' => $request->bahagian,
                );
            } else if($request->ty == 'pemandu'){
                $data = array(
                    'pemandu'=> $request->lstPegawai,
                    'pemandu_bhg' => $request->bahagian,
                );
            }

            $sql = JadualTugas::find($request->jad_id)->update($data);

            if($sql){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }

        } else if($request->pro == 'DEL') {
            if(empty($request->ty)) {
                $data = array(
                    'urusetia'=>0,
                    'pemandu'=>0,
                    'pegawai1'=>0,
                    'pegawai2'=>0,
                    'pegawai3'=>0,
                    'update_dt' => now(),
                    'update_by' => $auth
                );
            } else if($request->ty == 1) {
                $data = array(
                    'pegawai1'=>0,
                    'update_dt' => now(),
                    'update_by' => $auth
                );
            } else if($request->ty == 2) {
                $data = array(
                    'pegawai2'=>0,
                    'update_dt' => now(),
                    'update_by' => $auth
                );
            } else if($request->ty == 3) {
                $data = array(
                    'pegawai3'=>0,
                    'update_dt' => now(),
                    'update_by' => $auth
                );
            }
            $sql = JadualTugas::find($request->jad_id)->update($data);

            if($sql){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        } 
    }

    public function email(Request $request)
    {
        // dd($request->all());

        $jad_peg = JadualTugas::find($request->jad_id);
        // dd($jad_peg);
        $day = date('w', strtotime($jad_peg->jad_tkh));
        // dd($day);
        if($day=='1'){ $hari='Isnin'; }
        else if($day=='2'){ $hari='Selasa'; }
        else if($day=='3'){ $hari='Rabu'; }
        else if($day=='4'){ $hari='Khamis'; }
        else if($day=='5'){ $hari='Jumaat'; }

        $data = [
            'dewan_desc' => $jad_peg->sidang->dewan->dewan,
            'sidang' => $jad_peg->sidang->persidangan,
            'tarikh' => $jad_peg->jad_tkh,
            'hari' => $hari
        ];
        // dd($data);

        $user = [];

        if(!empty($jad_peg->urusetia)){
            $user[] = $jad_peg->us->email;
        }
        
        if(!empty($jad_peg->pemandu)){
            $user[] = $jad_peg->pm->email;
        }
        
        if(!empty($jad_peg->pegawai1)){
            $user[] = $jad_peg->p1->email;
        }

        if(!empty($jad_peg->pegawai2)){
            $user[] = $jad_peg->p2->email;
        }

        if(!empty($jad_peg->pegawai3)){
            $user[] = $jad_peg->p3->email;
        }

        // dd($user);
        // Mail::cc('eidlan@yopmail.com')->send(new JadualPegawaiMail($data));
        Mail::cc($user)->send(new JadualPegawaiMail($data));

        return response()->json('OK');
    }
}
