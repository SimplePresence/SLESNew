<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\ReportSpx;
use Illuminate\Support\Str;
use App\Models\Spx;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;


class MasterDataController extends Controller
{

    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
    }

    public function view_data()
    {
        $getDate1 = Carbon::now()->format('Y-m-d');
        return view('psx_security.master_psx.master_user.index', compact('getDate1'));
    }

    public function view_datatable(Request $request)
    {
        $data = DB::table('users')->get();

        // return Datatables::of($data)->make(true);

        return Datatables::of($data)
        ->editColumn('action', function($data){
            return view('psx_security.master_psx.master_user.action.action', [
                'model' => $data,
            ]);
        })
        ->rawColumns(['action','file'])
        ->make(true);
    }

    public function addDAtaUser(Request $request)
    {
        //cek data nik
        date_default_timezone_set("Asia/Jakarta");
        $cek_data = DB::table('users')->where('nik','=', $request->nik)->first();
        $getDate = Carbon::now()->format('Y-m-d');

        if ($request->role == 1) {
            $role_ = 'admin';
        } else {
            $role_ = 'user';
        }

        if (!empty($cek_data)) {
            return response()->json([
                'msg'=>'ada'
            ]);
        } else {
            $data = DB::table('users')->insert([
                'name' => $request->nama,
                'email'=> $request->email,
                'pass_list'=> $request->password,
                'password'=> md5($request->password),
                'nik'=> $request->nik,
                'is_admin'=> $request->role,
                'role'=> $role_,
                'created_at'=> $getDate,
            ]);

            return response()->json([
                'msg'=> true
            ]);
        }
    }

    public function deleteDAtaUser($id)
    {
        $data = DB::table('users')->where('id', '=', $id)->delete();

        return response()->json([
            'success'=> true
        ]);
    }

    public function editDataUser($id)
    {
        $user = DB::table('users')->where('id','=', $id)->first();

        return response()->json($user);
    }

    public function updateDataUser(Request $request, $id)
    {
        if ($request->role == 1) {
            $role_ = 'admin';
        } else {
            $role_ = 'user';
        }

        $getDate = Carbon::now()->format('Y-m-d');
        $data = DB::table('users')
            ->where('id', '=', $id)
            ->update([
                'name' => $request->nama,
                'email'=> $request->email,
                'pass_list'=> $request->password,
                'password'=> md5($request->password),
                'nik'=> $request->nik,
                'is_admin'=> $request->role,
                'role'=> $role_,
                'updated_at'=> $getDate,
            ]);

        return response()->json([
            'msg'=>true
        ]);
    }

}

