<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\KodDewan;

class LoginController extends Controller
{
    public function index()
    {
        $kod = KodDewan::get();
        // dd($kod);
        return view('index', compact('kod'));
    }

    public function auth(Request $request)
    {
        // dd($request);

        // dd(md5($request ->pass));
        $credentials = $request->only('userid', 'password');
        // dd($credentials['pass']);
        
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $deleted = Auth::user()->is_delete;
            $status = Auth::user()->status;
            
            // dd($deleted);

            if($deleted == 0 && $status == 0){
                return response()->json('OK');
            }
            else
            {
                return response()->json('XADA');
            }
        }
        else {
            return response()->json('XADA');
        }
    }
    
}
