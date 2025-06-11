<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;
use App\Services\Helper;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function login()
    {
        if(session('key') == null || session('name') == null || session('role') == null){
            session()->put('name','');
            session()->put('role','');
            session()->put('key','');
            return view('auth.login');
        }
        return redirect()->back();
    }

    public function authenticate(Request $request){
        $request->validate([
            'nik' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        $key = "sls";
        $password = md5($request->password);
        $nik = $request->nik;
        $check = User::
            where('nik',$nik)
            ->where('password',$password)
            ->first();

        if($check){
            if($check->role == 'admin' || $check->role == 'user'){
                Auth::login($check);

                $key = md5("sls");
                $request->session()->put('name',$check->name);
                $request->session()->put('role',$check->role);
                $request->session()->put('key',$key);
                if($check->role == 'admin'){
                    return redirect()->intended('home');
                }
                return redirect()->intended('home');
            }
        }
        return back()->withErrors([
            'nik' => 'Akun tidak ditemukan!!',
        ])->onlyInput('nik');
    }

    public function logout(){
        Auth::logout();

        session()->put('name','');
        session()->put('role','');
        session()->put('key','');
        return view('auth.login');
    }
}
