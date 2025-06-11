<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DataSJ extends Controller
{
    // Show the main Data SJ page
    public function dataSjIndex() 
    {
        return view('psx_security.data_check_sj.view_data_check_sj');
    }

    // Return Data for DataTables
    public function getdataSj()
    {
        $data = DB::table('master_delivery_tbl as md')
            ->leftJoin('jadwal_to_cus_tbl as jt', 'md.kd_delivery', '=', 'jt.kd_delivery')
            ->select(
                'md.kd_delivery',
                'md.status_list_all',
                'md.do_no as no_sj',     // Now using do_no as no_sj
                'jt.date',
                'jt.time',
                'jt.to_cus',
                'jt.id_do'
            )
            ->whereIn('md.status_list_all', ['FINISH_LOADING', 'READY'])
            ->whereIn('md.status', ['ACTIVE'])
            ->get();

        return response()->json(['data' => $data]);
    }

    public function CheckSjView(Request $request, $id) // $id is actually kd_delivery
{
    $data = DB::table('jadwal_to_cus_tbl as a')
        ->leftJoin('master_delivery_tbl as b', 'a.kd_delivery', '=', 'b.kd_delivery')
        ->where('a.status', 'ACTIVE')
        ->where('a.kd_delivery', $id) // 🔁 change this
        ->select(
            'a.id',
            'a.kd_delivery',
            'a.do_no',
            'a.date',
            'a.time',
            'a.id_cus',
            'a.to_cus',
            'a.id_do',
            'a.jenis_vehicle',
            'a.keterangan',
            'b.id_start_number',
            'b.time_start_loading',
            'b.time_finish_loading',
            'b.time_ready',
            'b.time_delivery',
            'b.time_finish',
            'b.total_loading',
            'b.total_delivery',
            'b.total_all',
            'b.status_list_all'
        )
        ->first();

    return response()->json($data);
}

    public function CheckSjReadyDelivery(Request $request, $id)
    {
        $get_data = DB::table('jadwal_to_cus_tbl')->where('kd_delivery', $id)->first();
        $do_no = $get_data->do_no;
        $data = DB::table('master_delivery_tbl')
                ->where('kd_delivery', $id)
                ->update([
                    'do_no' => $do_no,
                    'status_ready' => '1',
                    'status_list_all' => 'READY',
                    'time_ready' => Carbon::now(),
                ]);

        return response()->json([
            'success'=> true
        ]);
    }
}
