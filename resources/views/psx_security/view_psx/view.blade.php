@extends('layouts.masterHome')

@section('title', 'View - SLES')

@section('css')
<!-- DATATABLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('Datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"  type="text/css" href="{{asset('datetimepicker/css/bootstrap-datetimepicker.css')}}"/>
<script src="{{asset('datetimepicker/js/jquery.min.js')}}"></script>
<script src="{{asset('datetimepicker/js/moment.min.js')}}"></script>
<script src="{{asset('datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
@endsection

@section('page-title')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">View Data</h4>
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
<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="#">
                <div class="form-row">
                    <div class="col-1 mb-1"></div>
                    <div class="col-1 mb-1">
                        <input class="form-control form-control-sm" type="text" name="date_filter" id="date_filter">
                    </div>
                    <p> s/d </p>
                    <div class="col-1 mb-1">
                        <input class="form-control form-control-sm" type="text" name="date_filter1" id="date_filter1">
                    </div>
                    <div class="col-4 mb-1">
                        <button type="button" onclick="filter_cek()" class="btn btn-info" id="filter_id">
                            <i class="ti-paint-roller"></i>&nbsp;Filter
                        </button>
                        &nbsp;
                        <button type="button" onclick="filter_delete()" class="btn btn-info" id="filter_id_delete">
                            <i class="ti-eye"></i>&nbsp;View All
                        </button>
                        &nbsp;

                        @if(Auth::user()->is_admin == 1)

                        <button type="button" onclick="print_excel()" class="btn btn-info">
                            <i class="ti-receipt"></i>&nbsp;Print Excel
                        </button>

                        @endif

                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="datatable datatable-primary">
                                <div class="table-responsive">
                                    <table id="tbl_view_psx" class="table table-striped table-hover" width="100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="10%">Sles No</th>
                                                <th width="25%">Nama Supplier</th>
                                                <th width="10%">Date</th>
                                                <th width="10%">No Pol</th>
                                                <th width="10%">Driver</th>
                                                <th width="5%">In</th>
                                                <th width="10%">Docking Time</th>
                                                <th width="10%">Docking Location</th>
                                                <th width="5%">Out</th>
                                                <th width="10%">Info In</th>
                                                <th width="10%">Info Out</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_item" style="font-size: 12px;">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
@include('psx_security.view_psx.modal.edit_material')
@include('psx_security.view_psx.modal.view_data_all')


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#date_filter").datetimepicker({
        date: moment(),
        format: "YYYY-MM-DD",
        useCurrent: true
    });
    $("#date_filter1").datetimepicker({
        date: moment(),
        format: "YYYY-MM-DD",
        useCurrent: true
    });
    $("#date_sj_view").datetimepicker({
        date: moment(),
        format: "YYYY-MM-DD",
        useCurrent: true
    });

// bikin table
    $(document).ready(function() {
        //get data from datatables
        var tableView = $('#tbl_view_psx').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('home.view.view') }}",
            },
            "oLanguage": {
            "sSearch": "Filter Data"
            },
           "columnDefs": [
                {
                    "targets": [0, 1, 3, 5, 8, 9, 10],
                  "className": "text-center"
                }
            ],
            order: [[ 1, 'desc'],[ 3, 'desc']],
            responsive: true,
            paging: true,
            "bFilter": true,
            columns: [
                {data: 'no',
                name: 'id',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
                },
                { data: 'sles_no', name: 'sles_no' },
                { data: 'name_sup', name: 'name_sup' },
                { data: 'create_date', name: 'create_date' },
                { data: 'no_pol', name: 'no_pol' },
                { data: 'driver', name: 'driver' },
                { data: 'in_time', name: 'in_time' },
                { data: 'docking_time', name: 'docking_time' },
                { data: 'docking_location', name: 'docking_location' },
                { data: 'out_time', name: 'out_time' },
                { data: 'info_in', name: 'info_in' },
                { data: 'info_out', name: 'info_out' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

    function filter_cek(){
        var date = $('#date_filter').val();
        var date1 = $('#date_filter1').val();
            data = ([date,date1]);
            route = "{{ route('home.view.filter', ':id') }}";
        route  = route.replace(':id', data);
        $('#tbl_view_psx').DataTable().clear().destroy();
        var table = $('#tbl_view_psx').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: route,
            },
            "oLanguage": {
            "sSearch": "Filter Data"
            },
           "columnDefs": [
                {
                    "targets": [0, 1, 3, 5, 8, 9, 10],
                  "className": "text-center"
                }
            ],
            order: [[ 1, 'desc'],[ 3, 'desc']],
            responsive: true,
            paging: true,
            "bFilter": true,
            columns: [
                {data: 'no',
                name: 'id',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
                },
                { data: 'sles_no', name: 'sles_no' },
                { data: 'name_sup', name: 'name_sup' },
                { data: 'create_date', name: 'create_date' },
                { data: 'no_pol', name: 'no_pol' },
                { data: 'driver', name: 'driver' },
                { data: 'in_time', name: 'in_time' },
                { data: 'docking_time', name: 'docking_time' },
                { data: 'docking_location', name: 'docking_location' },
                { data: 'out_time', name: 'out_time' },
                { data: 'info_in', name: 'info_in' },
                { data: 'info_out', name: 'info_out' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    }

    function filter_delete(){
        var date = 'OK';
            route = "{{ route('home.view.filter', ':id') }}";
        route  = route.replace(':id', date);
        $('#tbl_view_psx').DataTable().clear().destroy();
        var table = $('#tbl_view_psx').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: route,
            },
            "oLanguage": {
            "sSearch": "Filter Data"
            },
           "columnDefs": [
                {
                    "targets": [0, 1, 3, 5, 8, 9, 10],
                  "className": "text-center"
                }
            ],
            order: [[ 1, 'desc'],[ 3, 'desc']],
            responsive: true,
            paging: true,
            "bFilter": true,
            columns: [
                {data: 'no',
                name: 'id',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
                },
                { data: 'sles_no', name: 'sles_no' },
                { data: 'name_sup', name: 'name_sup' },
                { data: 'create_date', name: 'create_date' },
                { data: 'no_pol', name: 'no_pol' },
                { data: 'driver', name: 'driver' },
                { data: 'in_time', name: 'in_time' },
                { data: 'docking_time', name: 'docking_time' },
                { data: 'docking_location', name: 'docking_location' },
                { data: 'out_time', name: 'out_time' },
                { data: 'info_in', name: 'info_in' },
                { data: 'info_out', name: 'info_out' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

    }

    // delete view
    $(document).on('click','.destroyView', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var get_id = $(this).attr('row-id');
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Deleted it!'
        }).
        then((willDelete) => {
            var route  = "{{ route('home.view.delete', ':id') }}",
            route  = route.replace(':id', get_id);
            if(willDelete.value){
                $.ajax({
                    url: route,
                    type: "POST",
                    data : {
                        '_method' : 'DELETE'
                    },
                    success: function(data){
                    // console.log(data);
                        if (data.success) {
                                Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!!',
                                text: 'Menghapus data!!',
                                timer: 1200
                            }).then(function(){
                                $('#tbl_view_psx').DataTable().ajax.reload();
                            });
                        }
                    },
                        error: function(){
                            Swal.fire({
                                icon: 'error',
                                title: 'Error...',
                                text: 'Error Hub Admin!',
                            })
                        }
                    })
            } else {
                // est
            }
        })
    });

    // hidden modal
    $(document).ready(function(){
        $('#modal-view-edit-material').on('hidden.bs.modal', function(){
            $('#sles_no_view_edit_material').val('');
            $('#no_pol_view_edit_material').val('');
            $('#nama_sup_view_edit_material').val('');
            $('#rak_view_edit_material').val('');
            $('#box_view_edit_material').val('');
            $('#palet_view_edit_material').val('');
            $('#tbl_view_psx').DataTable().ajax.reload();
        });
        $('#modal-view-data-list-all').on('hidden.bs.modal', function(){
            $('#sles_no_view_data_list_material').val('');
            $('#in_view_data_list_material').val('');
            $('#date_view_data_list_material').val('');
            $('#no_pol_view_data_list_material').val('');
            $('#driver_view_data_list_material').val('');
            $('#rak_view_data_list_material').val('');
            $('#bok_view_data_list_material').val('');
            $('#palet_view_data_list_material').val('');
            $('#docking_time_view_data_list_material').val('');
            $('#docking_location_view_data_list_material').val('');
            var table = $('#tbl_material_view_data_list_material').DataTable();
                table.rows().remove().draw();

            $('#sles_no_view_data_list_rak_box').val('');
            $('#in_view_data_list_rak_box').val('');
            $('#date_view_data_list_rak_box').val('');
            $('#no_pol_view_data_list_rak_box').val('');
            $('#driver_view_data_list_rak_box').val('');
            $('#kd_sup_view_data_list_rak_box').val('');
            $('#nama_sup_view_data_list_rak_box').val('');
            $('#rak_view_data_list_rak_box').val('');
            $('#bok_view_data_list_rak_box').val('');
            $('#palet_view_data_list_rak_box').val('');
            $('#docking_time_view_data_list_rak_box').val('');
            $('#docking_location_view_data_list_rak_box').val('');

            $('#sles_no_view_data_list_kosong').val('');
            $('#in_view_data_list_kosong').val('');
            $('#date_view_data_list_kosong').val('');
            $('#no_pol_view_data_list_kosong').val('');
            $('#driver_view_data_list_kosong').val('');
            $('#kd_sup_view_data_list_kosong').val('');
            $('#nama_sup_view_data_list_kosong').val('');
            $('#docking_time_view_data_list_kosong').val('');
            $('#docking_location_view_data_list_kosong').val('');
            
            $('#sles_no_view_data_list_swapp').val('');
            $('#in_view_data_list_swapp').val('');
            $('#date_view_data_list_swapp').val('');
            $('#no_pol_view_data_list_swapp').val('');
            $('#driver_view_data_list_swapp').val('');
            $('#rak_view_data_list_swapp').val('');
            $('#bok_view_data_list_swapp').val('');
            $('#palet_view_data_list_swapp').val('');
            $('#docking_time_view_data_list_swap').val('');
            $('#docking_location_view_data_list_swap').val('');
            var table = $('#tbl_swapp_view_data_list_swapp').DataTable();
                table.rows().remove().draw();

            $('#sles_no_view_data_list_revisi_sj').val('');
            $('#in_view_data_list_revisi_sj').val('');
            $('#date_view_data_list_revisi_sj').val('');
            $('#no_pol_view_data_list_revisi_sj').val('');
            $('#driver_view_data_list_revisi_sj').val('');
            $('#rak_view_data_list_revisi_sj').val('');
            $('#bok_view_data_list_revisi_sj').val('');
            $('#palet_view_data_list_revisi_sj').val('');
            $('#ket_view_data_list_revisi_sj').val('');
            $('#docking_time_view_data_list_revisi_sj').val('');
            $('#docking_location_view_data_list_revisi_sj').val('');
            var table = $('#tbl_view_revisi_sj').DataTable();
                table.rows().remove().draw();

            $('#sles_no_view_data_list_sj_temporary').val('');
            $('#in_view_data_list_sj_temporary').val('');
            $('#date_view_data_list_sj_temporary').val('');
            $('#no_pol_view_data_list_sj_temporary').val('');
            $('#driver_view_data_list_sj_temporary').val('');
            $('#kd_sup_view_data_list_sj_temporary').val('');
            $('#nama_sup_view_data_list_sj_temporary').val('');
            $('#rak_view_data_list_sj_temporary').val('');
            $('#bok_view_data_list_sj_temporary').val('');
            $('#palet_view_data_list_sj_temporary').val('');
            $('#docking_time_view_data_list_sj_temporary').val('');
            $('#docking_location_view_data_list_sj_temporary').val('');
            $('#ket_view_data_list_sj_temporary').val('');
            var table = $('#tbl_view_sj_temporary').DataTable();
                table.rows().remove().draw();

            $('#sles_no_view_data_list_sample').val('');
            $('#in_view_data_list_sample').val('');
            $('#date_view_data_list_sample').val('');
            $('#no_pol_view_data_list_sample').val('');
            $('#driver_view_data_list_sample').val('');
            $('#kd_sup_view_data_list_sample').val('');
            $('#nama_sup_view_data_list_sample').val('');
            $('#docking_time_view_data_list_sample').val('');
            $('#docking_location_view_data_list_sample').val('');

            $('#out_view_data_detail_material').val('');
            $('#date_view_data_detail_material').val('');
            $('#rak_view_data_detail_material').val('');
            $('#bok_view_data_detail_material').val('');
            $('#palet_view_data_detail_material').val('');
            $('#docking_time_view_data_detail_material').val('');
            $('#docking_location_view_data_detail_material').val('');
            var table = $('#tbl_material_view_data_detail_material').DataTable();
                table.rows().remove().draw();

            $('#out_view_data_detail_rak_box').val('');
            $('#date_view_data_detail_rak_box').val('');
            $('#no_sj_view_data_detail_rak_box').val('');
            $('#date_sj_view_data_detail_rak_box').val('');
            $('#rak_view_data_detail_rak_box').val('');
            $('#bok_view_data_detail_rak_box').val('');
            $('#palet_view_data_detail_rak_box').val('');
            $('#docking_time_view_data_detail_rak_box').val('');
            $('#docking_location_view_data_detail_rak_box').val('');

            $('#out_view_data_detail_kosong').val('');
            $('#date_view_data_detail_kosong').val('');

            // $('#tbl_view_psx').DataTable().ajax.reload();
        });
    })

    // action view
    $(document).on('click','.ViewView', function(){
        var sles_no = $(this).attr('row-id');
            info_in = $(this).attr('row-InfoIn');
            info_out = $(this).attr('row-InfoOut');
            id_info = ([sles_no,info_in,info_out]);

            $('#modal-view-data-list-all').modal('show');

            const info_in_elements = ['info_in_1', 'info_in_2', 'info_in_3', 'info_in_4', 'info_in_5', 'info_in_6', 'info_in_7'];
            const info_out_elements = ['info_out_1', 'info_out_2', 'info_out_3'];

            function setDisplay(elements, indexes) {
                elements.forEach((id, idx) => {
                    document.getElementById(id).style.display = indexes.includes(idx) ? "block" : "none";
                });
            }

            const info_in_index = parseInt(info_in) - 1;
            const info_out_index = parseInt(info_out) - 1;

            setDisplay(info_in_elements, [info_in_index]);
            setDisplay(info_out_elements, [info_out_index]);

            if (info_in && info_out) {
                setDisplay(info_in_elements, [info_in_index]);
                setDisplay(info_out_elements, [info_out_index]);
            }

            var route  = "{{ route('home.view.view.all', ':id') }}";
            route  = route.replace(':id', id_info);
            $.ajax({
                url:      route,
                method:   'get',
                dataType: 'json',
                success:function(data){
                    info_in = data['info_in'];
                    info_out = data['info_out'];

                    if (info_in == '1') {
                        $('#sles_no_view_data_list_material').val(data['headerIn'].sles_no);
                        $('#in_view_data_list_material').val(data['headerIn'].in);
                        $('#date_view_data_list_material').val(data['headerIn'].create_date);
                        $('#no_pol_view_data_list_material').val(data['headerIn'].no_pol);
                        $('#driver_view_data_list_material').val(data['headerIn'].driver);
                        $('#rak_view_data_list_material').val(data['headerIn'].rak);
                        $('#bok_view_data_list_material').val(data['headerIn'].box);
                        $('#palet_view_data_list_material').val(data['headerIn'].palet);
                        console.log("Docking time value: ", data['headerIn'].docking_time);
                        $('#docking_time_view_data_list_material').val(data['headerIn'].docking_time);
                        console.log("Docking Location value: ", data['headerIn'].docking_location);
                        $('#docking_location_view_data_list_material').val(data['headerIn'].docking_location);

                        var detailDatasetMaterialIn = [];
                            for(var i = 0; i < data['detailIn'].length; i++){
                                detailDatasetMaterialIn.push([
                                    data['detailIn'][i].no_po,
                                    data['detailIn'][i].status_po,
                                    data['detailIn'][i].kd_sup,
                                    data['detailIn'][i].name_sup,
                                    data['detailIn'][i].no_sj,
                                    data['detailIn'][i].date_sj,
                            ]);
                            }
                            $('#tbl_material_view_data_list_material').DataTable().clear().destroy();
                            $('#tbl_material_view_data_list_material').DataTable({
                                "paging":  true,
                                "scrollY": '250px',
                                "scrollCollapse": true,
                                "columnDefs": [
                                    {
                                        "targets": [0, 1, 2, 5 ],
                                        "className": "text-center"
                                    }
                                ],
                                data: detailDatasetMaterialIn,
                                columns: [
                                    { title: 'No Po'},
                                    { title: 'Status'},
                                    { title: 'Kd Sup'},
                                    { title: 'Nama sup'},
                                    { title: 'No Sj' },
                                    { title: 'Date Sj'},
                                ]
                            });

                    } else if (info_in == '2') {
                        $('#sles_no_view_data_list_rak_box').val(data['headerIn'].sles_no);
                        $('#in_view_data_list_rak_box').val(data['headerIn'].in);
                        $('#date_view_data_list_rak_box').val(data['headerIn'].create_date);
                        $('#no_pol_view_data_list_rak_box').val(data['headerIn'].no_pol);
                        $('#driver_view_data_list_rak_box').val(data['headerIn'].driver);
                        $('#kd_sup_view_data_list_rak_box').val(data['headerIn'].kd_sup);
                        $('#nama_sup_view_data_list_rak_box').val(data['headerIn'].name_sup);
                        $('#rak_view_data_list_rak_box').val(data['headerIn'].rak);
                        $('#bok_view_data_list_rak_box').val(data['headerIn'].box);
                        $('#palet_view_data_list_rak_box').val(data['headerIn'].palet);
                        $('#docking_time_view_data_list_rak_box').val(data['headerIn'].docking_time);
                        $('#docking_location_view_data_list_rak_box').val(data['headerIn'].docking_location);

                    } else if (info_in == '3') {
                        $('#sles_no_view_data_list_kosong').val(data['headerIn'].sles_no);
                        $('#in_view_data_list_kosong').val(data['headerIn'].in);
                        $('#date_view_data_list_kosong').val(data['headerIn'].create_date);
                        $('#no_pol_view_data_list_kosong').val(data['headerIn'].no_pol);
                        $('#driver_view_data_list_kosong').val(data['headerIn'].driver);
                        $('#kd_sup_view_data_list_kosong').val(data['headerIn'].kd_sup);
                        $('#nama_sup_view_data_list_kosong').val(data['headerIn'].name_sup);
                        $('#docking_time_view_data_list_kosong').val(data['headerIn'].docking_time);
                        $('#docking_location_view_data_list_kosong').val(data['headerIn'].docking_location);

                    } else if (info_in == '4') {
                        $('#sles_no_view_data_list_swapp').val(data['headerIn'].sles_no);
                        $('#in_view_data_list_swapp').val(data['headerIn'].in);
                        $('#date_view_data_list_swapp').val(data['headerIn'].create_date);
                        $('#no_pol_view_data_list_swapp').val(data['headerIn'].no_pol);
                        $('#driver_view_data_list_swapp').val(data['headerIn'].driver);
                        $('#kd_sup_view_data_list_swapp').val(data['headerIn'].kd_sup);
                        $('#nama_sup_view_data_list_swapp').val(data['headerIn'].name_sup);
                        $('#rak_view_data_list_swapp').val(data['headerIn'].rak);
                        $('#bok_view_data_list_swapp').val(data['headerIn'].box);
                        $('#palet_view_data_list_swapp').val(data['headerIn'].palet);
                        $('#docking_time_view_data_list_swapp').val(data['headerIn'].docking_time);
                        $('#docking_location_view_data_list_swapp').val(data['headerIn'].docking_location);

                        var detailDatasetSwappIn = [];
                            for(var i = 0; i < data['detailIn'].length; i++){
                                detailDatasetSwappIn.push([
                                    data['detailIn'][i].no_sj,
                                    data['detailIn'][i].date_sj,
                            ]);
                            }
                            $('#tbl_swapp_view_data_list_swapp').DataTable().clear().destroy();
                            $('#tbl_swapp_view_data_list_swapp').DataTable({
                                "paging":  true,
                                "scrollY": '250px',
                                "scrollCollapse": true,
                                "columnDefs": [
                                    {
                                        "targets": [1],
                                        "className": "text-center"
                                    }
                                ],
                                data: detailDatasetSwappIn,
                                columns: [
                                    { title: 'No Sj' },
                                    { title: 'Date Sj'},
                                ]
                            });

                    } else if (info_in == '5') {
                        $('#sles_no_view_data_list_revisi_sj').val(data['headerIn'].sles_no);
                        $('#in_view_data_list_revisi_sj').val(data['headerIn'].in);
                        $('#date_view_data_list_revisi_sj').val(data['headerIn'].create_date);
                        $('#no_pol_view_data_list_revisi_sj').val(data['headerIn'].no_pol);
                        $('#driver_view_data_list_revisi_sj').val(data['headerIn'].driver);
                        $('#rak_view_data_list_revisi_sj').val(data['headerIn'].rak);
                        $('#bok_view_data_list_revisi_sj').val(data['headerIn'].box);
                        $('#palet_view_data_list_revisi_sj').val(data['headerIn'].palet);
                        $('#docking_time_view_data_list_revisi_sj').val(data['headerIn'].docking_time);
                        $('#docking_location_view_data_list_revisi_sj').val(data['headerIn'].docking_location);
                        $('#ket_view_data_list_revisi_sj').val(data['headerIn'].ket);

                        var detailDatasetMaterialIn = [];
                            for(var i = 0; i < data['detailIn'].length; i++){
                                detailDatasetMaterialIn.push([
                                    data['detailIn'][i].no_po,
                                    data['detailIn'][i].status_po,
                                    data['detailIn'][i].kd_sup,
                                    data['detailIn'][i].name_sup,
                                    data['detailIn'][i].no_sj,
                                    data['detailIn'][i].date_sj,
                            ]);
                            }
                            $('#tbl_view_revisi_sj').DataTable().clear().destroy();
                            $('#tbl_view_revisi_sj').DataTable({
                                "paging":  true,
                                "scrollY": '250px',
                                "scrollCollapse": true,
                                "columnDefs": [
                                    {
                                        "targets": [0, 1, 2, 5 ],
                                        "className": "text-center"
                                    }
                                ],
                                data: detailDatasetMaterialIn,
                                columns: [
                                    { title: 'No Po'},
                                    { title: 'Status'},
                                    { title: 'Kd Sup'},
                                    { title: 'Nama sup'},
                                    { title: 'No Sj' },
                                    { title: 'Date Sj'},
                                ]
                            });

                    } else if (info_in == '6') {
                        $('#sles_no_view_data_list_sj_temporary').val(data['headerIn'].sles_no);
                        $('#in_view_data_list_sj_temporary').val(data['headerIn'].in);
                        $('#date_view_data_list_sj_temporary').val(data['headerIn'].create_date);
                        $('#no_pol_view_data_list_sj_temporary').val(data['headerIn'].no_pol);
                        $('#driver_view_data_list_sj_temporary').val(data['headerIn'].driver);
                        $('#kd_sup_view_data_list_sj_temporary').val(data['headerIn'].kd_sup);
                        $('#nama_sup_view_data_list_sj_temporary').val(data['headerIn'].name_sup);
                        $('#rak_view_data_list_sj_temporary').val(data['headerIn'].rak);
                        $('#bok_view_data_list_sj_temporary').val(data['headerIn'].box);
                        $('#palet_view_data_list_sj_temporary').val(data['headerIn'].palet);
                        $('#docking_time_view_data_list_sj_temporary').val(data['headerIn'].docking_time);
                        $('#docking_location_view_data_list_sj_temporary').val(data['headerIn'].docking_location);
                        $('#ket_view_data_list_sj_temporary').val(data['headerIn'].ket);

                        var detailDatasetSwappIn = [];
                            for(var i = 0; i < data['detailIn'].length; i++){
                                detailDatasetSwappIn.push([
                                    data['detailIn'][i].no_sj,
                                    data['detailIn'][i].date_sj,
                            ]);
                            }
                            $('#tbl_view_sj_temporary').DataTable().clear().destroy();
                            $('#tbl_view_sj_temporary').DataTable({
                                "paging":  true,
                                "scrollY": '250px',
                                "scrollCollapse": true,
                                "columnDefs": [
                                    {
                                        "targets": [1],
                                        "className": "text-center"
                                    }
                                ],
                                data: detailDatasetSwappIn,
                                columns: [
                                    { title: 'No Sj' },
                                    { title: 'Date Sj'},
                                ]
                            });

                    } else if (info_in == '7') {
                        $('#sles_no_view_data_list_sample').val(data['headerIn'].sles_no);
                        $('#in_view_data_list_sample').val(data['headerIn'].in);
                        $('#date_view_data_list_sample').val(data['headerIn'].create_date);
                        $('#no_pol_view_data_list_sample').val(data['headerIn'].no_pol);
                        $('#driver_view_data_list_sample').val(data['headerIn'].driver);
                        $('#kd_sup_view_data_list_sample').val(data['headerIn'].kd_sup);
                        $('#nama_sup_view_data_list_sample').val(data['headerIn'].name_sup);
                        $('#docking_time_view_data_list_sample').val(data['headerIn'].docking_time);
                        $('#docking_location_view_data_list_sample').val(data['headerIn'].docking_location);

                    }


                    if (info_out == '1') {
                        $('#out_view_data_detail_material').val(data['headerOut'].out);
                        $('#date_view_data_detail_material').val(data['headerOut'].date_out);
                        $('#rak_view_data_detail_material').val(data['headerOut'].rak);
                        $('#bok_view_data_detail_material').val(data['headerOut'].box);
                        $('#palet_view_data_detail_material').val(data['headerOut'].palet);
                        $('#docking_time_view_data_detail_material').val(data['headerIn'].docking_time);
                        $('#docking_location_view_data_detail_material').val(data['headerIn'].docking_location);

                        var detailDatasetMaterialout = [];
                            for(var i = 0; i < data['detailout'].length; i++){
                                detailDatasetMaterialout.push([
                                    data['detailout'][i].no_sj,
                                    data['detailout'][i].date_sj,
                            ]);
                            }
                            $('#tbl_material_view_data_detail_material').DataTable().clear().destroy();
                            $('#tbl_material_view_data_detail_material').DataTable({
                                "paging":  true,
                                "scrollY": '250px',
                                "scrollCollapse": true,
                                "columnDefs": [
                                    {
                                        "targets": [1],
                                        "className": "text-center"
                                    }
                                ],
                                data: detailDatasetMaterialout,
                                columns: [
                                    { title: 'No Sj' },
                                    { title: 'Date Sj'},
                                ]
                            });

                    } else if (info_out == '2') {
                        $('#out_view_data_detail_rak_box').val(data['headerOut'].out);
                        $('#date_view_data_detail_rak_box').val(data['headerOut'].date_out);
                        $('#no_sj_view_data_detail_rak_box').val(data['headerOut'].no_sj);
                        $('#date_sj_view_data_detail_rak_box').val(data['headerOut'].date_sj);
                        $('#rak_view_data_detail_rak_box').val(data['headerOut'].rak);
                        $('#bok_view_data_detail_rak_box').val(data['headerOut'].box);
                        $('#palet_view_data_detail_rak_box').val(data['headerOut'].palet);
                        $('#docking_time_view_data_detail_rak_box').val(data['headerIn'].docking_time);
                        $('#docking_location_view_data_detail_rak_box').val(data['headerIn'].docking_location);

                    } else if (info_out == '3') {
                        $('#out_view_data_detail_kosong').val(data['headerOut'].out);
                        $('#date_view_data_detail_kosong').val(data['headerOut'].date_out);

                    }
                },

            });
    })

    // edit view
    $(document).on('click','.EditView', function(){
        var sles_no = $(this).attr('row-id');
        var info_out = $(this).attr('row-infoOut');
            id = ([sles_no,info_out]);
        $('#modal-view-edit-material').modal('show');

        var route = "{{ route('home.view.edit.material', 'id') }}";
        var url   = route.replace('id', id);
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'JSON',
            success:function(data){
                $('#sles_no_view_edit_material').val(data['header'].sles_no);
                $('#no_pol_view_edit_material').val(data['header'].no_pol);
                $('#nama_sup_view_edit_material').val(data['header'].name_sup);
                $('#driver_view_edit_material').val(data['header'].driver);
                $('#rak_view_edit_material').val(data['header'].rak);
                $('#bok_view_edit_material').val(data['header'].box);
                $('#palet_view_edit_material').val(data['header'].palet);

                var response = JSON.stringify(data['detail']);
                var countDetail = data['detail'].length;
                $('#jml_row_view_edit_material_sj').val(countDetail);
                $('#tbl_view_edit_material_sj').DataTable().clear().destroy();

                for (let x = 0; x < countDetail ; x++) {
                    var table = $('#tbl_view_edit_material_sj').DataTable().row.add([
                        '<input type="text" value="'+data['detail'][x].no_sj+'" name="no_sj_view_edit_material[]" id="no_sj_view_edit_material'+[x]+'"  maxlength="20" class="form-control form-control-sm no_sj_view_edit_material">',
                        '<input type="date" value="'+data['detail'][x].date_sj+'" name="date_view_edit_material[]" id="date_view_edit_material'+[x]+'" class="form-control form-control-sm date_view_edit_material">',
                        '<a href="#" class="btn btn-xs btn-danger destroy_view_edit_material_sj" style="font-size: 12px;"><i class="fa fa-trash"></i></a>'
                    ]).draw(false)
                }
            },
            error: function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'Error Hub Admin!',
                })
            }
        })
    });

    $(document).on('click','.destroy_view_edit_material_sj', function(){
        var table = $('#tbl_view_edit_material_sj').DataTable();
        $('#tbl_view_edit_material_sj tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
        var index = table.row('.selected').indexes();
            table.row(index).remove().draw(false);
        var jml_row = document.getElementById("jml_row_view_edit_material_sj").value.trim();
            jml_row = Number(jml_row) + 1;
            nextRow = table.rows().count() + 1;

        for($i = nextRow; $i <= jml_row; $i++) {

            var no_sj_view_edit_material = "no_sj_view_edit_material" + $i;
            var no_sj_view_edit_material_new = "no_sj_view_edit_material" + ($i-1);
                $(no_sj_view_edit_material).attr({"id":no_sj_view_edit_material_new, "name":no_sj_view_edit_material_new});

            var date_view_edit_material = "date_view_edit_material" + $i;
            var date_view_edit_material_new = "date_view_edit_material" + ($i-1);
                $(date_view_edit_material).attr({"id":date_view_edit_material_new, "name":date_view_edit_material_new});
        }
    });

    $(document).ready(function(){
        $('#addRowViewEditMaterial').click(function(e){
            e.preventDefault();
            var table = $('#tbl_view_edit_material_sj').DataTable({
                stateSave: true,
                "bDestroy": true,
                paging:  false,
                searching: false,
                language: {
                    info: ""
                },
                "columnDefs": [{
                        "targets": [0, 1, 2],
                        "className": "text-center",
                        "orderable": false,
                    }
                ],
            });

            var counter = $('#jml_row_view_edit_material_sj').val();
            var jml_row = Number(counter)+1;
            document.getElementById('jml_row_view_edit_material_sj').value = jml_row;

            var no_sj_out_material = "no_sj_view_edit_material"+jml_row;
            var date_sj_out_material = "date_view_edit_material"+jml_row;

            table.row.add([
                '<input type="text" name="no_sj_view_edit_material[]" id="' + no_sj_out_material + '"  maxlength="20" class="form-control form-control-sm no_sj_view_edit_material">',
                '<input type="date" name="date_view_edit_material[]" id="' + date_sj_out_material + '" class="form-control form-control-sm date_view_edit_material">',
                '<a href="#" class="btn btn-xs btn-danger destroy_view_edit_material_sj" style="font-size: 12px;"><i class="fa fa-trash"></i></a>'
            ]).draw(false);
        });
    })

    $('#submit_view_edit_material').click(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('home.view.edit.material.submit') }}",
            type: "POST",
            data: $('#form-view-edit-material').serialize(),
            dataType: 'json',
                success: function(data){
                    console.log(data);
                    if($.isEmptyObject(data.error)){
                        if(data.status == false){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Data tidak Tersimpan',
                                text: 'Tidak ada No Sj!!!'
                            });
                        } else if (data.status == true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!!',
                                text: 'Menambahkan data!!',
                                timer: 1200
                            }).then(function(){
                                $('#modal-view-edit-material').modal('hide');
                                $('#tbl_view_psx').DataTable().ajax.reload();
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error...',
                                text: 'Error Hub Admin!!',
                            })
                        }

                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Warning',
                            text: 'Perhatikan Inputan Anda! Form Tidak Boleh Kosong',
                        });
                    }
                },
                error: function(){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'Error Hub Admin!',
                    })
                }
        })
    });

    function print_excel(){
        var min = $("#date_filter").val();
        var max = $("#date_filter1").val();
        var date = [min, max].join('_');
            route = "{{ route('home.view.printExcel', ':id')}}";
            route  = route.replace(':id', date);

        $.ajax({
            url: route,
            datatype: 'json',
            beforeSend: function() {
                Swal.fire({
                    title: 'Loading...',
                    text: 'Sedang Download Excel, Harap Tunggu!!',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    onOpen: () => {
                        Swal.showLoading();
                    }
                });
            },
            success: function(data) {
                if(data.status == 200) {
                    fetch('psx_report/' + min + '/' + max + '/excel')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.blob();
                    })
                    .then(blob => {
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.href = url;
                        a.download = 'List_SLES_' + min + '_To_' + max + '.xlsx';
                        document.body.appendChild(a);
                        a.click();
                        a.remove();
                        window.URL.revokeObjectURL(url);
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Gagal mengunduh file: ' + error.message,
                        });
                    })
                    .finally(() => {
                        Swal.close();
                    });
                } else {
                    Swal.close();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Perhatian!',
                        text: data.message,
                    });
                }
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Koneksi Database Error',
                });
            }
        })
    }

</script>

@endsection

@push('js')
<!-- Datatables -->
<script src="{{ asset('Datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush


