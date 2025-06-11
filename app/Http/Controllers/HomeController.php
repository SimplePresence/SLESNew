<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\ReportSpx;
use Illuminate\Support\Str;
use App\Models\Spx;
use Carbon\Carbon;
use Exception;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Jakarta");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

public function index()
{
    $today = Carbon::today();

    $viewDataList = DB::table('psx_entry as p1')
        ->select('p1.sles_no', 'p1.no_pol', 'p1.in', 'p1.driver', 'p1.name_sup', 'p1.docking_time','p1.docking_location', 'p1.info_out', 'p1.out')
        ->where('p1.docking_stat', 'FINISHED')
        ->whereDate('p1.create_date', $today)
        ->whereRaw('p1.id = (SELECT MAX(p2.id) FROM psx_entry p2 WHERE p2.sles_no = p1.sles_no)')
        ->get();

    $waitingList = DB::table('psx_entry as p1')
        ->select('p1.sles_no', 'p1.no_pol', 'p1.in', 'p1.driver', 'p1.name_sup', 'p1.info_in')
        ->whereNull('p1.docking_time')
        ->whereDate('p1.create_date', $today)
        ->whereRaw('p1.id = (SELECT MAX(p2.id) FROM psx_entry p2 WHERE p2.sles_no = p1.sles_no)')
        ->get();

    $inDockList = DB::table('psx_entry as p1')
        ->select('p1.sles_no', 'p1.no_pol', 'p1.docking_location', 'p1.driver', 'p1.docking_stat', 'p1.docking_time', 'p1.name_sup')
        ->where('p1.docking_stat', 'INPROCESS')
        ->whereNotNull('p1.docking_location')
        ->whereNull('p1.out')
        ->whereRaw('p1.id = (SELECT MAX(p2.id) FROM psx_entry p2 WHERE p2.sles_no = p1.sles_no)')
        ->get();

    return view('psx_security.dashboard', [
        'waitingList' => $waitingList,
        'inDockList' => $inDockList,
        'viewDataList' => $viewDataList,
        'waitingForDocking' => $waitingList->count(),
        'totalViewData' => $viewDataList->count(),
        'currentlyInDock' => $inDockList->count()
    ]);
}

public function fetchDashboardData()
{
    $today = Carbon::today();

    $viewDataList = DB::table('psx_entry as p1')
        ->select('p1.sles_no', 'p1.no_pol', 'p1.in', 'p1.driver', 'p1.name_sup', 'p1.docking_time','p1.docking_location', 'p1.info_out', 'p1.out')
        ->where('p1.docking_stat', 'FINISHED')
        ->whereDate('p1.create_date', $today)
        ->whereRaw('p1.id = (SELECT MAX(p2.id) FROM psx_entry p2 WHERE p2.sles_no = p1.sles_no)')
        ->get();

    $waitingList = DB::table('psx_entry as p1')
        ->select('p1.sles_no', 'p1.no_pol', 'p1.in', 'p1.driver', 'p1.name_sup', 'p1.info_in')
        ->whereNull('p1.docking_time')
        ->whereDate('p1.create_date', $today)
        ->whereRaw('p1.id = (SELECT MAX(p2.id) FROM psx_entry p2 WHERE p2.sles_no = p1.sles_no)')
        ->get();

    $inDockList = DB::table('psx_entry as p1')
        ->select('p1.sles_no', 'p1.no_pol', 'p1.docking_location', 'p1.driver', 'p1.docking_stat', 'p1.docking_time', 'p1.name_sup')
        ->where('p1.docking_stat', 'INPROCESS')
        ->whereNotNull('p1.docking_location')
        ->whereNull('p1.out')
        ->whereRaw('p1.id = (SELECT MAX(p2.id) FROM psx_entry p2 WHERE p2.sles_no = p1.sles_no)')
        ->get();

    return response()->json([
    'waitingList' => $waitingList,
    'inDockList' => $inDockList,
    'viewDataList' => $viewDataList,
    'waitingCount' => $waitingList->count(),       // was waitingForDocking
    'totalViewCount' => $viewDataList->count(),    // was totalViewData
    'currentDockCount' => $inDockList->count(),    // was currentlyInDock
    ]);

}

    //create_in
    public function input_in()
    {
        return view('psx_security.create_in_psx.create_in');
    }

    public function input_in_datatables(Request $request)
    {
        if ($request->ajax()) {
            $getDate = Carbon::now()->format('Y-m-d');
            $data = DB::table('psx_entry')
                ->select(
                    DB::raw('MAX(id) as id'),
                    'sles_no',
                    DB::raw('MAX(name_sup) as name_sup'),
                    DB::raw('MAX(no_pol) as no_pol'),
                    DB::raw('MAX(driver) as driver'),
                    DB::raw('MAX(create_date) as create_date'),
                    DB::raw('MAX(`in`) as `in`'),
                    DB::raw('MAX(`out`) as `out`'),
                    DB::raw('MAX(info_in) as info_in'),
                    DB::raw('MAX(status_out) as status_out')
                )
                ->where('status', '=', 'ACTIVE')
                ->where('create_date', $getDate)
                ->groupBy('sles_no')
                ->orderBy(DB::raw('MAX(id)'), 'desc')
                ->limit(5000)
                ->get();

                return Datatables::of($data)
                ->editcolumn('info_in', function($data){
                    $dt = $data->info_in;
                    $info1 = 'BAWA BARANG';
                    $info2 = 'BAWA RAK BOX';
                    $info3 = 'KOSONG';
                    $info4 = 'TUKAR GULING';
                    $info5 = 'REVISI SJ';
                    $info6 = 'SJ SEMENTARA';
                    $info7 = 'SAMPLE';
                    if ($dt == '1') {
                        return "<button type='button' class='btn btn-xs btn-success' style='font-size: 11px;'>".$info1."</button>";
                    } else if ($dt == '2') {
                        return "<button type='button' class='btn btn-xs btn-warning' style='font-size: 11px;'>".$info2."</button>";
                    } else if ($dt == '3') {
                        return "<button type='button' class='btn btn-xs btn-danger' style='font-size: 11px;'>".$info3."</button>";
                    } else if ($dt == '4') {
                        return "<button type='button' class='btn btn-xs btn-info' style='font-size: 11px;'>".$info4."</button>";
                    } else if ($dt == '5') {
                        return "<button type='button' class='btn btn-xs btn-primary' style='font-size: 11px;'>".$info5."</button>";
                    } else if ($dt == '6') {
                        return "<button type='button' class='btn btn-xs btn-secondary' style='font-size: 11px;'>".$info6."</button>";
                    } else if ($dt == '7') {
                        return "<button type='button' class='btn btn-xs btn-dark' style='font-size: 11px;'>".$info7."</button>";
                    }
                })
                ->editColumn('action', function($data){
                    return view('psx_security.create_in_psx.action._action',[
                        'model' => $data,
                    ]);
                })
                ->rawColumns(['info_in'])
                ->make(true);
        }
    }

    public function GetSupplierList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('master_supplier')
                    ->where('status', 'ACTIVE')
                    ->get();
            return Datatables::of($data)->make(true);
        }
    }

    public function input_in_deleted($id)
    {
        $data = DB::table('psx_entry')->where('sles_no', '=', $id)->update([
            'status'=> 'NOT ACTIVE',
            'delete_date' => Carbon::now(),
            'delete_by' =>Str::upper(Auth::user()->name)
        ]);

        $updateFrom = DB::table('from_psx_list')->where('sles_no', '=', $id)->update([
            'status'=> 'NOT ACTIVE',
            'delete_date' => Carbon::now(),
            'delete_by' =>Str::upper(Auth::user()->name)
        ]);

        return response()->json([
            'success'=> true
        ]);
    }

    public function input_in_view($id)
    {
        $GetList = explode(',', $id);
        $sles_no = $GetList[0];
        $info_in = $GetList[1];

        $DataHeader = DB::table('psx_entry')
            ->leftJoin('from_psx_list', 'psx_entry.sles_no', '=', 'from_psx_list.sles_no')
            ->select(
                'psx_entry.id',
                'psx_entry.sles_no',
                'psx_entry.kd_sup',
                'psx_entry.name_sup',
                'psx_entry.no_pol',
                'psx_entry.driver',
                'psx_entry.create_date',
                DB::raw('psx_entry.`in` as `in`'),
                DB::raw('psx_entry.`out` as `out`'),
                'psx_entry.info_in',
                'psx_entry.total_time',
                'psx_entry.status_out',
                'psx_entry.ket',
                'from_psx_list.palet',
                'from_psx_list.rak',
                'from_psx_list.box'
            )
            ->where('psx_entry.status', '=', 'ACTIVE')
            ->where('psx_entry.sles_no', $sles_no)
            ->first();

        $DataDetail = DB::table('psx_entry')
                        ->where('sles_no', $sles_no)
                        ->where('status', 'ACTIVE')
                        ->get();

            $output = [
                'header' => $DataHeader,
                'detail' => $DataDetail,
                'info_in' => $info_in,
            ];

        // dd($output);

        return response()->json($output);
    }

    public function input_in_add_po(Request $request)
    {
        if ($request->ajax()) {
            if ($request->status_in_po == '1') {
                $rules = [
                    'no_pol_material_add'=> 'required',
                    'driver_material_add'=> 'required',
                    'rak_material_add' => 'required',
                    'bok_material_add' => 'required',
                    'palet_material_add' => 'required',
                    'no_po_add_material.*'=> 'required',
                    'status_po_add_material.*'=> 'required',
                    'kd_sup_add_material.*'=> 'required',
                    'nama_sup_add_material.*'=> 'required',
                    'no_sj_add_material.*'=> 'required',
                    'date_sj_add_material.*'=> 'required'
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                        return response()->json([
                            'error'=> $validator->errors()->all()
                        ]);
                    }

            } else if ($request->status_in_po == '5') {
                $rules = [
                    'no_pol_revisi_sj_add'=> 'required',
                    'driver_revisi_sj_add'=> 'required',
                    'rak_revisi_sj_add' => 'required',
                    'bok_revisi_sj_add' => 'required',
                    'palet_revisi_sj_add' => 'required',
                    'no_po_add_revisi_sj.*'=> 'required',
                    'status_po_add_revisi_sj.*'=> 'required',
                    'kd_sup_add_revisi_sj.*'=> 'required',
                    'nama_sup_add_revisi_sj.*'=> 'required',
                    'no_sj_add_revisi_sj.*'=> 'required',
                    'date_sj_add_revisi_sj.*'=> 'required'
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                        return response()->json([
                            'error'=> $validator->errors()->all()
                        ]);
                    }
            }

            // generate sles no
            $yearnow = Carbon::now()->format('y');
            $mountnow = Carbon::now()->format('m');
            $daynow = Carbon::now()->format('d');
            $now = $yearnow.$mountnow.$daynow;

            $getAutono = DB::table('psx_entry')
                ->select('sles_no')
                ->where('sles_no', 'LIKE', $now.'%' )
                ->orderBy('sles_no','DESC')
                ->limit(1)
                ->get();

            if ($getAutono->isEmpty()) {
                $substr = 0;
            } else {
                $substr = substr($getAutono[0]->sles_no,-3);
                //01
            }
            $checkRefNo =  (int)$substr + 1;
            $zeroAdd = str_pad($checkRefNo, 3,"0", STR_PAD_LEFT);
            $sles_no = $now. $zeroAdd;

            $status_in = $request->status_in_po;


            if ($status_in == '1') {
                $no_pol = $request->no_pol_material_add;
                $driver = $request->driver_material_add;
                $rak = $request->rak_material_add;
                $box = $request->bok_material_add;
                $palet = $request->palet_material_add;

                $no_po = $request->no_po_add_material;
                $status_po = $request->status_po_add_material;
                $kd_sup = $request->kd_sup_add_material;
                $nama_sup = $request->nama_sup_add_material;
                $no_sj = $request->no_sj_add_material;
                $date_sj = $request->date_sj_add_material;

            } else if ($status_in == '5') {
                $no_pol = $request->no_pol_revisi_sj_add;
                $driver = $request->driver_revisi_sj_add;
                $rak = $request->rak_revisi_sj_add;
                $box = $request->bok_revisi_sj_add;
                $palet = $request->palet_revisi_sj_add;

                $no_po = $request->no_po_add_revisi_sj;
                $status_po = $request->status_po_add_revisi_sj;
                $kd_sup = $request->kd_sup_add_revisi_sj;
                $nama_sup = $request->nama_sup_add_revisi_sj;
                $no_sj = $request->no_sj_add_revisi_sj;
                $date_sj = $request->date_sj_add_revisi_sj;

            }
            $ket = $request->ket_revisi_sj_add;

            $status_out = '0';
            $status = 'ACTIVE';
            $status_from = 'IN';
            $proccess = 'SUPPLIER';
            $time = Carbon::now()->format('H:i:s');

            if ($no_po != NULL) {
                $count = count($no_po);
                for ($i = 0; $i < $count; $i++) {
                    $data_push = array(
                        'sles_no'=> $sles_no,
                        'in'=> $time,
                        'ket' => $ket == NULL ? NULL : $ket,
                        'no_pol'=> Str::upper($no_pol),
                        'driver'=> Str::upper($driver),
                        'info_in'=> $status_in,
                        'status_out'=> $status_out,
                        'status'=> $status,
                        'create_date'=> Carbon::now()->format('Y-m-d'),
                        'create_by' =>  Str::upper(Auth::user()->name),
                        'no_po'=>$no_po[$i],
                        'status_po'=>$status_po[$i],
                        'kd_sup'=>$kd_sup[$i],
                        'name_sup'=>$nama_sup[$i],
                        'no_sj'=> Str::upper($no_sj[$i]),
                        'date_sj'=>$date_sj[$i],
                    );
                    // add sup in
                    $addData = DB::table('psx_entry')->insert([$data_push]);
                }

                // add rak bok
                $addDataBox= DB::table('from_psx_list')->insert([
                    'proccess' => $proccess,
                    'sles_no' => $sles_no,
                    'palet' => $palet,
                    'box' => $box,
                    'rak' => $rak,
                    'date' => Carbon::now()->format('Y-m-d'),
                    'time' => $time,
                    'status_from' => $status_from,
                    'status' => $status,
                    'create_by' => Str::upper(Auth::user()->name),
                    'create_date' => Carbon::now()
                ]);

                return response()->json([
                    'status' => true
                ]);

            } else {
                return response()->json([
                    'status'=> false
                ]);
            }
        }
    }

    public function input_in_add_non_po(Request $request)
    {
        if ($request->ajax()) {
            if ($request->status_in_non_po == '2') {
                $rules = [
                    'no_pol_rakbok_add'=> 'required',
                    'driver_rakbok_add'=> 'required',
                    'kd_sup_rakbok_add'=> 'required',
                    'nama_sup_rakbok_add'=> 'required',
                    'rak_rakbok_add' => 'required',
                    'bok_rakbok_add' => 'required',
                    'palet_rakbok_add' => 'required',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return response()->json([
                        'error'=> $validator->errors()->all()
                    ]);
                }

            } else if ($request->status_in_non_po == '3') {
                $rules = [
                    'no_pol_kosong_add'=> 'required',
                    'driver_kosong_add'=> 'required',
                    'kd_sup_kosong_add'=> 'required',
                    'nama_sup_kosong_add'=> 'required',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return response()->json([
                        'error'=> $validator->errors()->all()
                    ]);
                }

            } else if ($request->status_in_non_po == '4') {
                $rules = [
                    'no_pol_swapp_add'=> 'required',
                    'driver_swapp_add'=> 'required',
                    'kd_sup_swapp_add'=> 'required',
                    'nama_sup_swapp_add'=> 'required',
                    'rak_swapp_add' => 'required',
                    'bok_swapp_add' => 'required',
                    'palet_swapp_add' => 'required',
                    'no_sj_add_swapp_.*'=> 'required',
                    'date_sj_add_swapp_.*'=> 'required'
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return response()->json([
                        'error'=> $validator->errors()->all()
                    ]);
                }

            } else if ($request->status_in_non_po == '6') {
                $rules = [
                    'no_pol_sj_temporary_add'=> 'required',
                    'driver_sj_temporary_add'=> 'required',
                    'kd_sup_sj_temporary_add'=> 'required',
                    'nama_sup_sj_temporary_add'=> 'required',
                    'rak_sj_temporary_add' => 'required',
                    'bok_sj_temporary_add' => 'required',
                    'palet_sj_temporary_add' => 'required',
                    'ket_sj_temporary_add' => 'required',
                    'no_sj_add_temporary.*'=> 'required',
                    'date_sj_add_temporary.*'=> 'required'
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return response()->json([
                        'error'=> $validator->errors()->all()
                    ]);
                }

            } else if ($request->status_in_non_po == '7') {
                $rules = [
                    'no_pol_sample_add'=> 'required',
                    'driver_sample_add'=> 'required',
                    'kd_sup_sample_add'=> 'required',
                    'nama_sup_sample_add'=> 'required',
                    'ket_sj_sample_add'=> 'required',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return response()->json([
                        'error'=> $validator->errors()->all()
                    ]);
                }
            }

            // generate sles no
            $yearnow = Carbon::now()->format('y');
            $mountnow = Carbon::now()->format('m');
            $daynow = Carbon::now()->format('d');
            $now = $yearnow.$mountnow.$daynow;

            $getAutono = DB::table('psx_entry')
                ->select('sles_no')
                ->where('sles_no', 'LIKE', $now.'%' )
                ->orderBy('sles_no','DESC')
                ->limit(1)
                ->get();

            if ($getAutono->isEmpty()) {
                $substr = 0;
            } else {
                $substr = substr($getAutono[0]->sles_no,-3);
                //01
            }
            $checkRefNo =  (int)$substr + 1;
            $zeroAdd = str_pad($checkRefNo, 3,"0", STR_PAD_LEFT);
            $sles_no = $now. $zeroAdd;

            $status_in = $request->status_in_non_po;
            $status_out = '0';
            $status = 'ACTIVE';
            $status_from = 'IN';
            $proccess = 'SUPPLIER';
            $time = Carbon::now()->format('H:i:s');

            if ($status_in == '2' || $status_in == '3' || $status_in == '7' ) {

                $ket = NULL;
                if ($status_in == '2') {
                    $no_pol = $request->no_pol_rakbok_add;
                    $driver = $request->driver_rakbok_add;
                    $kd_sup = $request->kd_sup_rakbok_add;
                    $nama_sup = $request->nama_sup_rakbok_add;

                    $rak = $request->rak_rakbok_add;
                    $box = $request->bok_rakbok_add;
                    $palet = $request->palet_rakbok_add;

                } else if ($status_in == '3') {
                    $no_pol = $request->no_pol_kosong_add;
                    $driver = $request->driver_kosong_add;
                    $kd_sup = $request->kd_sup_kosong_add;
                    $nama_sup = $request->nama_sup_kosong_add;

                    $rak = NULL;
                    $box = NULL;
                    $palet = NULL;

                } else if ($status_in == '7') {
                    $no_pol = $request->no_pol_sample_add;
                    $driver = $request->driver_sample_add;
                    $kd_sup = $request->kd_sup_sample_add;
                    $nama_sup = $request->nama_sup_sample_add;
                    $ket = $request->ket_sj_sample_add;

                    $rak = NULL;
                    $box = NULL;
                    $palet = NULL;
                }


                // add sup in
                $addData= DB::table('psx_entry')->insert([
                    'sles_no'=> $sles_no,
                    'in'=> $time,
                    'ket' => $ket == NULL ? NULL : $ket,
                    'no_pol'=> Str::upper($no_pol),
                    'driver'=> Str::upper($driver),
                    'info_in'=> $status_in,
                    'status_out'=> $status_out,
                    'status'=> $status,
                    'create_date'=> Carbon::now()->format('Y-m-d'),
                    'create_by' =>  Str::upper(Auth::user()->name),
                    'kd_sup'=>$kd_sup,
                    'name_sup'=>$nama_sup,
                ]);

                if ($rak != null) {
                    // add rak bok
                    $addDataBox= DB::table('from_psx_list')->insert([
                        'proccess' => $proccess,
                        'sles_no' => $sles_no,
                        'palet' => $palet,
                        'box' => $box,
                        'rak' => $rak,
                        'date' => Carbon::now()->format('Y-m-d'),
                        'time' => $time,
                        'status_from' => $status_from,
                        'status' => $status,
                        'create_by' => Str::upper(Auth::user()->name),
                        'create_date' => Carbon::now()
                    ]);
                }

                return response()->json([
                    'status' => true
                ]);


            } else if ($status_in == '4' || $status_in == '6') {

                $ket = null;
                if ($status_in == '4') {
                    $no_pol = $request->no_pol_swapp_add;
                    $driver = $request->driver_swapp_add;
                    $kd_sup = $request->kd_sup_swapp_add;
                    $nama_sup = $request->nama_sup_swapp_add;

                    $rak = $request->rak_swapp_add;
                    $box = $request->bok_swapp_add;
                    $palet = $request->palet_swapp_add;

                    $no_sj = $request->no_sj_add_swapp_;
                    $date_sj = $request->date_sj_add_swapp_;

                } else if ($status_in == '6') {
                    $no_pol = $request->no_pol_sj_temporary_add;
                    $driver = $request->driver_sj_temporary_add;
                    $kd_sup = $request->kd_sup_sj_temporary_add;
                    $nama_sup = $request->nama_sup_sj_temporary_add;

                    $rak = $request->rak_sj_temporary_add;
                    $box = $request->bok_sj_temporary_add;
                    $palet = $request->palet_sj_temporary_add;

                    $no_sj = $request->no_sj_add_temporary;
                    $date_sj = $request->date_sj_add_temporary;
                    $ket = $request->ket_sj_temporary_add;
                }

                if ($no_sj != NULL) {
                    $count = count($no_sj);
                    for ($i = 0; $i < $count; $i++) {
                        $data_push = array(
                            'sles_no'=> $sles_no,
                            'in'=> $time,
                            'ket' => $ket == NULL ? NULL : $ket,
                            'no_pol'=> Str::upper($no_pol),
                            'driver'=> Str::upper($driver),
                            'info_in'=> $status_in,
                            'status_out'=> $status_out,
                            'status'=> $status,
                            'create_date'=> Carbon::now()->format('Y-m-d'),
                            'create_by' =>  Str::upper(Auth::user()->name),
                            'kd_sup'=>$kd_sup,
                            'name_sup'=>$nama_sup,
                            'no_sj'=> Str::upper($no_sj[$i]),
                            'date_sj'=>$date_sj[$i],
                        );
                        // add sup in
                        $addData = DB::table('psx_entry')->insert([$data_push]);
                    }

                    // add rak bok
                    $addDataBox= DB::table('from_psx_list')->insert([
                        'proccess' => $proccess,
                        'sles_no' => $sles_no,
                        'palet' => $palet,
                        'box' => $box,
                        'rak' => $rak,
                        'date' => Carbon::now()->format('Y-m-d'),
                        'time' => $time,
                        'status_from' => $status_from,
                        'status' => $status,
                        'create_by' => Str::upper(Auth::user()->name),
                        'create_date' => Carbon::now()
                    ]);

                    return response()->json([
                        'status' => true
                    ]);

                } else {
                    return response()->json([
                        'status'=> false
                    ]);
                }

            }

            return response()->json([
                'status' => true
            ]);
        }
    }

    public function input_docking()
    {
        return view('psx_security.create_docking_psx.docking_psx');
    }

public function getDockingData(Request $request)
{
    $subQuery = DB::table('psx_entry')
        ->select(DB::raw('MAX(id) as latest_id'))
        ->whereIn('docking_stat', ['UNFINISHED', 'INPROCESS'])
        ->groupBy('sles_no');

    $query = DB::table('psx_entry')
        ->joinSub($subQuery, 'latest_entries', function ($join) {
            $join->on('psx_entry.id', '=', 'latest_entries.latest_id');
        })
        ->orderByDesc('psx_entry.id')
        ->select(
            'psx_entry.id',
            'psx_entry.sles_no',
            'psx_entry.name_sup',
            'psx_entry.no_pol',
            'psx_entry.driver',
            'psx_entry.create_date',
            'psx_entry.in',
            'psx_entry.docking_time',
            'psx_entry.docking_stat',
            'psx_entry.docking_location'
        );

    return DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            $html = '<div class="dropdown">
                        <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">Assign Dock</button>
                        <div class="dropdown-menu">';
            for ($i = 1; $i <= 5; $i++) {
                $html .= '<a href="#" class="dropdown-item assign-docking-option" data-sles="' . $row->sles_no . '" data-dock="' . $i . '">Dock ' . $i . '</a>';
            }
            $html .= '</div></div>';
            return $html;
        })
        ->editColumn('docking_time', function ($row) {
            return $row->docking_time ? date('H:i:s', strtotime($row->docking_time)) : '-';
        })
        ->rawColumns(['action'])
        ->make(true);
}


public function assignDocking(Request $request)
{
    $request->validate([
        'sles_no' => 'required',
        'docking_location' => 'required'
    ]);

    $updated = DB::table('psx_entry')
        ->where('sles_no', $request->sles_no)
        ->update([
            'docking_time' => now()->format('H:i:s'),
            'docking_location' => $request->docking_location,
            'docking_stat' => 'INPROCESS',
        ]);

    return response()->json(['success' => $updated]);
}

public function getInprocessDockingData()
{
    return DB::table('psx_entry')
        ->where('docking_stat', 'INPROCESS')
        ->orderByDesc('id')
        ->get();
}


    //create_out
    public function input_out()
    {
        return view('psx_security.create_out_psx.create_out');
    }

    public function input_out_datatables(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('psx_entry')
                ->select(
                    DB::raw('MAX(id) as id'),
                    'sles_no',
                    DB::raw('MAX(name_sup) as name_sup'),
                    DB::raw('MAX(no_pol) as no_pol'),
                    DB::raw('MAX(driver) as driver'),
                    DB::raw('MAX(create_date) as create_date'),
                    DB::raw('MAX(`in`) as `in`'),
                    DB::raw('MAX(`out`) as `out`'),
                    DB::raw('MAX(info_in) as info_in'),
                    DB::raw('MAX(status_out) as status_out')
                )
                ->where('status', '=', 'ACTIVE')
                ->where('status_out', '=', '0')
                ->where('docking_stat', 'INPROCESS')
                ->groupBy('sles_no')
                ->orderBy(DB::raw('MAX(id)'), 'desc')
                ->limit(5000)
                ->get();

                return Datatables::of($data)
                ->editcolumn('info_in', function($data){
                    $dt = $data->info_in;
                    $info1 = 'BAWA BARANG';
                    $info2 = 'BAWA RAK BOX';
                    $info3 = 'KOSONG';
                    $info4 = 'TUKAR GULING';
                    $info5 = 'REVISI SJ';
                    $info6 = 'SJ SEMENTARA';
                    $info7 = 'SAMPLE';
                    if ($dt == '1') {
                        return "<button type='button' class='btn btn-xs btn-success' style='font-size: 11px;'>".$info1."</button>";
                    } else if ($dt == '2') {
                        return "<button type='button' class='btn btn-xs btn-warning' style='font-size: 11px;'>".$info2."</button>";
                    } else if ($dt == '3') {
                        return "<button type='button' class='btn btn-xs btn-danger' style='font-size: 11px;'>".$info3."</button>";
                    } else if ($dt == '4') {
                        return "<button type='button' class='btn btn-xs btn-info' style='font-size: 11px;'>".$info4."</button>";
                    } else if ($dt == '5') {
                        return "<button type='button' class='btn btn-xs btn-primary' style='font-size: 11px;'>".$info5."</button>";
                    } else if ($dt == '6') {
                        return "<button type='button' class='btn btn-xs btn-secondary' style='font-size: 11px;'>".$info6."</button>";
                    } else if ($dt == '7') {
                        return "<button type='button' class='btn btn-xs btn-dark' style='font-size: 11px;'>".$info7."</button>";
                    }
                })
                ->editColumn('action', function($data){
                    return view('psx_security.create_out_psx.action._action',[
                        'model' => $data,
                    ]);
                })
                ->rawColumns(['info_in'])
                ->make(true);
        }
    }

    public function out_add_material(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'rak_out_material' => 'required',
                'bok_out_material' => 'required',
                'palet_out_material' => 'required',
                'no_sj_out_material.*'=> 'required',
                'date_sj_out_material.*'=> 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                    return response()->json([
                        'error'=> $validator->errors()->all()
                    ]);
                }

            $sles_no = $request->sles_no_out_material;
            $no_pol = $request->no_pol_out_material;
            $nama_sup = $request->nama_sup_out_material;
            $rak = $request->rak_out_material;
            $box = $request->bok_out_material;
            $palet = $request->palet_out_material;

            $no_sj = $request->no_sj_out_material;
            $date_sj = $request->date_sj_out_material;

            $info_out = '1';
            $status_out = '1';
            $status = 'ACTIVE';
            $status_from = 'OUT';
            $proccess = 'SUPPLIER';
            $time = Carbon::now()->format('H:i:s');
            $dateNow = Carbon::now()->format('Y-m-d');

            // total time
            $TimesFinish = strtotime(Carbon::now()->format('Y-m-d H:i:s'));
            $TotalTime = 0;
            $getTime = DB::table('psx_entry')->where('sles_no', $sles_no)->first();
            $In = $getTime->in;
            $DateIn = $getTime->create_date;
            $TimeStart = strtotime($DateIn.' '.$In);

            $Total = $TimesFinish - $TimeStart;
            $TotalTime += $Total / 3600;
            $TotalTime = round($TotalTime, 2);

            if ($no_sj != NULL) {
                foreach ($request->input('no_sj_out_material') as $item => $value) {
                    $data_push = array(
                        'process' => $proccess,
                        'sles_no' => $sles_no,
                        'info_out' => $info_out,
                        'no_sj' => Str::upper($no_sj[$item]),
                        'date_sj' => $date_sj[$item],
                        'date_out' => $dateNow,
                        'out' => $time,
                        'status' => $status,
                        'create_by' => Str::upper(Auth::user()->name),
                        'create_date' => $dateNow
                    );
                    // add sup out
                    $addData = DB::table('psx_out_entry')->insert([$data_push]);
                }

                // update sup in
                $updateData = DB::table('psx_entry')->where('sles_no', $sles_no)->update([
                    'date_out' => $dateNow,
                    'out' => $time,
                    'info_out' => $info_out,
                    'status_out' => $status_out,
                    'total_time' => $TotalTime,
                    'docking_stat' => 'FINISHED'
                ]);

                // add rak bok
                $addDataBox= DB::table('from_psx_list')->insert([
                    'proccess' => $proccess,
                    'sles_no' => $sles_no,
                    'palet' => $palet,
                    'box' => $box,
                    'rak' => $rak,
                    'date' => $dateNow,
                    'time' => $time,
                    'status_from' => $status_from,
                    'status' => $status,
                    'create_by' => Str::upper(Auth::user()->name),
                    'create_date' => Carbon::now()
                ]);

                return response()->json([
                    'status' => true
                ]);

            } else {
                return response()->json([
                    'status'=> false
                ]);
            }
        }
    }

    public function out_add_rakbox(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'no_sj_out_rakbox' => 'required',
                'date_sj_out_rakbox' => 'required',
                'rak_out_rakbox' => 'required',
                'bok_out_rakbox' => 'required',
                'palet_out_rakbox' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                    return response()->json([
                        'error'=> $validator->errors()->all()
                    ]);
                }

            $sles_no = $request->sles_no_out_rakbox;
            $no_pol = $request->no_pol_out_rakbox;
            $nama_sup = $request->nama_sup_out_rakbox;
            $no_sj = $request->no_sj_out_rakbox;
            $date_sj = $request->date_sj_out_rakbox;
            $rak = $request->rak_out_rakbox;
            $box = $request->bok_out_rakbox;
            $palet = $request->palet_out_rakbox;

            $info_out = '2';
            $status_out = '1';
            $status = 'ACTIVE';
            $status_from = 'OUT';
            $proccess = 'SUPPLIER';
            $time = Carbon::now()->format('H:i:s');
            $dateNow = Carbon::now()->format('Y-m-d');

            // total time
            $TimesFinish = strtotime(Carbon::now()->format('Y-m-d H:i:s'));
            $TotalTime = 0;
            $getTime = DB::table('psx_entry')->where('sles_no', $sles_no)->first();
            $In = $getTime->in;
            $DateIn = $getTime->create_date;
            $TimeStart = strtotime($DateIn.' '.$In);

            $Total = $TimesFinish - $TimeStart;
            $TotalTime += $Total / 3600;
            $TotalTime = round($TotalTime, 2);

            // add sup out
            $addData = DB::table('psx_out_entry')->insert([
                'process' => $proccess,
                'sles_no' => $sles_no,
                'info_out' => $info_out,
                'no_sj' => Str::upper($no_sj),
                'date_sj' => $date_sj,
                'date_out' => $dateNow,
                'out' => $time,
                'status' => $status,
                'create_by' => Str::upper(Auth::user()->name),
                'create_date' => $dateNow
            ]);

            // update sup in
            $updateData = DB::table('psx_entry')->where('sles_no', $sles_no)->update([
                'date_out' => $dateNow,
                'out' => $time,
                'info_out' => $info_out,
                'status_out' => $status_out,
                'total_time' => $TotalTime,
                'docking_stat' => 'FINISHED'
            ]);

            // add rak bok
            $addDataBox= DB::table('from_psx_list')->insert([
                'proccess' => $proccess,
                'sles_no' => $sles_no,
                'palet' => $palet,
                'box' => $box,
                'rak' => $rak,
                'date' => $dateNow,
                'time' => $time,
                'status_from' => $status_from,
                'status' => $status,
                'create_by' => Str::upper(Auth::user()->name),
                'create_date' => Carbon::now()
            ]);

            return response()->json([
                'status' => true
            ]);

        }
    }

    public function out_add_kosong($id)
    {
        $info_out = '3';
        $status_out = '1';
        $status = 'ACTIVE';
        $status_from = 'OUT';
        $proccess = 'SUPPLIER';
        $time = Carbon::now()->format('H:i:s');
        $dateNow = Carbon::now()->format('Y-m-d');

        // total time
        $sles_no = $id;
        $TimesFinish = strtotime(Carbon::now()->format('Y-m-d H:i:s'));
        $TotalTime = 0;
        $getTime = DB::table('psx_entry')->where('sles_no', $sles_no)->first();
        $In = $getTime->in;
        $DateIn = $getTime->create_date;
        $TimeStart = strtotime($DateIn.' '.$In);

        $Total = $TimesFinish - $TimeStart;
        $TotalTime += $Total / 3600;
        $TotalTime = round($TotalTime, 2);

        // update sup in
        $updateData = DB::table('psx_entry')->where('sles_no', $sles_no)->update([
            'date_out' => $dateNow,
            'out' => $time,
            'info_out' => $info_out,
            'status_out' => $status_out,
            'total_time' => $TotalTime,
            'docking_stat' => 'FINISHED'
        ]);

        // add sup out
        $addData = DB::table('psx_out_entry')->insert([
            'process' => $proccess,
            'sles_no' => $sles_no,
            'info_out' => $info_out,
            // 'no_sj' => $no_sj,
            // 'date_sj' => $date_sj,
            'date_out' => $dateNow,
            'out' => $time,
            'status' => $status,
            'create_by' => Str::upper(Auth::user()->name),
            'create_date' => $dateNow
        ]);

        return response()->json([
            'success'=> true
        ]);
    }

    // View Data
    public function view_data()
    {
        $getDate1 = Carbon::now()->format('Y-m-d');
        return view('psx_security.view_psx.view', compact('getDate1'));
    }

    public function view_datatable(Request $request)
    {

        if ($request->ajax()) {
            $data = Spx::select(
                DB::raw('MAX(id) as id'),
                'sles_no',
                DB::raw('MAX(name_sup) as name_sup'),
                DB::raw('MAX(create_date) as create_date'),
                DB::raw('MAX(no_pol) as no_pol'),
                DB::raw('MAX(driver) as driver'),
                DB::raw('MAX(`in`) as in_time'),
                DB::raw('MAX(docking_time) as docking_time'), 
                DB::raw('MAX(docking_location) as docking_location'),
                DB::raw('MAX(`out`) as out_time'),
                DB::raw('MAX(info_in) as info_in'),
                DB::raw('MAX(info_out) as info_out'),
                DB::raw('MAX(status) as status')
                
            )
            ->where('status', 'ACTIVE')
            ->where(function ($query) {
                $query->whereNull('docking_time')
                    ->orWhereNull('docking_location')
                    ->orWhereNull('out');
            })
            ->groupBy('sles_no')
            ->orderBy(DB::raw('MAX(id)'), 'desc')
            ->limit(6000)
            ->get();


            return Datatables::of($data)
                ->editColumn('info_in', function($data) {
                    $info_labels = [
                        '1' => ['BAWA BARANG', 'success'],
                        '2' => ['BAWA RAK BOX', 'warning'],
                        '3' => ['KOSONG', 'danger'],
                        '4' => ['TUKAR GULING', 'info'],
                        '5' => ['REVISI SJ', 'primary'],
                        '6' => ['SJ SEMENTARA', 'secondary'],
                        '7' => ['SAMPLE', 'dark']
                    ];
                    return isset($info_labels[$data->info_in]) ?
                        "<button type='button' class='btn btn-xs btn-{$info_labels[$data->info_in][1]}' style='font-size: 11px;'>".
                        "{$info_labels[$data->info_in][0]}</button>" : '';
                })
                ->editColumn('info_out', function($data) {
                    $info_labels = [
                        '1' => ['BAWA BARANG', 'success'],
                        '2' => ['BAWA RAK BOX', 'warning'],
                        '3' => ['KOSONG', 'danger']
                    ];
                    return isset($info_labels[$data->info_out]) ?
                        "<button type='button' class='btn btn-xs btn-{$info_labels[$data->info_out][1]}' style='font-size: 11px;'>".
                        "{$info_labels[$data->info_out][0]}</button>" : '';
                })
                ->editColumn('action', function($data) {
                    return view('psx_security.view_psx.action._action', ['model' => $data]);
                })
                ->rawColumns(['info_in', 'info_out'])
                ->make(true);
        }
    }

    public function view_datatable_filter(Request $request, $id)
    {
        if ($request->ajax()) {

            if ($id == 'OK') {
                $data = Spx::
                    select(
                        DB::raw('MAX(id) as id'),
                        'sles_no',
                        DB::raw('MAX(name_sup) as name_sup'),
                        DB::raw('MAX(create_date) as create_date'),
                        DB::raw('MAX(no_pol) as no_pol'),
                        DB::raw('MAX(driver) as driver'),
                        DB::raw('MAX(`in`) as in_time'),
                        DB::raw('MAX(docking_time) as docking_time'), 
                        DB::raw('MAX(docking_location) as docking_location'),
                        DB::raw('MAX(`out`) as out_time'),
                        DB::raw('MAX(info_in) as info_in'),
                        DB::raw('MAX(info_out) as info_out'),
                        DB::raw('MAX(status) as status')
                    )
                    ->where('status', 'ACTIVE')
                    ->groupBy('sles_no')
                    ->orderBy(DB::raw('MAX(id)'), 'desc')
                    ->limit(6000)
                    ->get();

            } else {

                $date = explode(',', $id);
                $date1 = $date[0];
                $date2 = $date[1];

                $data = Spx::
                    select(
                        DB::raw('MAX(id) as id'),
                        'sles_no',
                        DB::raw('MAX(name_sup) as name_sup'),
                        DB::raw('MAX(create_date) as create_date'),
                        DB::raw('MAX(no_pol) as no_pol'),
                        DB::raw('MAX(driver) as driver'),
                        DB::raw('MAX(`in`) as in_time'),
                        DB::raw('MAX(docking_time) as docking_time'), 
                        DB::raw('MAX(docking_location) as docking_location'),
                        DB::raw('MAX(`out`) as out_time'),
                        DB::raw('MAX(info_in) as info_in'),
                        DB::raw('MAX(info_out) as info_out'),
                        DB::raw('MAX(status) as status')
                    )
                    ->where('status', 'ACTIVE')
                    ->whereBetween('psx_entry.create_date',[$date1, $date2])
                    ->groupBy('sles_no')
                    ->orderBy(DB::raw('MAX(id)'), 'desc')
                    ->get();
            }

            return Datatables::of($data)
                ->editColumn('info_in', function($data) {
                    $info_labels = [
                        '1' => ['BAWA BARANG', 'success'],
                        '2' => ['BAWA RAK BOX', 'warning'],
                        '3' => ['KOSONG', 'danger'],
                        '4' => ['TUKAR GULING', 'info'],
                        '5' => ['REVISI SJ', 'primary'],
                        '6' => ['SJ SEMENTARA', 'secondary'],
                        '7' => ['SAMPLE', 'dark']
                    ];
                    return isset($info_labels[$data->info_in]) ?
                        "<button type='button' class='btn btn-xs btn-{$info_labels[$data->info_in][1]}' style='font-size: 11px;'>".
                        "{$info_labels[$data->info_in][0]}</button>" : '';
                })
                ->editColumn('info_out', function($data) {
                    $info_labels = [
                        '1' => ['BAWA BARANG', 'success'],
                        '2' => ['BAWA RAK BOX', 'warning'],
                        '3' => ['KOSONG', 'danger']
                    ];
                    return isset($info_labels[$data->info_out]) ?
                        "<button type='button' class='btn btn-xs btn-{$info_labels[$data->info_out][1]}' style='font-size: 11px;'>".
                        "{$info_labels[$data->info_out][0]}</button>" : '';
                })
                ->editColumn('action', function($data) {
                    return view('psx_security.view_psx.action._action', ['model' => $data]);
                })
                ->rawColumns(['info_in', 'info_out'])
                ->make(true);

        }
    }

    public function view_viewAll(Request $request, $id)
    {
        $GetList = explode(',', $id);
        $sles_no = $GetList[0];
        $info_in = $GetList[1];
        $info_out = $GetList[2];

        $DataHeaderIn = DB::table('psx_entry')
            ->leftJoin('from_psx_list', 'psx_entry.sles_no', '=', 'from_psx_list.sles_no')
            ->select(
                'psx_entry.id',
                'psx_entry.sles_no',
                'psx_entry.kd_sup',
                'psx_entry.name_sup',
                'psx_entry.no_pol',
                'psx_entry.driver',
                'psx_entry.create_date',
                DB::raw('psx_entry.`in` as `in`'),
                'psx_entry.docking_time',
                'psx_entry.docking_location',
                DB::raw('psx_entry.`out` as `out`'),
                'psx_entry.info_in',
                'psx_entry.total_time',
                'psx_entry.status_out',
                'psx_entry.ket',
                'from_psx_list.palet',
                'from_psx_list.rak',
                'from_psx_list.box'
            )
            ->where('psx_entry.status', '=', 'ACTIVE')
            ->where('psx_entry.sles_no', $sles_no)
            ->first();

        $DataDetailIn = DB::table('psx_entry')
            ->where('sles_no', $sles_no)
            ->where('status', 'ACTIVE')
            ->get();

        $DataHeaderOut = DB::table('psx_out_entry')
            ->leftJoin('from_psx_list', 'psx_out_entry.sles_no', '=', 'from_psx_list.sles_no')
            ->select(
                'psx_out_entry.id',
                'psx_out_entry.sles_no',
                'psx_out_entry.info_out',
                'psx_out_entry.no_sj',
                'psx_out_entry.date_sj',
                'psx_out_entry.date_out',
                'psx_out_entry.create_date',
                DB::raw('psx_out_entry.`out` as `out`'),
                'from_psx_list.palet',
                'from_psx_list.rak',
                'from_psx_list.box'
            )
            ->where('psx_out_entry.status', '=', 'ACTIVE')
            ->where('psx_out_entry.sles_no', $sles_no)
            ->first();

        $DataDetailOut = DB::table('psx_out_entry')
            ->where('sles_no', $sles_no)
            ->where('status', 'ACTIVE')
            ->get();

        if ($DataDetailOut->isEmpty())
        {
            $output = [
                'headerIn' => $DataHeaderIn,
                'detailIn' => $DataDetailIn,
                // 'headerOut' => $DataHeaderOut,
                // 'detailout' => $DataDetailOut,
                'info_in' => $info_in,
                'info_out' => $info_out,
            ];
        } else {
            $output = [
                'headerIn' => $DataHeaderIn,
                'detailIn' => $DataDetailIn,
                'headerOut' => $DataHeaderOut,
                'detailout' => $DataDetailOut,
                'info_in' => $info_in,
                'info_out' => $info_out,
            ];

        }
            return response()->json($output);
    }


    public function view_delete($id)
    {
        $data = DB::table('psx_entry')->where('sles_no', '=', $id)->update([
            'status'=> 'NOT ACTIVE',
            'delete_date' => Carbon::now(),
            'delete_by' =>Str::upper(Auth::user()->name)
        ]);

        return response()->json([
            'success'=> true
        ]);
    }

    public function view_edit_material($id)
    {
        $GetList = explode(',', $id);
        $sles_no = $GetList[0];
        $info_out = $GetList[1];

        $DataHeader = DB::table('psx_entry')
            ->leftJoin('from_psx_list', 'psx_entry.sles_no', '=', 'from_psx_list.sles_no')
            ->select(
                'psx_entry.id',
                'psx_entry.sles_no',
                'psx_entry.kd_sup',
                'psx_entry.name_sup',
                'psx_entry.no_pol',
                'psx_entry.driver',
                'psx_entry.create_date',
                DB::raw('psx_entry.`in` as `in`'),
                DB::raw('psx_entry.`docking_time` as `docking_time`'),
                'psx_entry.docking_location',
                DB::raw('psx_entry.`out` as `out`'),
                'psx_entry.info_in',
                'psx_entry.total_time',
                'psx_entry.status_out',
                'from_psx_list.palet',
                'from_psx_list.rak',
                'from_psx_list.box'
            )
            ->where('psx_entry.status', '=', 'ACTIVE')
            ->where('psx_entry.sles_no', $sles_no)
            ->first();

        $DataDetail = DB::table('psx_out_entry')
                        ->where('sles_no', $sles_no)
                        ->where('status', 'ACTIVE')
                        ->get();

            $output = [
                'header' => $DataHeader,
                'detail' => $DataDetail,
                'info_out' => $info_out,
            ];

        return response()->json($output);
    }

    public function view_edit_material_submit(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'no_sj_view_edit_material.*'=> 'required',
                'date_view_edit_material.*'=> 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                    return response()->json([
                        'error'=> $validator->errors()->all()
                    ]);
                }

            $Req_sles_no = $request->sles_no_view_edit_material;
            $Req_no_sj = $request->no_sj_view_edit_material;
            $Req_date = $request->date_view_edit_material;
            // get data
            $GetData = DB::table('psx_out_entry')->where('sles_no', $Req_sles_no)->first();

            $process = $GetData->process;
            $sles_no = $GetData->sles_no;
            $info_out = $GetData->info_out;
            $date_out = $GetData->date_out;
            $out = $GetData->out;
            $status = $GetData->status;
            $create_by = $GetData->create_by;
            $create_date = $GetData->create_date;
            $update_by = Str::upper(Auth::user()->name);
            $update_date = Carbon::now();

            try {

                if ($Req_no_sj != NULL) {
                    // deleted
                    $deleted = DB::table('psx_out_entry')->where('sles_no', $Req_sles_no)->delete();

                    foreach ($request->input('no_sj_view_edit_material') as $item => $value) {
                        $data_push = array(
                            'process' => $process,
                            'sles_no' => $Req_sles_no,
                            'info_out' => $info_out,
                            'no_sj' => Str::upper($Req_no_sj[$item]),
                            'date_sj' => $Req_date[$item],
                            'date_out' => $date_out,
                            'out' => $out,
                            'status' => $status,
                            'create_by' => $create_by,
                            'create_date' => $create_date,
                            'update_by' => $update_by,
                            'delete_date' => $update_date,
                        );
                        // add sup in new
                        $addData = DB::table('psx_out_entry')->insert([$data_push]);
                    }

                    return response()->json([
                        'status' => true
                    ]);

                } else {
                    return response()->json([
                        'status'=> false
                    ]);
                }

            } catch (Exception $ex) {
                return response()->json([
                    'error'=> true,
                    'data' => 'Prosess Error...',
                ]);
            }

        }
    }


    public function view_printExcel($id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $date = explode('_', $id);
        $from_date = $date[0];
        $to_date = $date[1];


        $data = DB::table('psx_entry')->whereBetween('create_date',[$from_date, $to_date])
            ->where('status', '=', 'ACTIVE')
            ->where('status_out', '=', '1')
            ->where('delete_date', '=', NULL)
            ->get();


        if($data->isEmpty()) {
            return response()->json(['status' => 100, 'message' => 'Data Kosong!!']);
        } else {
            return response()->json(['data' => $id, 'status' => 200]);
        }

    }

    public function printExcel($from_date, $to_date)
    {

        if (ob_get_level() > 0) {
            ob_end_clean();
        }

        return Excel::download(new ReportSpx($from_date, $to_date), 'List_SLES_'.$from_date . '_To_' . $to_date . '.xlsx');
    }

}
