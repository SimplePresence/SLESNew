<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report SLES</title>
</head>
<body>
    <table>
        <tr>
            <td colspan="6" style="font-size:15px;"><b>Report SLES</b></td>
        </tr>
        <tr>
            <td colspan="6">Date : {{$from_date.' to '.$to_date}}</td>
        </tr>
        <tr>
            <td colspan="9">Info Out : 1 = BAWA BARANG, 2 = BAWA RAK BOX, 3 = KOSONG, 4 = TUKAR GULING, 5 = REVISI SJ, 6 = SJ SEMENTARA, 7 = SAMPLE</td>
        </tr>
    </table>

    <table>
        <tr style="height: 21px;">
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;No</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Sles No</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Code No</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Nama Supplier</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;No Pol</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Driver   </th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Info In</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;No Sj</th>
            {{-- <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Date In</th> --}}
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;In</th>
            {{-- <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Date Out</th> --}}
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Docking Time</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Docking Location</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Out</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Info Out</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Total Time / H</th>
            {{-- <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Status Box</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Box</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Rak</th>
            <th style="font-size: 11px; font-weight: bold; background-color: #C4D7B2; text-align:center; vertical-align: middle;">&nbsp;Palet</th> --}}
        </tr>
        {{-- @foreach($data as $a => $b)
        @php
            $list_count = ($b['list_count']);
        @endphp
        @if($list_count > 0)
            @foreach($b['from_psx_list'] as $index => $list)
                <tr>
                    @if($index == 0)
                        <td style="font-size: 11px; vertical-align: middle; text-align:center;" rowspan="{{ $list_count }}">{{ $loop->parent->iteration }}</td>
                        <td style="font-size: 11px; vertical-align: middle; text-align:center;" rowspan="{{ $list_count }}">{{ $b['sles_no'] }}</td>
                        <td style="font-size: 11px; vertical-align: middle; text-align:left;" rowspan="{{ $list_count }}">{{ $b['name_sup'] }}</td>
                        <td style="font-size: 11px; vertical-align: middle; text-align:left;" rowspan="{{ $list_count }}">{{ $b['no_pol'] }}</td>
                        <td style="font-size: 11px; vertical-align: middle; text-align:left;" rowspan="{{ $list_count }}">{{ $b['driver'] }}</td>
                        <td style="font-size: 11px; vertical-align: middle; text-align:center;" rowspan="{{ $list_count }}">{{ $b['info_in'] }}</td>
                        <td style="font-size: 11px; vertical-align: middle;" rowspan="{{ $list_count }}">{{ \Carbon\Carbon::parse($b['create_date'])->format('d/m/Y') }}</td>
                        <td style="font-size: 11px; vertical-align: middle; text-align:center;" rowspan="{{ $list_count }}">{{ $b['in'] }}</td>
                        <td style="font-size: 11px; vertical-align: middle; text-align:center;" rowspan="{{ $list_count }}">{{ $b['out'] }}</td>
                        <td style="font-size: 11px; vertical-align: middle; text-align:center;" rowspan="{{ $list_count }}">{{ $b['total_time'] }}</td>
                        <td style="font-size: 11px; vertical-align: middle; text-align:center;" rowspan="{{ $list_count }}">{{ $b['info_out'] }}</td>
                    @endif
                    <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $list['status_from'] }}</td>
                    <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $list['box'] }}</td>
                    <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $list['rak'] }}</td>
                    <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $list['palet'] }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $loop->iteration }}</td>
                <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $b['sles_no'] }}</td>
                <td style="font-size: 11px; vertical-align: middle; text-align:left;">{{ $b['name_sup'] }}</td>
                <td style="font-size: 11px; vertical-align: middle; text-align:left;">{{ $b['no_pol'] }}</td>
                <td style="font-size: 11px; vertical-align: middle; text-align:left;">{{ $b['driver'] }}</td>
                <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $b['info_in'] }}</td>
                <td style="font-size: 11px; vertical-align: middle;">{{ \Carbon\Carbon::parse($b['create_date'])->format('d/m/Y') }}</td>
                <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $b['in'] }}</td>
                <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $b['out'] }}</td>
                <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $b['total_time'] }}</td>
                <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $b['info_out'] }}</td>
                <td colspan="4" style="font-size: 11px; vertical-align: middle; text-align:center;"> - </td>
            </tr>
        @endif
    @endforeach --}}

@foreach($data as $a => $b)
    <tr>
        <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $loop->iteration }}</td>
        <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $b->sles_no }}</td>
        <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $b->kd_sup }}</td>
        <td style="font-size: 11px; vertical-align: middle; text-align:left;">{{ $b->name_sup }}</td>
        <td style="font-size: 11px; vertical-align: middle; text-align:left;">{{ $b->no_pol }}</td>
        <td style="font-size: 11px; vertical-align: middle; text-align:left;">{{ $b->driver }}</td>
        <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $b->info_in }}</td>
        <td style="font-size: 11px; vertical-align: middle; text-align:left;">{{ $b->no_sj }}</td>
        <td style="font-size: 11px; vertical-align: middle;">
            {{ \Carbon\Carbon::parse($b->create_date)->format('d/m/Y') }} {{ $b->in }}
        </td>

        {{-- Docking time and location (between in and out) --}}
        <td style="font-size: 11px; vertical-align: middle;">
            @if($b->docking_time)
                {{ \Carbon\Carbon::parse($b->docking_time)->format('d/m/Y H:i:s') }}
            @else
                -
            @endif
        </td>
        <td style="font-size: 11px; vertical-align: middle; text-align:center;">
            {{ $b->docking_location ?? '-' }}
        </td>

        <td style="font-size: 11px; vertical-align: middle;">
            {{ \Carbon\Carbon::parse($b->date_out)->format('d/m/Y') }} {{ $b->out }}
        </td>
        <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $b->info_out }}</td>
        <td style="font-size: 11px; vertical-align: middle; text-align:center;">{{ $b->total_time }}</td>
    </tr>
@endforeach





    </table>
</body>
</html>

