@extends('layouts.masterHome')

@section('title', 'Check Data SJ - SLES')

@section('css')
<link rel="stylesheet" href="{{ asset('Datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('page-title')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Check Data SJ</h4>
                    {{-- <ul class="breadcrumbs pull-left">
                        <li><span>Dashboard</span></li>
                    </ul> --}}
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
    <div id="div-sticky"></div>
    <div id="sticky-div"></div>
    <!-- page title area end -->
@endsection

@section('content')

<div class="row">
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <table id="data_check_sj" class="table table-striped table-hover" width="100%">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>KD DELIVERY</th>
                            <th>NO SJ</th>
                            <th>TANGGAL</th>
                            <th>JAM</th>
                            <th>CUSTOMER</th>
                            <th>ID DO</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="body_item" style="font-size: 13px; text-align: center;"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalCheckSJ" tabindex="-1" role="dialog" aria-labelledby="modalCheckSJLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCheckSJLabel">Data Check SJ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCheckSJ">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Kd Delivery / No Sj</label>
              <input type="text" class="form-control" id="modal_kd_delivery" disabled>
            </div>
            <div class="form-group col-md-6">
              <label>&nbsp;</label>
              <input type="text" class="form-control" id="modal_no_sj" disabled>
            </div>

            <div class="form-group col-md-6">
              <label>Date / Time</label>
              <input type="text" class="form-control" id="modal_date" disabled>
            </div>
            <div class="form-group col-md-6">
              <label>&nbsp;</label>
              <input type="text" class="form-control" id="modal_time" disabled>
            </div>

            <div class="form-group col-md-3">
              <label>Customer / Id Do</label>
              <input type="text" class="form-control" id="modal_id_do" disabled>
            </div>
            <div class="form-group col-md-7">
              <label>&nbsp;</label>
              <input type="text" class="form-control" id="modal_to_cus" disabled>
            </div>
            <div class="form-group col-md-2">
              <label>&nbsp;</label>
              <input type="text" class="form-control" id="modal_type_do" disabled>
            </div>

            <div class="form-group col-md-12">
              <label>Jenis Kendaraan</label>
              <input type="text" class="form-control" id="modal_jenis_kendaraan" disabled>
            </div>

            <div class="form-group col-md-12">
              <label>Keterangan</label>
              <textarea class="form-control" id="modal_keterangan" disabled></textarea>
            </div>

            <div class="form-group col-md-6">
              <label>Start Loading</label>
              <input type="text" class="form-control" id="modal_start_loading" disabled>
            </div>
            <div class="form-group col-md-6">
              <label>Start Delivery</label>
              <input type="text" class="form-control" id="modal_start_delivery" disabled>
            </div>

            <div class="form-group col-md-6">
              <label>Finish Loading</label>
              <input type="text" class="form-control" id="modal_finish_loading" disabled>
            </div>
            <div class="form-group col-md-6">
              <label>Finish Delivery</label>
              <input type="text" class="form-control" id="modal_finish_delivery" disabled>
            </div>

            <div class="form-group col-md-6">
              <label>Loading Time / H</label>
              <input type="text" class="form-control" id="modal_loading_time" disabled>
            </div>
            <div class="form-group col-md-6">
              <label>Delivery Time / H</label>
              <input type="text" class="form-control" id="modal_delivery_time" disabled>
            </div>

            <div class="form-group col-md-6">
              <label>Security Check</label>
              <input type="text" class="form-control" id="modal_security_check" disabled>
            </div>
            <div class="form-group col-md-6">
              <label>Total Time All / H</label>
              <input type="text" class="form-control" id="modal_total_time" disabled>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
<script src="{{ asset('Datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
$(document).ready(function () {
    // Set CSRF token for all requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    // Initialize DataTable
    $('#data_check_sj').DataTable({
        processing: true,
        serverSide: false,
        ajax: '{{ route('home.getdatasj') }}',
        columns: [
            { data: null, render: (data, type, row, meta) => meta.row + 1 },
            { data: 'kd_delivery' },
            { data: 'no_sj' },
            { data: 'date' },
            { data: 'time' },
            { data: 'to_cus' },
            { data: 'id_do' },
            { data: 'status_list_all' },
            {
                data: null,
                render: function (data, type, row) {
                    const dropdown = `
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                <i class="fa fa-search"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item btn-view" href="#" data-id="${row.kd_delivery}">View</a>
                                ${row.status_list_all !== 'READY' ? `<a class="dropdown-item btn-finish" href="#" style="color:red" data-id="${row.kd_delivery}">READY</a>` : ''}
                            </div>
                        </div>
                    `;
                    return dropdown;
                }
            }
        ]
    });

    // Handle READY button click
    $(document).on('click', '.btn-finish', function (e) {
        e.preventDefault();
        const id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "This will mark status as READY.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value === true) {
                $.ajax({
                    url: `/checksj/ready/${id}/delivery`,
                    type: 'POST',
                    success: function (response) {
                        if (response.success) {
                            Swal.fire(
                                'Updated!',
                                'The status has been marked as READY.',
                                'success'
                            );
                            $('#data_check_sj').DataTable().ajax.reload(null, false);
                        } else {
                            Swal.fire(
                                'Failed',
                                'Status update failed.',
                                'error'
                            );
                        }
                    },
                    error: function (xhr) {
                        console.error('AJAX ERROR:', xhr.status, xhr.responseText);
                        Swal.fire(
                            'Error',
                            'An error occurred while updating status.',
                            'error'
                        );
                    }
                });
            }
        });
    });

    // Handle VIEW button click
    $(document).on('click', '.btn-view', function () {
        const id = $(this).data('id');
        $.get(`/checksj/view/${id}`, function (data) {
            $('#modal_kd_delivery').val(data.kd_delivery || '');
            $('#modal_no_sj').val(data.do_no || '');
            $('#modal_date').val(data.date || '');
            $('#modal_time').val(data.time || '');
            $('#modal_id_do').val(data.id_cus || '');
            $('#modal_to_cus').val(data.to_cus || '');
            $('#modal_type_do').val(data.id_do || '');
            $('#modal_jenis_kendaraan').val(data.jenis_vehicle || '');
            $('#modal_keterangan').val(data.keterangan || '');
            $('#modal_start_loading').val(data.time_start_loading || '');
            $('#modal_finish_loading').val(data.time_finish_loading || '');
            $('#modal_start_delivery').val(data.time_ready || '');
            $('#modal_finish_delivery').val(data.time_delivery || '');
            $('#modal_loading_time').val(data.total_loading || '');
            $('#modal_delivery_time').val(data.total_delivery || '');
            $('#modal_security_check').val(data.status_list_all || '');
            $('#modal_total_time').val(data.total_all || '');

            $('#modalCheckSJ').modal('show');
        });
    });

});
</script>

@endpush
