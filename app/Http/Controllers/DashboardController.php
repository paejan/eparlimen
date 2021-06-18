<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SoalanParlimen;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kod = Auth::user()->id_bahagian;
        // dd($kod);

        //Soalan Dewan Rakyat
        $dewanRakyat = SoalanParlimen::where([['soalan_id', '<>', ''],['j_dewan','1'],['is_deleted','0']]);

        //Soalan Dewan Negara
        $dewanNegara = SoalanParlimen::where([['soalan_id', '<>', ''],['j_dewan','2'],['is_deleted','0']]);
        
        //Jumlah Soalan
        $jumlah = $dewanRakyat->count() + $dewanNegara->count();
        
        //Belum Diagihkan
        $belumAgih = SoalanParlimen::where([['soalan_id', '<>', ''],['is_deleted','0'],['status','0']]);
        
        //Belum Dijawab
        $belumJawab = SoalanParlimen::where([['soalan_id', '<>', ''],['is_deleted','0'],['status','1']]);
        
        //Telah Dijawab
        $telahJawab = SoalanParlimen::where([['soalan_id', '<>', ''],['is_deleted','0'],['status','2']]);

        //Soalan Dewan Rakyat
        $bhg_Rakyat = SoalanParlimen::where([['soalan_id', '<>', ''],['is_deleted','0'],['status','2'],['j_dewan','1'],['kod_bahagian',$kod]]);

        //Soalan Dewan Negara
        $bhg_Negara = SoalanParlimen::where([['soalan_id', '<>', ''],['is_deleted','0'],['status','2'],['j_dewan','2'],['kod_bahagian',$kod]]);

        //Perlukan Tindakan
        $bhg_Tindakan = SoalanParlimen::where([['soalan_id', '<>', ''],['is_deleted','0'],['status','1'],['kod_bahagian',$kod]]);

        // dd($bhg_Rakyat->count());
        return view('dashboard/utama', compact('dewanRakyat','dewanNegara','jumlah','belumAgih','belumJawab','telahJawab','bhg_Rakyat','bhg_Negara','bhg_Tindakan'));
    }

    public function logout()
    {
        Auth::logout();

        return view('logout');
    }
}
