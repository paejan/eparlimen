<?php

namespace App\Http\Controllers\Pegawai;

use App\AhliParlimen;
use App\Http\Controllers\Controller;
use App\JadualTugas;
use App\KodDewan;
use App\KodSidang;
use App\LaporanPegawaiLampiran;
use App\TableLaporanTugasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Composer\Autoload\includeFile;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Daftar Laporan
    public function index(Request $request)
    {
        $type = Auth::user()->type;

        $id_staff = Auth::user()->id_kakitangan;

        $dewan = KodDewan::get();

        $sidang = KodSidang::where('status',0);
        if(!empty($request->lj_dewan)){ $sidang->where('j_dewan',$request->lj_dewan); }
        $sidang = $sidang->orderBy('tahun','DESC')->orderBy('start_dt','DESC')->get();

        $laporan = JadualTugas::whereNotNull('jad_tkh')->join('kod_sidang','jadual_tugas.id_sidang','kod_sidang.id_sidang')->join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')->where('kod_sidang.status',0)->where('jadual_tugas.jad_status',0);
        // dd($laporan);
        if(!empty($request->id_sidang)){
            $laporan->where('jadual_tugas.id_sidang',$request->id_sidang);
        }

        if($type == 'P' || $type == 'B') {
            $laporan->where(function($query) use($id_staff){
                $query->where('pegawai1',$id_staff)->orWhere('pegawai2',$id_staff)->orWhere('pegawai3',$id_staff);
            });
        }

        $laporan = $laporan->orderBy('jad_tkh','DESC')->paginate(10);
        
        // dd($laporan);

        return view('pegawai/laporan/index',compact('type','dewan','sidang','laporan'));
    }

    public function create(Request $request, $id)
    {
        // dd($id);

        $jadual = JadualTugas::find($id);
        // dd($jadual);

        $tbljadual = TableLaporanTugasan::where('jad_id',$id)->first();
        // dd($jadual->sidang->dewan->dewan);
        if(empty($tbljadual))
        {
            $data = new TableLaporanTugasan();
            $data->jad_id = $id;
            $data->id_sidang = $jadual->id_sidang;
            $data->dewan = strtoupper($jadual->sidang->dewan->dewan);
            $data->tarikh = $jadual->jad_tkh; 
            $data->hari = $this->nama_hari(date('N',strtotime($jadual->jad_tkh)));
            $data->pegawai1 = optional($jadual->p1)->nama_kakitangan;
            $data->pegawai2 = optional($jadual->p2)->nama_kakitangan;
            $data->pegawai3 = optional($jadual->p3)->nama_kakitangan;

            $data->save();

            $title = "Tambah Maklumat Laporan Persidangan";
        } else {
            $title = "Kemaskini Maklumat Laporan Persidangan";
        }
        
        $result = TableLaporanTugasan::where('jad_id',$id)->first();

        // dd($result);

        if(empty($request->page)){
            return view('pegawai/laporan/form',compact('title','result'));
        } else {
            if($request->page == 'soalan'){
                $lampiran = LaporanPegawaiLampiran::where('id_laporan',$id)->where('type','L')->get();
                return view('pegawai/laporan/form1',compact('title','result','lampiran'));
            } else {
                $lampiran = LaporanPegawaiLampiran::where('id_laporan',$id)->where('type','P')->get();
                return view('pegawai/laporan/form2',compact('title','result','lampiran'));
            }
        }

    }

    public function nama_hari($date)
    {
        // dd($date);
        if($date=='1'){ $hari = "Isnin"; }
		else if($date=='2'){ $hari = "Selasa"; }
		else if($date=='3'){ $hari = "Rabu"; }
		else if($date=='4'){ $hari = "Khamis"; }
		else if($date=='5'){ $hari = "Jumaat"; }
		else if($date=='6'){ $hari = "Sabtu"; }
		else if($date=='7'){ $hari = "Ahad"; }

        return $hari;
    }

    public function update(Request $request)
    {
        // dd($request->fields);
        $tbllaporan = TableLaporanTugasan::where('jad_id',$request->jad_id)->update([$request->fields=>$request->val]);
    }

    public function lampiran1(Request $request)
    {
        // dd($request->all());
        $result = TableLaporanTugasan::where('jad_id',$request->jad_id)->first();

        if(!empty($request->lp_id)){
            $laporan = LaporanPegawaiLampiran::where('lp_id',$request->lp_id)->first();
            $title = "Kemaskini Maklumat Soalan Tambahan";
        } else {
            $laporan = '';
            $title = "Tambah Maklumat Soalan Tambahan";
        }

        if($result->dewan == "DEWAN RAKYAT"){
            $label = "Kawasan Parlimen / YB : ";
            $ahliparlimen = AhliParlimen::where('type','AP')->where('is_deleted',0)->whereNull('tkh_tamat')->orderBy('kod_kaw_ap')->get();
        } else {
            $label = "Y. Berhormat : ";
            $ahliparlimen = AhliParlimen::where('type','AD')->orderBy('nama_ap')->get();
        }
        // dd($ahliparlimen);
        return view('pegawai/laporan/lampiran1',compact('title','result','label','ahliparlimen','laporan'));
    }

    public function lampiran2(Request $request)
    {
        // dd($request->all());
        $result = TableLaporanTugasan::where('jad_id',$request->jad_id)->first();

        if(!empty($request->lp_id)){
            $laporan = LaporanPegawaiLampiran::where('lp_id',$request->lp_id)->first();
            $title = "Kemaskini Maklumat Perbahasan";
        } else {
            $laporan = '';
            $title = "Tambah Maklumat Perbahasan";
        }

        if($result->dewan == "DEWAN RAKYAT"){
            $label = "Kawasan Parlimen / YB : ";
            $ahliparlimen = AhliParlimen::where('type','AP')->where('is_deleted',0)->whereNull('tkh_tamat')->orderBy('kod_kaw_ap')->get();
        } else {
            $label = "Y. Berhormat : ";
            $ahliparlimen = AhliParlimen::where('type','AD')->orderBy('nama_ap')->get();
        }
        // dd($ahliparlimen);
        return view('pegawai/laporan/lampiran2',compact('title','result','label','ahliparlimen','laporan'));
    }
    
    public function lampiran_update(Request $request)
    {
        // dd($request->all());

        $id = Auth::user()->id_kakitangan;
        // dd($id);
        if($request->pro == 'SAVE1'){
            if(empty($request->lp_id)){
                $lampiran = new LaporanPegawaiLampiran();
                $lampiran->id_laporan = $request->jad_id;
                $lampiran->oleh_id = $request->s_oleh;
                $lampiran->ahli_parlimen = $request->ahli_parlimen;
                $lampiran->kawasan_parlimen = $request->kawasan_parlimen;
                $lampiran->tarikh = $request->tarikh;
                $lampiran->masa = $request->masa;
                $lampiran->soalan = $request->soalan;
                $lampiran->tindakan = $request->tindakan;
                $lampiran->create_dt = now();
                $lampiran->create_by = $id;
                $lampiran->type = 'L';

                $lampiran->save();
            } else {
                $data = array(
                    'oleh_id'=>$request->s_oleh,
                    'ahli_parlimen'=>$request->ahli_parlimen,
                    'kawasan_parlimen'=>$request->kawasan_parlimen,
                    'tarikh'=>$request->tarikh,
                    'masa'=>$request->masa,
                    'soalan'=>$request->soalan,
                    'tindakan'=>$request->tindakan,
                    'update_dt'=>now(),
                    'update_by'=>$id,
                );

                $lampiran = LaporanPegawaiLampiran::find($request->lp_id)->update($data);
            }
        } else {
            if(empty($request->lp_id)){
                $lampiran = new LaporanPegawaiLampiran();
                $lampiran->id_laporan = $request->jad_id;
                $lampiran->oleh_id = $request->s_oleh;
                $lampiran->ahli_parlimen = $request->ahli_parlimen;
                $lampiran->kawasan_parlimen = $request->kawasan_parlimen;
                $lampiran->tarikh = $request->tarikh;
                $lampiran->masa = $request->masa;
                $lampiran->soalan = $request->soalan;
                $lampiran->tindakan = $request->tindakan;
                $lampiran->create_dt = now();
                $lampiran->create_by = $id;
                $lampiran->type = 'P';

                $lampiran->save();
            } else {
                $data = array(
                    'oleh_id'=>$request->s_oleh,
                    'ahli_parlimen'=>$request->ahli_parlimen,
                    'kawasan_parlimen'=>$request->kawasan_parlimen,
                    'tarikh'=>$request->tarikh,
                    'masa'=>$request->masa,
                    'soalan'=>$request->soalan,
                    'tindakan'=>$request->tindakan,
                    'update_dt'=>now(),
                    'update_by'=>$id,
                );

                $lampiran = LaporanPegawaiLampiran::find($request->lp_id)->update($data);
            }
        }

        if($lampiran){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }

    }

    public function lampiran_delete(Request $request)
    {
        // dd($request->all());

        $lampiran = LaporanPegawaiLampiran::find($request->lp_id)->delete();

        if($lampiran){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }

    //List laporan
    public function list(Request $request)
    {
        $type = Auth::user()->type;

        $id_staff = Auth::user()->id_kakitangan;

        $dewan = KodDewan::get();

        $sidang = KodSidang::where('status',0);
        if(!empty($request->lj_dewan)){ $sidang->where('j_dewan',$request->lj_dewan); }
        $sidang = $sidang->orderBy('tahun','DESC')->orderBy('start_dt','DESC')->get();

        $laporan = JadualTugas::whereNotNull('jad_tkh')->join('kod_sidang','jadual_tugas.id_sidang','kod_sidang.id_sidang')->join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')->where('kod_sidang.status',0)->where('jadual_tugas.jad_status',0);
        // dd($laporan);
        if(!empty($request->id_sidang)){
            $laporan->where('jadual_tugas.id_sidang',$request->id_sidang);
        }

        if($type == 'P' || $type == 'B') {
            $laporan->where(function($query) use($id_staff){
                $query->where('pegawai1',$id_staff)->orWhere('pegawai2',$id_staff)->orWhere('pegawai3',$id_staff);
            });
        }

        $laporan = $laporan->orderBy('jad_tkh','DESC')->paginate(10);
        
        // dd($laporan);

        return view('pegawai/laporan/list',compact('type','dewan','sidang','laporan'));
    }

    public function view(Request $request, $id)
    {
        $jadual = JadualTugas::find($id);
        // dd($jadual);

        $tbljadual = TableLaporanTugasan::where('jad_id',$id)->first();
        // dd($jadual->sidang->dewan->dewan);
        if(empty($tbljadual))
        {
            $data = new TableLaporanTugasan();
            $data->jad_id = $id;
            $data->id_sidang = $jadual->id_sidang;
            $data->dewan = strtoupper($jadual->sidang->dewan->dewan);
            $data->tarikh = $jadual->jad_tkh; 
            $data->hari = $this->nama_hari(date('N',strtotime($jadual->jad_tkh)));
            $data->pegawai1 = optional($jadual->p1)->nama_kakitangan;
            $data->pegawai2 = optional($jadual->p2)->nama_kakitangan;
            $data->pegawai3 = optional($jadual->p3)->nama_kakitangan;

            $data->save();

        }
        $title = "Maklumat Laporan Persidangan";
        
        $result = TableLaporanTugasan::where('jad_id',$id)->first();

        $lampiran1 = LaporanPegawaiLampiran::where('type','L')->where('id_laporan',$id)->get();

        $lampiran2 = LaporanPegawaiLampiran::where('type','P')->where('id_laporan',$id)->get();

        // dd($lampiran1);
        return view('pegawai/laporan/view',compact('title','result','lampiran1','lampiran2'));
    }

    public function cetak($id)
    {
        // dd($id);
        $title = "JABATAN KEMAJUAN ISLAM MALAYSIA<BR><U>LAPORAN PEGAWAI BERTUGAS</U>";

        $row = JadualTugas::find($id);

        $row_soalan = TableLaporanTugasan::where('jad_id',$id)->first();

        $row_l1 = LaporanPegawaiLampiran::where('type','L')->where('id_laporan',$id)->get();

        $row_l2 = LaporanPegawaiLampiran::where('type','P')->where('id_laporan',$id)->get();

        return view('pegawai/laporan/cetak',compact('title','row','row_soalan','row_l1','row_l2'));
    }
}
