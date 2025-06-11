@extends('layouts.masterHome')

@section('title', 'Supplier Docking - SLES')

@section('css')
<link rel="stylesheet" href="{{ asset('Datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/docking.css') }}">
@endsection

@section('page-title')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Docking Station</h4>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <table id="tbl_cerate_out_psx" class="table table-striped table-hover" width="100%">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Sles No</th>
                            <th>Nama Supplier</th>
                            <th>No Pol</th>
                            <th>Driver</th>
                            <th>Date</th>
                            <th>In</th>
                            <th>Docking Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="body_item" style="font-size: 13px; text-align: center;"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Docking Station Cards -->
<div class="container mt-5 px-6">
    <div class="row justify-content-center">
        @for ($i = 1; $i <= 5; $i++)
            <div id="dock-{{ $i }}" class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                <div class="card shadow-sm border w-100" data-dock="{{ $i }}" style="background-color: #28a745;">
                    <div class="card-header bg-light border-bottom">
                        <h4 class="card-title mb-0" style="font-size: 20px">Docking {{ $i }}</h4>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <p class="card-text status-text" style="color: white">Status: Available</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection


@push('js')
<script src="{{ asset('Datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
$(document).ready(function () {
    const table = $('#tbl_cerate_out_psx').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route("docking.data") }}',
            method: 'GET'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'sles_no', name: 'sles_no' },
            { data: 'name_sup', name: 'name_sup' },
            { data: 'no_pol', name: 'no_pol' },
            { data: 'driver', name: 'driver' },
            { data: 'create_date', name: 'create_date' },
            { data: 'in', name: 'in' },
            { data: 'docking_time', name: 'docking_time' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        drawCallback: function (settings) {
    // Reset all dock cards
    for (let i = 1; i <= 5; i++) {
        const dockCard = $(`#dock-${i} .card`);
        dockCard.css('background-color', '#28a745');
        dockCard.find('.status-text').html('<strong>Status: Available</strong>');
    }

    const data = table.rows().data();
    const usedDocks = [];
    let elapsedTimers = {};

    function updateElapsedTime(dock, timeOnly) {
        const target = $(`#dock-${dock} .elapsed-time`);
        if (!timeOnly) {
            target.text(`ELAPSED TIME: --`);
            return;
        }

        const today = moment().format("YYYY-MM-DD");
        const fullDateTime = `${today} ${timeOnly}`;
        const start = moment(fullDateTime, "YYYY-MM-DD HH:mm:ss");

        if (!start.isValid() || moment().diff(start) < 0) {
            target.text(`ELAPSED TIME: 0h 0m`);
            return;
        }

        const duration = moment.duration(moment().diff(start));
        const hours = Math.floor(duration.asHours());
        const minutes = duration.minutes();

        target.text(`ELAPSED TIME: ${hours}h ${minutes}m`);
    }

    // Update docking cards and track used docks
    data.each(function (row, index) {
        if (row.docking_stat === 'INPROCESS') {
            const dock = row.docking_location;
            const dockCard = $(`#dock-${dock} .card`);
            dockCard.css('background-color', '#ffc107');
            dockCard.find('.status-text').html(
                `<strong>SLES: ${row.sles_no}</strong><br>` +
                `<strong>NO POL: ${row.no_pol}</strong><br>` +
                `<strong>SUP: ${row.name_sup}</strong><br>` +
                `<strong>DRIVER: ${row.driver}</strong><br>` +
                `<strong><span class="elapsed-time" style="display: block; margin-top: 5px;">ELAPSED TIME: --</span></strong>`
            );

            if (elapsedTimers[dock]) {
                clearInterval(elapsedTimers[dock]);
            }

            updateElapsedTime(dock, row.docking_time);
            elapsedTimers[dock] = setInterval(() => {
                updateElapsedTime(dock, row.docking_time);
            }, 60000);

            usedDocks.push(Number(dock));
        }
    });

    // Disable assign docking for used docks
    $('.assign-docking-option').each(function () {
        const dock = Number($(this).data('dock'));
        if (usedDocks.includes(dock)) {
            $(this).addClass('disabled text-muted').css('pointer-events', 'none');
        } else {
            $(this).removeClass('disabled text-muted').css('pointer-events', '');
        }
    });

    // ✅ Hide rows with INPROCESS status from the table
    $('#tbl_cerate_out_psx tbody tr').each(function () {
        const rowData = table.row(this).data();
        if (rowData && rowData.docking_stat === 'INPROCESS') {
            $(this).remove();  // or use .hide() if you prefer to keep them in DOM
        }
    });
}


    });

    // Handle docking assignment
    $(document).on('click', '.assign-docking-option', function (e) {
        e.preventDefault();
        const sles_no = $(this).data('sles');
        const dock = $(this).data('dock');

        const dockCard = $(`#dock-${dock} .card`);
        const statusText = dockCard.find('.status-text').text().trim();

        if (!statusText.includes('Available')) {
            alert(`Dock ${dock} is currently in use.`);
            return;
        }

        // Change UI state immediately
        dockCard.css('background-color', '#ffc107');
        dockCard.find('.status-text').text(`Status: In Progress - ${sles_no}`);

        // Send update to server
        $.ajax({
            url: '/home/docking/assign',
            method: 'POST',
            data: {
                sles_no: sles_no,
                docking_location: dock,
                _token: '{{ csrf_token() }}'
            },
            success: function () {
                alert(`SLES ${sles_no} assigned to Dock ${dock}`);
                table.ajax.reload(null, false);
            },
            error: function () {
                alert("Failed to assign docking");
            }
        });
    });
});
</script>
@endpush
