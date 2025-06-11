@extends('layouts.masterHome')

@section('title', 'Dashboard - SLES')

@section('page-title')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard Overview</h4>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ asset('srtdash/images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

@php
    $infoMap = [
        '1' => ['label' => 'BAWA BARANG', 'class' => 'btn-success'],
        '2' => ['label' => 'BAWA RAK BOX', 'class' => 'btn-warning'],
        '3' => ['label' => 'KOSONG', 'class' => 'btn-danger'],
        '4' => ['label' => 'TUKAR GULING', 'class' => 'btn-info'],
        '5' => ['label' => 'REVISI SJ', 'class' => 'btn-primary'],
        '6' => ['label' => 'SJ SEMENTARA', 'class' => 'btn-secondary'],
        '7' => ['label' => 'SAMPLE', 'class' => 'btn-dark'],
    ];
@endphp

<div class="main-content-inner mt-4">
    <div class="row">

        <div class="col-12 text-center mb-4">
            <h5><span id="real-time-clock" style="font-weight: bold; font-size: 25px"></span></h5>
        </div>

        {{-- Waiting for Docking --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow py-3 px-4 bg-primary text-white">
                <h5 class="text-center" id="waiting-count">Waiting for Docking : {{ $waitingForDocking }}</h5>
            </div>
            <div class="card mt-2 shadow">
                <div class="card-body p-0">
                    <div style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-striped mb-0" style="width: 100%;">
                            <thead class="thead-dark" style="text-align: center; position: sticky; top: 0;">
                                <tr>
                                    <th>SLES No</th>
                                    <th>Supplier</th>
                                    <th>No. Polisi</th>
                                    <th>Driver</th>
                                    <th>In</th>
                                    <th>In Info</th>
                                </tr>
                            </thead>
                            <tbody id="waiting-table-body" style="text-align: center;">
                                @foreach ($waitingList as $item)
                                    @php
                                        $infoIn = $infoMap[$item->info_in] ?? ['label' => 'UNKNOWN', 'class' => 'btn-light'];
                                    @endphp
                                    <tr>
                                        <td>{{ $item->sles_no }}</td>
                                        <td>{{ $item->name_sup }}</td>
                                        <td>{{ $item->no_pol }}</td>
                                        <td>{{ $item->driver }}</td>
                                        <td>{{ $item->in }}</td>
                                        <td><span class="btn btn-sm {{ $infoIn['class'] }}">{{ $infoIn['label'] }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total View Data (Today) --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow py-3 px-4 bg-secondary text-white">
                <h5 class="text-center" id="total-view-count">Total View Data (Today) : {{ $totalViewData }}</h5>
            </div>
            <div class="card mt-2 shadow">
                <div class="card-body p-0">
                    <div style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-striped mb-0" style="width: 100%;">
                            <thead class="thead-dark" style="text-align: center; position: sticky; top: 0;">
                                <tr>
                                    <th>SLES No</th>
                                    <th>No. Polisi</th>
                                    <th>Driver</th>
                                    <th>Docking Location</th>
                                    <th>Out Time</th>
                                    <th>Out Info</th>
                                </tr>
                            </thead>
                            <tbody id="viewdata-table-body" style="text-align: center;">
                                @foreach ($viewDataList as $item)
                                    @php
                                        $infoOut = $infoMap[$item->info_out] ?? ['label' => 'UNKNOWN', 'class' => 'btn-light'];
                                    @endphp
                                    <tr>
                                        <td>{{ $item->sles_no }}</td>
                                        <td>{{ $item->no_pol }}</td>
                                        <td>{{ $item->driver }}</td>
                                        <td>{{ $item->docking_location }}</td>
                                        <td>{{ $item->out }}</td>
                                        <td><span class="btn btn-sm {{ $infoOut['class'] }}">{{ $infoOut['label'] }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Docking Cards --}}
        <div class="container mt-5 px-3 d-flex justify-content-center">
            <div class="d-flex flex-nowrap overflow-auto dock-scroll-row" id="dock-cards-container" style="gap: 1rem;">
                @php
                    $dockingStatusMap = [];
                    foreach ($inDockList as $dock) {
                        $dockingStatusMap[$dock->docking_location] = $dock;
                    }
                @endphp

                @for ($i = 1; $i <= 5; $i++)
                    @php
                        $isOccupied = isset($dockingStatusMap[$i]);
                        $dockData = $isOccupied ? $dockingStatusMap[$i] : null;
                        $bgColor = $isOccupied ? '#ffc107' : '#28a745';
                        $textColor = $isOccupied ? 'black' : 'white';
                        $statusText = $isOccupied 
                            ? "
                            SLES: {$dockData->sles_no}<br>
                            NO POL: {$dockData->no_pol}<br>
                            DRIVER: {$dockData->driver}<br>
                            SUP: {$dockData->name_sup}<br>
                            <span class=\"elapsed-time\" data-dock=\"{$i}\" data-docking-time=\"{$dockData->docking_time}\" style=\"display:block; margin-top:5px;'\">ELAPSED TIME: --</span>"
                            : "Status: Available";
                    @endphp
                    <div id="dock-{{ $i }}" style="border-radius: 50%" class="dock-card" data-dock="{{ $i }}">
                        <div class="card shadow-sm border h-100" style="background-color: {{ $bgColor }}; width: 15vw; border-radius: 15%;">
                            <div class="card-header bg-light border-bottom" style="height: fit-content;">
                                <h4 class="card-title mb-0 text-center">Docking {{ $i }}</h4>
                            </div>
                            <div class="card-body">
                                <strong>
                                    <p class="card-text status-text" style="color: {{ $textColor }}">{!! $statusText !!}</p>
                                </strong>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div id="loading-spinner" style="
            display:none;
            position: fixed;
            top:0; left:0; right:0; bottom:0;
            background: rgba(255,255,255,0.7);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        ">
            <div class="spinner-border text-primary" role="status" style="width: 4rem; height:4rem;">
                <span class="sr-only">Loading...</span>
            </div>
        </div>


    </div>
</div>

{{-- Real-time Clock --}}
<script>
    function updateClock() {
        const now = new Date();
        const timeStr = now.toLocaleTimeString();
        document.getElementById('real-time-clock').textContent = timeStr;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script>
    const infoMap = @json($infoMap);

    // Render waiting table rows
    function renderWaitingTable(waitingList) {
        const tbody = $('#waiting-table-body');
        tbody.empty();
        waitingList.forEach(item => {
            const info = infoMap[item.info_in] || {label: 'UNKNOWN', class: 'btn-light'};
            tbody.append(`
                <tr>
                    <td>${item.sles_no}</td>
                    <td>${item.name_sup}</td>
                    <td>${item.no_pol}</td>
                    <td>${item.driver}</td>
                    <td>${item.in}</td>
                    <td><span class="btn btn-sm ${info.class}">${info.label}</span></td>
                </tr>
            `);
        });
    }

    // Render view data table rows
    function renderViewDataTable(viewDataList) {
        const tbody = $('#viewdata-table-body');
        tbody.empty();
        viewDataList.forEach(item => {
            const info = infoMap[item.info_out] || {label: 'UNKNOWN', class: 'btn-light'};
            tbody.append(`
                <tr>
                    <td>${item.sles_no}</td>
                    <td>${item.no_pol}</td>
                    <td>${item.driver}</td>
                    <td>${item.docking_location}</td>
                    <td>${item.out}</td>
                    <td><span class="btn btn-sm ${info.class}">${info.label}</span></td>
                </tr>
            `);
        });
    }

    // Render docking cards
    function renderDockCards(inDockList) {
        // Create a map dockLocation => data for easier lookup
        const dockingStatusMap = {};
        inDockList.forEach(dock => {
            dockingStatusMap[dock.docking_location] = dock;
        });

        for(let i = 1; i <= 5; i++) {
            const dockData = dockingStatusMap[i];
            const dockCard = $(`#dock-${i} .card`);
            const statusTextP = $(`#dock-${i} .status-text`);
            if(dockData) {
                dockCard.css('background-color', '#ffc107');
                statusTextP.css('color', 'black');
                statusTextP.html(
                    `
                    SLES: ${dockData.sles_no}<br>
                    NO POL: ${dockData.no_pol}<br>
                    DRIVER: ${dockData.driver}<br>
                    SUP: ${dockData.name_sup}<br>
                    <span class="elapsed-time" data-dock="${i}" data-docking-time="${dockData.docking_time}" style="display:block; margin-top:5px;">ELAPSED TIME: --</span>`
                );
            } else {
                dockCard.css('background-color', '#28a745');
                statusTextP.css('color', 'white');
                statusTextP.html('Status: Available');
            }
        }
    }

    // Update elapsed time for docking cards
    function updateElapsedTimes() {
            $('.elapsed-time').each(function () {
                const $el = $(this);
                const timeOnly = $el.data('docking-time');
                if (!timeOnly) {
                    $el.text('ELAPSED TIME: --');
                    return;
                }

                const today = moment().format("YYYY-MM-DD");
                const fullDateTime = `${today} ${timeOnly}`;

                let start = moment(fullDateTime, "YYYY-MM-DD HH:mm:ss", true);
                if (!start.isValid()) {
                    start = moment(timeOnly, "HH:mm:ss", true);
                    if (start.isValid()) {
                        start.set({
                            'year': moment().year(),
                            'month': moment().month(),
                            'date': moment().date()
                        });
                    } else {
                        $el.text('ELAPSED TIME: Invalid time');
                        return;
                    }
                }

                const now = moment();
                const duration = moment.duration(now.diff(start));

                if (duration.asMilliseconds() < 0) {
                    $el.text('ELAPSED TIME: 0h 0m');
                    return;
                }

                const hours = Math.floor(duration.asHours());
                const minutes = duration.minutes();
                $el.text(`ELAPSED TIME: ${hours}h ${minutes}m`);
            });
        }


    // AJAX to get fresh dashboard data every 15 seconds
    function refreshDashboardData() {
        $('#loading-spinner').show();  // Show spinner when AJAX starts
        $.ajax({
            url: '/dashboard/data', // <-- make sure this endpoint returns JSON with keys: waitingList, waitingCount, viewDataList, totalViewCount, inDockList
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Update waiting count and table
                $('#waiting-count').text(`Waiting for Docking : ${data.waitingCount}`);
                renderWaitingTable(data.waitingList);

                // Update total view count and table
                $('#total-view-count').text(`Total View Data (Today) : ${data.totalViewCount}`);
                renderViewDataTable(data.viewDataList);

                // Update docking cards
                renderDockCards(data.inDockList);

                // Immediately update elapsed times after data refresh
                updateElapsedTimes();
            },
            error: function() {
                console.error('Failed to fetch dashboard data.');
            },
            complete: function() {
                $('#loading-spinner').hide();  // Hide spinner regardless of success or error
            }
        });
    }


    $(document).ready(function(){
        // Initial elapsed time update every 1 minute
        updateElapsedTimes();
        setInterval(updateElapsedTimes, 60000);

        // Refresh dashboard data every 15 seconds
        refreshDashboardData();
        setInterval(refreshDashboardData, 15000);
    });
</script>

@endsection
