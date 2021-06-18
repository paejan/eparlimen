<?php

namespace App\Http\Controllers;

use App\Kakitangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $rsData = Auth::user();
        // dd($rsData);

        return view('user/profile',compact('rsData'));
    }

    public function password()
    {
        $rsData = Auth::user();
        
        return view('user/password',compact('rsData'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        if($request->type == 'profile'){
            $data = array('jawatan_kakitangan'=>$request->jawatan_kakitangan,'no_telefon'=>$request->no_telefon,'no_hp'=>$request->no_hp,'email'=>$request->email);
            Kakitangan::find($request->id)->update($data);
        } else if($request->type == 'pass'){
            Kakitangan::find($request->id)->update(['pass'=>md5($request->password1)]);
        }

    }
}
