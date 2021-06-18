<?php

namespace App\Http\Controllers\Jawapan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArkibController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('soalan.perbahasan.index', compact('usermenu', 'sidang', 'ahli', 'kategori', 'sub', 'bahagian'));
    }
}
