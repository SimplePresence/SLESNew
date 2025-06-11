<?php

namespace App\Exports;

use App\Models\Spx;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportSpx implements FromView, ShouldAutoSize
{
    protected $from_date;
    protected $to_date;

    function __construct($from_date, $to_date)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function view(): view
    {
        $data = Spx::whereBetween('create_date', [$this->from_date, $this->to_date])
            ->where('status', '=', 'ACTIVE')
            ->where('status_out', '=', '1')
            ->whereNull('delete_date')
            ->orderBy('sles_no', 'ASC')
            ->get();

        //     $mergedData = [];

        //     foreach ($data as $row) {
        //     $sles_no = $row->sles_no;

        //     if (!isset($mergedData[$sles_no])) {
        //         $mergedData[$sles_no] = [
        //             'id' => $row->id,
        //             'sles_no' => $row->sles_no,
        //             'name_sup' => $row->name_sup,
        //             'no_pol' => $row->no_pol,
        //             'driver' => $row->driver,
        //             'create_date' => $row->create_date,
        //             'in' => $row->in,
        //             'out' => $row->out,
        //             'info_in' => $row->info_in,
        //             'info_out' => $row->info_out,
        //             'total_time' => $row->total_time,
        //             'status_out' => $row->status_out,
        //             'from_psx_list' => [],
        //             'list_count' => 0
        //         ];
        //     }
        // }

        // $result = array_values($mergedData);

        // foreach ($result as &$row) {
        //     $sles_noGet = $row['sles_no'];
        //     $DataOut = DB::table('from_psx_list')->where('sles_no', $sles_noGet)->get();

        //     foreach ($DataOut as $outRow1) {
        //         $row['from_psx_list'][] = [
        //             'palet' => $outRow1->palet,
        //             'box' => $outRow1->box,
        //             'rak' => $outRow1->rak,
        //             'status_from' => $outRow1->status_from
        //         ];
        //         $row['list_count']++;
        //     }
        // }

        // dd($data);

        return view('psx_security.view_psx.report.report_excel', [
            'data' => $data,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date
        ]);
    }
}
