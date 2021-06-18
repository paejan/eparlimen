<?php

namespace App\Http\Controllers\Soalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kakitangan;
use App\AhliParlimen;
use App\Bahagian;
use App\KodDewan;
use App\KodSidang;
use App\KodKategori;
use App\KodKategoriSub;
use App\KodPertanyaan;
use App\SoalanParlimen;
use App\TableMenuUser;
use Illuminate\Support\Facades\Auth;

class DewanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rakyat()
    {
        $usermenu = TableMenuUser::where('menu_id', 1)->where('id_kakitangan', Auth::user()->id_kakitangan)->first();

        // dd($usermenu);

        $tanya = KodPertanyaan::get();

        $sidang = KodSidang::where('status', 0)->where('j_dewan', 1)->orderBy('tahun', 'DESC')->orderBy('start_dt', 'DESC')->get();

        $ahli = AhliParlimen::join('kod_parlimen', 'ahliparlimen.kod_kaw_ap', 'kod_parlimen.p_kod')
            ->where('ahliparlimen.type', 'AP')
            ->where('ahliparlimen.status_ap', 0)
            ->where('ahliparlimen.is_deleted', 0)
            ->whereNull('ahliparlimen.tkh_tamat')
            ->orderBy('ahliparlimen.kod_kaw_ap')
            ->get();

        $kategori = KodKategori::where('status', 0)->orderBy('kod_kategori')->get();

        $sub = KodKategoriSub::where('status', 0)->get();
        // dd($sub);
        $bahagian = Bahagian::where('status', 0)->get();

        return view('soalan/dewan/index', compact('usermenu', 'tanya', 'sidang', 'ahli', 'kategori', 'sub', 'bahagian'));
    }

    public function negara()
    {
        $usermenu = TableMenuUser::where('menu_id', 24)->where('id_kakitangan', Auth::user()->id_kakitangan)->first();

        // dd($usermenu);

        $tanya = KodPertanyaan::get();

        $sidang = KodSidang::where('status', 0)->where('j_dewan', 2)->orderBy('tahun', 'DESC')->orderBy('start_dt', 'DESC')->get();

        $ahli = AhliParlimen::where('ahliparlimen.type', 'AD')
            ->where('ahliparlimen.status_ap', 0)
            ->where('ahliparlimen.is_deleted', 0)
            ->whereNull('ahliparlimen.tkh_tamat')
            ->orderBy('ahliparlimen.nama_ap')
            ->get();

        $kategori = KodKategori::where('status', 0)->orderBy('kod_kategori')->get();

        $sub = KodKategoriSub::where('status', 0)->get();
        // dd($sub);
        $bahagian = Bahagian::where('status', 0)->get();

        return view('soalan/dewan/index', compact('usermenu', 'tanya', 'sidang', 'ahli', 'kategori', 'sub', 'bahagian'));
    }

    public function search($id)
    {
        // dd($id);
        $kakitangan = Kakitangan::whereIn('type', ['B', 'U'])->where('id_bahagian', $id)->where('is_delete', 0)->orderBy('nama_kakitangan')->get();

        // dd($kakitangan);

        return response()->json($kakitangan);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $user = Auth::user()->id_kakitangan;
        if (empty($request->soalan_id)) {
            $soalan_id = date('Ymd') . "-" . uniqid();

            $soalan = new SoalanParlimen();
            $soalan->soalan_id = $soalan_id;
            $soalan->type_soalan = 'S';
            $soalan->tkh_soalan = $request->tkh_soalan;
            $soalan->no_soalan = $request->no_soalan;
            $soalan->j_tanya = $request->j_tanya;
            $soalan->j_tanya_det = $request->j_tanya_det;
            $soalan->j_dewan = $request->j_dewan;
            $soalan->id_sidang = $request->id_sidang;
            $soalan->s_oleh = $request->nama_ap;
            $soalan->j_kategori = $request->j_kategori;
            $soalan->kod_bahagian = $request->bahagian;
            $soalan->peg_id = $request->lstPegawai;
            $soalan->soalan = $request->docs;
            $soalan->soalan_oleh = $request->ahli_parlimen;
            $soalan->soalan_kawasan = $request->kawasan_parlimen;
            $soalan->tkh_dedline = $request->tkh_dedline;
            $soalan->tkh_jwb_parlimen = $request->tkh_jwb_parlimen;
            $soalan->menteri = $request->menteri;
            $soalan->create_dt = now();
            $soalan->create_by = $user;
            $soalan->update_dt = now();
            $soalan->update_by = $user;
            $soalan->tkh_agihan = $request->tkh_agihan;
            $soalan->is_deleted = 0;

            $soalan->save();

            return response()->json('OK');
        } else {
            // dd('ada');
            $data = array(
                'tkh_soalan' => $request->tkh_soalan,
                'tkh_agihan' => $request->tkh_agihan,
                'no_soalan' => $request->no_soalan,
                'j_tanya' => $request->j_tanya,
                'j_tanya_det' => $request->j_tanya_det,
                'id_sidang' => $request->id_sidang,
                's_oleh' => $request->nama_ap,
                'j_kategori' => $request->j_kategori,
                'kod_bahagian' => $request->bahagian,
                'kod_unit' => $request->kod_unit,
                'peg_id' => $request->lstPegawai,
                'soalan_oleh' => $request->ahli_parlimen,
                'soalan_kawasan' => $request->kawasan_parlimen,
                'soalan' => $request->docs,
                'tkh_dedline' => $request->tkh_dedline,
                'tkh_jwb_parlimen' => $request->tkh_jwb_parlimen,
                'menteri' => $request->menteri,
                'update_dt' => now(),
                'update_by' => $user,
            );

            $soalan = SoalanParlimen::where('soalan_id', $request->soalan_id)->update($data);

            return response()->json('OK');
        }
    }

    public function delete($id)
    {
        // dd($id);
        $user = Auth::user()->id_kakitangan;

        $data = array('is_deleted' => 1, 'deleted_dt' => now(), 'deleted_by' => $user);

        $soalan = SoalanParlimen::where('soalan_id', $id)->update($data);

        return response()->json('OK');
    }
}
