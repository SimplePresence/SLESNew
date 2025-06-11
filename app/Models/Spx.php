<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Spx extends Model
{
    protected $table = 'psx_entry';
    protected $fillable = [
        'id','sles_no','no_po','status_po',
        'kd_sup','name_sup','in','ket','date_out',
        'out','total_time','no_sj','date_sj',
        'no_pol','driver', 'info_in', 'info_out',
        'status_out','status', 'create_by', 'create_date',
        'update_by','update_date', 'delete_by', 'delete_date'
    ];

    protected $primarykey = 'id';
    public $timestamps = false;

    public function GetDataSpx()
    {
        $getData =  Spx::select(
            DB::raw('MAX(id) as id'),
            'sles_no',
            DB::raw('MAX(name_sup) as name_sup'),
            DB::raw('MAX(create_date) as create_date'),
            DB::raw('MAX(no_pol) as no_pol'),
            DB::raw('MAX(driver) as driver'),
            DB::raw('MAX(`in`) as in_time'),
            DB::raw('MAX(`out`) as out_time'),
            DB::raw('MAX(info_in) as info_in'),
            DB::raw('MAX(info_out) as info_out'),
            DB::raw('MAX(status) as status')
        )
        ->where('status', 'ACTIVE')
        ->groupBy('sles_no')
        ->orderBy(DB::raw('MAX(id)'), 'desc')
        ->orderBy(DB::raw('MAX(id)'), 'desc')
        ->limit(6000)
        ->get();

        return $getData;
    }



}
