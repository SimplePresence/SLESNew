@extends('layouts.masterHome')

@section('title', 'Supplier In - SLES')

@section('css')
<!-- DATATABLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('Datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"  type="text/css" href="{{asset('datetimepicker/css/bootstrap-datetimepicker.css')}}"/>
<script src="{{asset('datetimepicker/js/jquery.min.js')}}"></script>
<script src="{{asset('datetimepicker/js/moment.min.js')}}"></script>
<script src="{{asset('datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<style>
    .custom-button {
        height: 60px;
        font-size: 14px;
        transition: transform 0.3s;
    }

    .custom-button:hover {
        transform: scale(1.1);
    }

</style>
@endsection

@section('page-title')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Supplier Masuk</h4>
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
        <div class="col-md-1 mt-4"></div>
        <div class="col-md-4 mt-4">
            <button type="button" class="btn btn-success btn-block custom-button" id="addModalPo">
                <strong><i class="fa fa-plus-square"></i>&nbsp;&nbsp;PO</strong>
            </button>
        </div>
        <div class="col-md-2 mt-4"></div>
        <div class="col-md-4 mt-4">
            <button type="button" class="btn btn-danger btn-block custom-button" id="addModalNonPo">
                <strong><i class="fa fa-plus-square"></i>&nbsp;&nbsp;NON PO</strong>
            </button>
        </div>
        <div class="col-md-1 mt-4"></div>
    </div>

    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="datatable datatable-primary">
                                <div class="table-responsive">
                                    <table id="tbl_cerate_in_psx" class="table table-striped table-hover" width="100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="10%">Sles No</th>
                                                <th width="25%">Nama Supplier</th>
                                                <th width="10%">No Pol</th>
                                                <th width="10%">Driver</th>
                                                <th width="10%">Date</th>
                                                <th width="10%">In</th>
                                                <th width="10%">Out</th>
                                                <th width="10%">Info In</th>
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_item" style="font-size: 13px;">
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
@include('psx_security.create_in_psx.modal.add_po')
@include('psx_security.create_in_psx.modal.add_non_po')
@include('psx_security.create_in_psx.modal.pop_up_data.modal_supplier_1')
@include('psx_security.create_in_psx.modal.pop_up_data.modal_supplier_2')
@include('psx_security.create_in_psx.modal.pop_up_data.modal_supplier_3')
@include('psx_security.create_in_psx.modal.pop_up_data.modal_supplier_4')
@include('psx_security.create_in_psx.modal.pop_up_data.modal_supplier_5')
@include('psx_security.create_in_psx.modal.pop_up_data.modal_supplier_6')
@include('psx_security.create_in_psx.modal.pop_up_data.modal_supplier_7')
@include('psx_security.create_in_psx.modal.view.view_in_all')


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // datatable
    $(document).ready(function() {
        //get data from datatables
        var table = $('#tbl_cerate_in_psx').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('home.in.datatables') }}",
            },
            "oLanguage": {
            "sSearch": "Filter Data"
            },
            "columnDefs": [
                {
                    "targets": [0, 1, 4, 5, 6, 7, 8, 9 ],
                    "className": "text-center"
                }
            ],
            order: [[ 1, 'desc']],
            responsive: true,
            paging: true,
            "bFilter": true,
            columns: [
                { data: 'no',
                    name: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'sles_no', name: 'sles_no' },
                { data: 'name_sup', name: 'name_sup' },
                { data: 'no_pol', name: 'no_pol' },
                { data: 'driver', name: 'driver' },
                { data: 'create_date', name: 'create_date' },
                { data: 'in', name: 'in' },
                { data: 'out', name: 'out' },
                { data: 'info_in', name: 'info_in' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

    // hidden modal
    $(document).ready(function(){
        $('#modal-add-in-po').on('hidden.bs.modal', function(){
            $('#status_in_po').val('');
            $('#info_in_rakbox_add').val('');
            $('#info_in_revisi_sj_add').val('');
            $('#tbl_cerate_in_psx').DataTable().ajax.reload();
        });

        $('#modal-add-in-non-po').on('hidden.bs.modal', function(){
            $('#status_in_non_po').val('');
            $('#tbl_cerate_in_psx').DataTable().ajax.reload();
        });

        $('#modal-view-in-all').on('hidden.bs.modal', function(){
            $('#tbl_cerate_in_psx').DataTable().ajax.reload();
        });

    });


    // NEW
    // add po
    document.getElementById('no_po_material_add1').addEventListener('input', function () {
    if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
    }
    });

    document.getElementById('rak_material_add').addEventListener('input', function () {
    if (this.value.length > 4) {
        this.value = this.value.slice(0, 4);
    }
    });
    document.getElementById('bok_material_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('palet_material_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });

    document.getElementById('no_po_revisi_sj_add1').addEventListener('input', function () {
    if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
    }
    });

    document.getElementById('rak_revisi_sj_add').addEventListener('input', function () {
    if (this.value.length > 4) {
        this.value = this.value.slice(0, 4);
    }
    });
    document.getElementById('bok_revisi_sj_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('palet_revisi_sj_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });

    // add non po
    document.getElementById('rak_rakbok_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('bok_rakbok_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('palet_rakbok_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });

    document.getElementById('rak_swapp_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('bok_swapp_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('palet_swapp_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });

    document.getElementById('rak_sj_temporary_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('bok_sj_temporary_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('palet_sj_temporary_add').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });


    // modal pop up
    $(document).on('click','#btnPopUpSupplier1', function() {
        $('#modal_supplier_list_1').modal('show');
        var route_supplier_1 = "{{ route('home.in.get.supplier') }}";
        var lookUpdataSupplier1 =  $('#lookUpdataSupplierList1').DataTable({
            processing: true,
            serverSide: true,
            "pagingType": "numbers",
            ajax: route_supplier_1,
            responsive: true,
            paging: true,
            "bFilter": true,
            "order": [[0, 'asc']],
            columns: [
                { data: 'vendor', name: 'vendor' },
                { data: 'supplier_name', name: 'supplier_name' },
                { data: 'street', name: 'street' }
            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                $('#lookUpdataSupplierList1 tbody').on('dblclick', 'tr', function () {
                    var dataArrWh = [];
                    var rowsWh = $(this);
                    var rowDataWh = lookUpdataSupplier1.rows(rowsWh).data();
                    $.each($(rowDataWh),function(key,value){
                        document.getElementById("kd_sup_material_add1").value = value["vendor"];
                        document.getElementById("nama_sup_material_add1").value = value["supplier_name"];
                        $('#modal_supplier_list_1').modal('hide');
                    });
                });

            },
        });
    });

    $(document).on('click','#btnPopUpSupplier2', function() {
        $('#modal_supplier_list_2').modal('show');
        var route_supplier_2 = "{{ route('home.in.get.supplier') }}";
        var lookUpdataSupplier2 =  $('#lookUpdataSupplierList2').DataTable({
            processing: true,
            serverSide: true,
            "pagingType": "numbers",
            ajax: route_supplier_2,
            responsive: true,
            paging: true,
            "bFilter": true,
            "order": [[0, 'asc']],
            columns: [
                { data: 'vendor', name: 'vendor' },
                { data: 'supplier_name', name: 'supplier_name' },
                { data: 'street', name: 'street' }
            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                $('#lookUpdataSupplierList2 tbody').on('dblclick', 'tr', function () {
                    var dataArrWh = [];
                    var rowsWh = $(this);
                    var rowDataWh = lookUpdataSupplier2.rows(rowsWh).data();
                    $.each($(rowDataWh),function(key,value){
                        document.getElementById("kd_sup_rakbok_add").value = value["vendor"];
                        document.getElementById("nama_sup_rakbok_add").value = value["supplier_name"];
                        $('#modal_supplier_list_2').modal('hide');
                    });
                });

            },
        });
    });

    $(document).on('click','#btnPopUpSupplier3', function() {
        $('#modal_supplier_list_3').modal('show');
        var route_supplier_3 = "{{ route('home.in.get.supplier') }}";
        var lookUpdataSupplier3 =  $('#lookUpdataSupplierList3').DataTable({
            processing: true,
            serverSide: true,
            "pagingType": "numbers",
            ajax: route_supplier_3,
            responsive: true,
            paging: true,
            "bFilter": true,
            "order": [[0, 'asc']],
            columns: [
                { data: 'vendor', name: 'vendor' },
                { data: 'supplier_name', name: 'supplier_name' },
                { data: 'street', name: 'street' }
            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                $('#lookUpdataSupplierList3 tbody').on('dblclick', 'tr', function () {
                    var dataArrWh = [];
                    var rowsWh = $(this);
                    var rowDataWh = lookUpdataSupplier3.rows(rowsWh).data();
                    $.each($(rowDataWh),function(key,value){
                        document.getElementById("kd_sup_kosong_add").value = value["vendor"];
                        document.getElementById("nama_sup_kosong_add").value = value["supplier_name"];
                        $('#modal_supplier_list_3').modal('hide');
                    });
                });

            },
        });
    });

    $(document).on('click','#btnPopUpSupplier4', function() {
        $('#modal_supplier_list_4').modal('show');
        var route_supplier_4 = "{{ route('home.in.get.supplier') }}";
        var lookUpdataSupplier4 =  $('#lookUpdataSupplierList4').DataTable({
            processing: true,
            serverSide: true,
            "pagingType": "numbers",
            ajax: route_supplier_4,
            responsive: true,
            paging: true,
            "bFilter": true,
            "order": [[0, 'asc']],
            columns: [
                { data: 'vendor', name: 'vendor' },
                { data: 'supplier_name', name: 'supplier_name' },
                { data: 'street', name: 'street' }
            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                $('#lookUpdataSupplierList4 tbody').on('dblclick', 'tr', function () {
                    var dataArrWh = [];
                    var rowsWh = $(this);
                    var rowDataWh = lookUpdataSupplier4.rows(rowsWh).data();
                    $.each($(rowDataWh),function(key,value){
                        document.getElementById("kd_sup_swapp_add").value = value["vendor"];
                        document.getElementById("nama_sup_swapp_add").value = value["supplier_name"];
                        $('#modal_supplier_list_4').modal('hide');
                    });
                });

            },
        });
    });

    $(document).on('click','#btnPopUpSupplier5', function() {
        $('#modal_supplier_list_5').modal('show');
        var route_supplier_5 = "{{ route('home.in.get.supplier') }}";
        var lookUpdataSupplier5 =  $('#lookUpdataSupplierList5').DataTable({
            processing: true,
            serverSide: true,
            "pagingType": "numbers",
            ajax: route_supplier_5,
            responsive: true,
            paging: true,
            "bFilter": true,
            "order": [[0, 'asc']],
            columns: [
                { data: 'vendor', name: 'vendor' },
                { data: 'supplier_name', name: 'supplier_name' },
                { data: 'street', name: 'street' }
            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                $('#lookUpdataSupplierList5 tbody').on('dblclick', 'tr', function () {
                    var dataArrWh = [];
                    var rowsWh = $(this);
                    var rowDataWh = lookUpdataSupplier5.rows(rowsWh).data();
                    $.each($(rowDataWh),function(key,value){
                        document.getElementById("kd_sup_revisi_sj_add1").value = value["vendor"];
                        document.getElementById("nama_sup_revisi_sj_add1").value = value["supplier_name"];
                        $('#modal_supplier_list_5').modal('hide');
                    });
                });

            },
        });
    });

    $(document).on('click','#btnPopUpSupplier6', function() {
        $('#modal_supplier_list_6').modal('show');
        var route_supplier_6 = "{{ route('home.in.get.supplier') }}";
        var lookUpdataSupplier6 =  $('#lookUpdataSupplierList6').DataTable({
            processing: true,
            serverSide: true,
            "pagingType": "numbers",
            ajax: route_supplier_6,
            responsive: true,
            paging: true,
            "bFilter": true,
            "order": [[0, 'asc']],
            columns: [
                { data: 'vendor', name: 'vendor' },
                { data: 'supplier_name', name: 'supplier_name' },
                { data: 'street', name: 'street' }
            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                $('#lookUpdataSupplierList6 tbody').on('dblclick', 'tr', function () {
                    var dataArrWh = [];
                    var rowsWh = $(this);
                    var rowDataWh = lookUpdataSupplier6.rows(rowsWh).data();
                    $.each($(rowDataWh),function(key,value){
                        document.getElementById("kd_sup_sj_temporary_add").value = value["vendor"];
                        document.getElementById("nama_sup_sj_temporary_add").value = value["supplier_name"];
                        $('#modal_supplier_list_6').modal('hide');
                    });
                });

            },
        });
    });

    $(document).on('click','#btnPopUpSupplier7', function() {
        $('#modal_supplier_list_7').modal('show');
        var route_supplier_7 = "{{ route('home.in.get.supplier') }}";
        var lookUpdataSupplier7 =  $('#lookUpdataSupplierList7').DataTable({
            processing: true,
            serverSide: true,
            "pagingType": "numbers",
            ajax: route_supplier_7,
            responsive: true,
            paging: true,
            "bFilter": true,
            "order": [[0, 'asc']],
            columns: [
                { data: 'vendor', name: 'vendor' },
                { data: 'supplier_name', name: 'supplier_name' },
                { data: 'street', name: 'street' }
            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                $('#lookUpdataSupplierList7 tbody').on('dblclick', 'tr', function () {
                    var dataArrWh = [];
                    var rowsWh = $(this);
                    var rowDataWh = lookUpdataSupplier7.rows(rowsWh).data();
                    $.each($(rowDataWh),function(key,value){
                        document.getElementById("kd_sup_sample_add").value = value["vendor"];
                        document.getElementById("nama_sup_sample_add").value = value["supplier_name"];
                        $('#modal_supplier_list_7').modal('hide');
                    });
                });

            },
        });
    });


    // ##add PO
    $('#addModalPo').click(function() {
        $('#modal-add-in-po').modal('show');

        function resetElement(element, table) {
            element.hide();
            element.find('input, textarea, select').val('');
            table.clear().draw();
        }

        var tableMaterial = $('#tbl_in_add_material').DataTable();
        var tableRevisiSj = $('#tbl_in_add_revisi_sj').DataTable();

        resetElement($('#in_po_material'), tableMaterial);
        resetElement($('#in_po_revisi_sj'), tableRevisiSj);

        $('#in_po_material').hide();
        $('#in_po_revisi_sj').hide();

        $('#status_in_po').change(function() {
            const info_in = $('#status_in_po').val();

            resetElement($('#in_po_material'), tableMaterial);
            resetElement($('#in_po_revisi_sj'), tableRevisiSj);

            if (info_in == '1') {
                $('#in_po_material').show();
                $('#info_in_material_add').val(info_in);
            } else if (info_in == '5') {
                $('#in_po_revisi_sj').show();
                $('#info_in_revisi_sj_add').val(info_in);
            }

        });
    });

    // button klik add tbl PO
    $(document).ready(function(){
         $('#Add_tbl_po_material_manual').click(function(e){
            e.preventDefault();
            no_po = $('#no_po_material_add1').val();
            kd_supp = $('#kd_sup_material_add1').val();
            nama_supp = $('#nama_sup_material_add1').val();
            date_sj = $('#date_sj_material_add1').val();

            var condtion = !no_po || !kd_supp || !nama_supp || !date_sj

            if (condtion) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Perhatikan Inputan Anda! Form Tidak Boleh Kosong',
                });
            } else {
                // add datatables
                var table = $('#tbl_in_add_material').DataTable({
                    stateSave: true,
                    "bDestroy": true,
                    paging:  false,
                    searching: false,
                    language: {
                        info: ""
                    },
                    "columnDefs": [{
                            "targets": [0, 1, 2, 3, 4, 5],
                            "className": "text-center",
                            "orderable": false,
                        }
                    ],
                });

                var counter = $('#jml_row_add_material').val();
                var jml_row = Number(counter)+1;
                document.getElementById('jml_row_add_material').value = jml_row;

                no_po_add_material = "no_po_add_material"+jml_row;
                status_po_add_material = "status_po_add_material"+jml_row;
                kd_sup_add_material = "kd_sup_add_material"+jml_row;
                nama_sup_add_material  = "nama_sup_add_material"+jml_row;
                no_sj_add_material  = "no_sj_add_material"+jml_row;
                date_sj_add_material  = "date_sj_add_material"+jml_row;

                table.row.add([
                    '<input type="number" name="no_po_add_material[]" id="' + no_po_add_material + '" value="' + no_po + '" class="form-control form-control-sm" readonly>',
                    '<input type="number" name="status_po_add_material[]" id="' + status_po_add_material + '" value="0" class="form-control form-control-sm" readonly>',
                    '<input type="text" name="kd_sup_add_material[]" id="' + kd_sup_add_material + '" value="' + kd_supp + '" class="form-control form-control-sm" readonly>',
                    '<input type="text" name="nama_sup_add_material[]" id="' + nama_sup_add_material + '" value="' + nama_supp + '" class="form-control form-control-sm" readonly>',
                    '<input type="text" name="no_sj_add_material[]" id="' + no_sj_add_material + '" class="form-control form-control-sm no_sj_add_material" maxlength="25" style="outline: 1px solid #b3cee5;">',
                    '<input type="date" name="date_sj_add_material[]" id="' + date_sj_add_material + '" value="'+ date_sj +'" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;">',
                    '<a href="#" class="btn btn-xs btn-danger destroy_add_material" style="font-size: 12px;"><i class="fa fa-trash"></i></a>'
                ]).draw(false);

            }
        });

        $(document).on('click','.destroy_add_material', function(){
            var table = $('#tbl_in_add_material').DataTable();
            $('#tbl_in_add_material tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
            var index = table.row('.selected').indexes();
                table.row(index).remove().draw(false);
            var jml_row = document.getElementById("jml_row_add_material").value.trim();
                jml_row = Number(jml_row) + 1;
                nextRow = table.rows().count() + 1;

            for($i = nextRow; $i <= jml_row; $i++) {

                var no_po_add_material = "no_po_add_material" + $i;
                var no_po_add_material_new = "no_po_add_material" + ($i-1);
                    $(no_po_add_material).attr({"id":no_po_add_material_new, "name":no_po_add_material_new});

                var status_po_add_material = "status_po_add_material" + $i;
                var status_po_add_material_new = "status_po_add_material" + ($i-1);
                    $(status_po_add_material).attr({"id":status_po_add_material_new, "name":status_po_add_material_new});

                var kd_sup_add_material = "kd_sup_add_material" + $i;
                var kd_sup_add_material_new = "kd_sup_add_material" + ($i-1);
                    $(kd_sup_add_material).attr({"id":kd_sup_add_material_new, "name":kd_sup_add_material_new});

                var nama_sup_add_material = "nama_sup_add_material" + $i;
                var nama_sup_add_material_new = "nama_sup_add_material" + ($i-1);
                    $(nama_sup_add_material).attr({"id":nama_sup_add_material_new, "name":nama_sup_add_material_new});

                var no_sj_add_material = "no_sj_add_material" + $i;
                var no_sj_add_material_new = "no_sj_add_material" + ($i-1);
                    $(no_sj_add_material).attr({"id":no_sj_add_material_new, "name":no_sj_add_material_new});

                var date_sj_add_material = "date_sj_add_material" + $i;
                var date_sj_add_material_new = "date_sj_add_material" + ($i-1);
                    $(date_sj_add_material).attr({"id":date_sj_add_material_new, "name":date_sj_add_material_new});
            }
        });

        $('#Add_tbl_po_revisi_sj_manual').click(function(e){
            e.preventDefault();
            no_po = $('#no_po_revisi_sj_add1').val();
            kd_supp = $('#kd_sup_revisi_sj_add1').val();
            nama_supp = $('#nama_sup_revisi_sj_add1').val();
            date_sj = $('#date_sj_revisi_sj_add1').val();

            var condtion = !no_po || !kd_supp || !nama_supp || !date_sj

            if (condtion) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Perhatikan Inputan Anda! Form Tidak Boleh Kosong',
                });
            } else {
                // add datatables
                var table = $('#tbl_in_add_revisi_sj').DataTable({
                    stateSave: true,
                    "bDestroy": true,
                    paging:  false,
                    searching: false,
                    language: {
                        info: ""
                    },
                    "columnDefs": [{
                            "targets": [0, 1, 2, 3, 4, 5],
                            "className": "text-center",
                            "orderable": false,
                        }
                    ],
                });

                var counter = $('#jml_row_add_revisi_sj').val();
                var jml_row = Number(counter)+1;
                document.getElementById('jml_row_add_revisi_sj').value = jml_row;

                no_po_add_revisi_sj = "no_po_add_revisi_sj"+jml_row;
                status_po_add_revisi_sj = "status_po_add_revisi_sj"+jml_row;
                kd_sup_add_revisi_sj = "kd_sup_add_revisi_sj"+jml_row;
                nama_sup_add_revisi_sj  = "nama_sup_add_revisi_sj"+jml_row;
                no_sj_add_revisi_sj  = "no_sj_add_revisi_sj"+jml_row;
                date_sj_add_revisi_sj  = "date_sj_add_revisi_sj"+jml_row;

                table.row.add([
                    '<input type="number" name="no_po_add_revisi_sj[]" id="' + no_po_add_revisi_sj + '" value="' + no_po + '" class="form-control form-control-sm" readonly>',
                    '<input type="number" name="status_po_add_revisi_sj[]" id="' + status_po_add_revisi_sj + '" value="0" class="form-control form-control-sm" readonly>',
                    '<input type="text" name="kd_sup_add_revisi_sj[]" id="' + kd_sup_add_revisi_sj + '" value="' + kd_supp + '" class="form-control form-control-sm" readonly>',
                    '<input type="text" name="nama_sup_add_revisi_sj[]" id="' + nama_sup_add_revisi_sj + '" value="' + nama_supp + '" class="form-control form-control-sm" readonly>',
                    '<input type="text" name="no_sj_add_revisi_sj[]" id="' + no_sj_add_revisi_sj + '" class="form-control form-control-sm" maxlength="25" style="outline: 1px solid #b3cee5;">',
                    '<input type="date" name="date_sj_add_revisi_sj[]" id="' + date_sj_add_revisi_sj + '" value="'+ date_sj +'" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;">',
                    '<a href="#" class="btn btn-xs btn-danger destroy_add_revisi_sj" style="font-size: 12px;"><i class="fa fa-trash"></i></a>'
                ]).draw(false);

            }
        });

        $(document).on('click','.destroy_add_revisi_sj', function(){
            var table = $('#tbl_in_add_revisi_sj').DataTable();
            $('#tbl_in_add_revisi_sj tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
            var index = table.row('.selected').indexes();
                table.row(index).remove().draw(false);
            var jml_row = document.getElementById("jml_row_add_revisi_sj").value.trim();
                jml_row = Number(jml_row) + 1;
                nextRow = table.rows().count() + 1;

            for($i = nextRow; $i <= jml_row; $i++) {

                var no_po_add_revisi_sj = "no_po_add_revisi_sj" + $i;
                var no_po_add_revisi_sj_new = "no_po_add_revisi_sj" + ($i-1);
                    $(no_po_add_revisi_sj).attr({"id":no_po_add_revisi_sj_new, "name":no_po_add_revisi_sj_new});

                var status_po_add_revisi_sj = "status_po_add_revisi_sj" + $i;
                var status_po_add_revisi_sj_new = "status_po_add_revisi_sj" + ($i-1);
                    $(status_po_add_revisi_sj).attr({"id":status_po_add_revisi_sj_new, "name":status_po_add_revisi_sj_new});

                var kd_sup_add_revisi_sj = "kd_sup_add_revisi_sj" + $i;
                var kd_sup_add_revisi_sj_new = "kd_sup_add_revisi_sj" + ($i-1);
                    $(kd_sup_add_revisi_sj).attr({"id":kd_sup_add_revisi_sj_new, "name":kd_sup_add_revisi_sj_new});

                var nama_sup_add_revisi_sj = "nama_sup_add_revisi_sj" + $i;
                var nama_sup_add_revisi_sj_new = "nama_sup_add_revisi_sj" + ($i-1);
                    $(nama_sup_add_revisi_sj).attr({"id":nama_sup_add_revisi_sj_new, "name":nama_sup_add_revisi_sj_new});

                var no_sj_add_revisi_sj = "no_sj_add_revisi_sj" + $i;
                var no_sj_add_revisi_sj_new = "no_sj_add_revisi_sj" + ($i-1);
                    $(no_sj_add_revisi_sj).attr({"id":no_sj_add_revisi_sj_new, "name":no_sj_add_revisi_sj_new});

                var date_sj_add_revisi_sj = "date_sj_add_revisi_sj" + $i;
                var date_sj_add_revisi_sj_new = "date_sj_add_revisi_sj" + ($i-1);
                    $(date_sj_add_revisi_sj).attr({"id":date_sj_add_revisi_sj_new, "name":date_sj_add_revisi_sj_new});
            }
        });
    })

    // save po
    $(document).on('click','#submit_add_in_po', function(){
        var status_in = $('#status_in_po').val();

        if (status_in == '1') {
            var no_pol_material_add = $('#no_pol_material_add').val();
                driver_material_add = $('#driver_material_add').val();
                rak_material_add = $('#rak_material_add').val();
                bok_material_add = $('#bok_material_add').val();
                palet_material_add = $('#palet_material_add').val();

        } else if (status_in == '5') {
            var no_pol_material_add = $('#no_pol_revisi_sj_add').val();
                driver_material_add = $('#driver_revisi_sj_add').val();
                rak_material_add = $('#rak_revisi_sj_add').val();
                bok_material_add = $('#bok_revisi_sj_add').val();
                palet_material_add = $('#palet_revisi_sj_add').val();
        }

    var condtion = !no_pol_material_add || !driver_material_add || !rak_material_add || !bok_material_add || !palet_material_add

        if (condtion) {
            if (status_in == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Anda Belum Memilih Info IN !!',
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Perhatikan Inputan Anda! Form Tidak Boleh Kosong',
                });
            }
        } else {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('home.in.add.po') }}",
                type: "POST",
                data: $('#form-add-po').serialize(),
                dataType: 'json',
                    success: function(data){
                        console.log(data);
                        if($.isEmptyObject(data.error)){
                            if(data.status == false){
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Data tidak Tersimpan',
                                    text: 'Tidak ada PO!!!'
                                });
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!!',
                                    text: 'Menambahkan data!!',
                                    timer: 1200
                                }).then(function(){
                                    $('#modal-add-in-po').modal('hide');
                                    $('#tbl_cerate_in_psx').DataTable().ajax.reload();
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
        }
    });



    // ##add NON PO
    $('#addModalNonPo').click(function() {
        $('#modal-add-in-non-po').modal('show');

        function resetElement(element, table) {
            element.hide();
            element.find('input, textarea, select').val('');
            table.clear().draw();
        }

        var tableSwapp = $('#tbl_in_add_swapp').DataTable();
        var tableSjTemporary = $('#tbl_in_add_sj_temporary').DataTable();

        resetElement($('#in_non_po_rak_box'), tableSjTemporary);
        resetElement($('#in_non_po_kosong'), tableSjTemporary);
        resetElement($('#in_non_po_swapp'), tableSwapp);
        resetElement($('#in_non_po_sj_temporary'), tableSjTemporary);
        resetElement($('#in_non_po_sample'), tableSjTemporary);

        $('#in_non_po_rak_box').hide();
        $('#in_non_po_kosong').hide();
        $('#in_non_po_swapp').hide();
        $('#in_non_po_sj_temporary').hide();
        $('#in_non_po_sample').hide();

        $('#status_in_non_po').change(function() {
            const info_in = $('#status_in_non_po').val();

            resetElement($('#in_non_po_rak_box'), tableSjTemporary);
            resetElement($('#in_non_po_kosong'), tableSjTemporary);
            resetElement($('#in_non_po_swapp'), tableSwapp);
            resetElement($('#in_non_po_sj_temporary'), tableSjTemporary);
            resetElement($('#in_non_po_sample'), tableSjTemporary);

            if (info_in == '2') {
                $('#in_non_po_rak_box').show();
                $('#info_in_rakbox_add').val(info_in);
            } else if (info_in == '3') {
                $('#in_non_po_kosong').show();
                $('#info_in_kosong_add').val(info_in);
            } else if (info_in == '4') {
                $('#in_non_po_swapp').show();
                $('#info_in_swapp_add').val(info_in);
            } else if (info_in == '6') {
                $('#in_non_po_sj_temporary').show();
                $('#info_in_sj_temporary_add').val(info_in);
            } else if (info_in == '7') {
                $('#in_non_po_sample').show();
                $('#info_in_sample_add').val(info_in);
            }

        });
    });

    $(document).ready(function(){
        $('#Add_tbl_non_po_swapp').click(function(e){
            e.preventDefault();

            no_sj = $('#no_sj_swapp_add').val();
            date_sj = $('#date_sj_swapp_add').val();

            var condtion = !no_sj || !no_sj

            if (condtion) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Perhatikan Inputan Anda! Form Tidak Boleh Kosong',
                });
            } else {
                var table = $('#tbl_in_add_swapp').DataTable({
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

                var counter = $('#jml_row_add_swapp').val();
                var jml_row = Number(counter)+1;
                document.getElementById('jml_row_add_swapp').value = jml_row;

                no_sj_add_swapp = "no_sj_add_swapp_"+jml_row;
                date_sj_add_swapp = "date_sj_add_swapp_"+jml_row;

                table.row.add([
                    '<input type="text" name="no_sj_add_swapp_[]" id="' + no_sj_add_swapp + '" value="' + no_sj + '" class="form-control form-control-sm" readonly>',
                    '<input type="date" name="date_sj_add_swapp_[]" id="' + date_sj_add_swapp + '" value="'+ date_sj +'" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;">',
                    '<a href="#" class="btn btn-xs btn-danger destroy_add_swapp_" style="font-size: 12px;"><i class="fa fa-trash"></i></a>'
                ]).draw(false);

            }
        });

        $(document).on('click','.destroy_add_swapp_', function(){
            var table4 = $('#tbl_in_add_swapp').DataTable();
            $('#tbl_in_add_swapp tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                } else {
                    table4.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
            var index = table4.row('.selected').indexes();
                table4.row(index).remove().draw(false);
            var jml_row = document.getElementById("jml_row_add_swapp").value.trim();
                jml_row = Number(jml_row) + 1;
                nextRow = table4.rows().count() + 1;

            for($i = nextRow; $i <= jml_row; $i++) {

                var no_sj_add_swapp = "no_sj_add_swapp_" + $i;
                var no_sj_add_swapp_new = "no_sj_add_swapp_" + ($i-1);
                    $(no_sj_add_swapp).attr({"id":no_sj_add_swapp_new, "name":no_sj_add_swapp_new});

                var date_sj_add_swapp = "date_sj_add_swapp_" + $i;
                var date_sj_add_swapp_new = "date_sj_add_swapp_" + ($i-1);
                    $(date_sj_add_swapp).attr({"id":date_sj_add_swapp_new, "name":date_sj_add_swapp_new});
            }
        });


        $('#Add_tbl_non_po_temporary').click(function(e){
            e.preventDefault();

            no_sj = $('#no_sj_sj_temporary_add').val();
            date_sj = $('#date_sj_sj_temporary_add').val();

            var condtion = !no_sj || !no_sj

            if (condtion) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Perhatikan Inputan Anda! Form Tidak Boleh Kosong',
                });
            } else {
                var table = $('#tbl_in_add_sj_temporary').DataTable({
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

                var counter = $('#jml_row_add_sj_temporary').val();
                var jml_row = Number(counter)+1;
                document.getElementById('jml_row_add_sj_temporary').value = jml_row;

                no_sj_add_temporary = "no_sj_add_temporary"+jml_row;
                date_sj_add_temporary = "date_sj_add_temporary"+jml_row;

                table.row.add([
                    '<input type="text" name="no_sj_add_temporary[]" id="' + no_sj_add_temporary + '" value="' + no_sj + '" class="form-control form-control-sm" readonly>',
                    '<input type="date" name="date_sj_add_temporary[]" id="' + date_sj_add_temporary + '" value="'+ date_sj +'" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;">',
                    '<a href="#" class="btn btn-xs btn-danger destroy_add_temporary" style="font-size: 12px;"><i class="fa fa-trash"></i></a>'
                ]).draw(false);

            }
        });

        $(document).on('click','.destroy_add_temporary', function(){
            var table4 = $('#tbl_in_add_sj_temporary').DataTable();
            $('#tbl_in_add_sj_temporary tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                } else {
                    table4.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
            var index = table4.row('.selected').indexes();
                table4.row(index).remove().draw(false);
            var jml_row = document.getElementById("jml_row_add_sj_temporary").value.trim();
                jml_row = Number(jml_row) + 1;
                nextRow = table4.rows().count() + 1;

            for($i = nextRow; $i <= jml_row; $i++) {

                var no_sj_add_temporary = "no_sj_add_temporary" + $i;
                var no_sj_add_temporary_new = "no_sj_add_temporary" + ($i-1);
                    $(no_sj_add_temporary).attr({"id":no_sj_add_temporary_new, "name":no_sj_add_temporary_new});

                var date_sj_add_temporary = "date_sj_add_temporary" + $i;
                var date_sj_add_temporary_new = "date_sj_add_temporary" + ($i-1);
                    $(date_sj_add_temporary).attr({"id":date_sj_add_temporary_new, "name":date_sj_add_temporary_new});
            }
        });

    });

    // save non po
    $(document).on('click','#submit_add_in_non_po', function(){
        var status_in = $('#status_in_non_po').val();

        if (status_in == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Anda Belum Memilih Info IN !!',
            });

        } else {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('home.in.add.non.po') }}",
                type: "POST",
                data: $('#form-add-non-po').serialize(),
                dataType: 'json',
                    success: function(data){
                        console.log(data);
                        if($.isEmptyObject(data.error)){
                            if(data.status == false){
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Data tidak Tersimpan',
                                    text: 'Tidak ada SJ!!!'
                                });
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!!',
                                    text: 'Menambahkan data!!',
                                    timer: 1200
                                }).then(function(){
                                    $('#modal-add-in-non-po').modal('hide');
                                    $('#tbl_cerate_in_psx').DataTable().ajax.reload();
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
        }
    });


    // action view
    $(document).on('click','.createIn_View', function(){
        var sles_no = $(this).attr('row-id');
        var info_in_ = $(this).attr('row-infoIn');
            id = ([sles_no,info_in_]);

            $('#modal-view-in-all').modal('show');

            function resetElement(element, table) {
                element.hide();
                element.find('input, textarea, select').val('');
                table.clear().draw();
            }

            var tableMaterial = $('#tbl_in_view_material').DataTable();
            var tableRevisiSj = $('#tbl_in_add_revisi_sj').DataTable();
            var tableSwapp = $('#tbl_in_add_swapp').DataTable();
            var tableSjTemporary = $('#tbl_in_add_sj_temporary').DataTable();

            resetElement($('#view_in_material'), tableMaterial);
            resetElement($('#view_in_rak_box'), tableRevisiSj);
            resetElement($('#view_in_kosong'), tableSjTemporary);
            resetElement($('#view_in_swapp'), tableSjTemporary);
            resetElement($('#view_in_revisi_sj'), tableSwapp);
            resetElement($('#view_in_sj_temporary'), tableSjTemporary);
            resetElement($('#view_in_sample'), tableSjTemporary);

            $('#view_in_material').hide();
            $('#view_in_rak_box').hide();
            $('#view_in_kosong').hide();
            $('#view_in_swapp').hide();
            $('#view_in_revisi_sj').hide();
            $('#view_in_sj_temporary').hide();
            $('#view_in_sample').hide();

            if (info_in_ == '1') {
                $('#view_in_material').show();
            } else if (info_in_ == '2') {
                $('#view_in_rak_box').show();
            } else if (info_in_ == '3') {
                $('#view_in_kosong').show();
            } else if (info_in_ == '4') {
                $('#view_in_swapp').show();
            } else if (info_in_ == '5') {
                $('#view_in_revisi_sj').show();
            } else if (info_in_ == '6') {
                $('#view_in_sj_temporary').show();
            } else if (info_in_ == '7') {
                $('#view_in_sample').show();
            }


        var route  = "{{ route('home.in.view', ':id') }}";
            route  = route.replace(':id', id);
            $.ajax({
                url:      route,
                method:   'get',
                dataType: 'json',
                success:function(data){
                    info_in = data['info_in'];

                    if (info_in == '1') {
                        $('#sles_no_material_view_in').val(data['header'].sles_no);
                        $('#no_pol_material_view_in').val(data['header'].no_pol);
                        $('#driver_material_view_in').val(data['header'].driver);
                        $('#rak_material_view_in').val(data['header'].rak);
                        $('#bok_material_view_in').val(data['header'].box);
                        $('#palet_material_view_in').val(data['header'].palet);

                        var detailDataset = [];
                        for(var i = 0; i < data['detail'].length; i++){
                            detailDataset.push([
                                data['detail'][i].no_po,
                                data['detail'][i].status_po,
                                data['detail'][i].kd_sup,
                                data['detail'][i].name_sup,
                                data['detail'][i].no_sj,
                                data['detail'][i].date_sj,
                        ]);
                        }
                        $('#tbl_in_view_material').DataTable().clear().destroy();
                        $('#tbl_in_view_material').DataTable({
                            "paging":  true,
                            "scrollY": '250px',
                            "scrollCollapse": true,
                            "columnDefs": [
                                {
                                    "targets": [0, 1, 2, 5 ],
                                    "className": "text-center"
                                }
                            ],
                            data: detailDataset,
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
                        $('#sles_no_rakbok_view_in').val(data['header'].sles_no);
                        $('#no_pol_rakbok_view_in').val(data['header'].no_pol);
                        $('#driver_rakbok_view_in').val(data['header'].driver);
                        $('#kd_sup_rakbok_view_in').val(data['header'].kd_sup);
                        $('#nama_sup_rakbok_view_in').val(data['header'].name_sup);
                        $('#rak_rakbok_view_in').val(data['header'].rak);
                        $('#bok_rakbok_view_in').val(data['header'].box);
                        $('#palet_rakbok_view_in').val(data['header'].palet);

                    } else if (info_in == '3') {
                        $('#sles_no_kosong_view_in').val(data['header'].sles_no);
                        $('#no_pol_kosong_view_in').val(data['header'].no_pol);
                        $('#driver_kosong_view_in').val(data['header'].driver);
                        $('#kd_sup_kosong_view_in').val(data['header'].kd_sup);
                        $('#nama_sup_kosong_view_in').val(data['header'].name_sup);

                    } else if (info_in == '4') {
                        $('#sles_no_swapp_view_in').val(data['header'].sles_no);
                        $('#no_pol_swapp_view_in').val(data['header'].no_pol);
                        $('#driver_swapp_view_in').val(data['header'].driver);
                        $('#kd_sup_swapp_view_in').val(data['header'].kd_sup);
                        $('#nama_sup_swapp_view_in').val(data['header'].name_sup);
                        $('#rak_swapp_view_in').val(data['header'].rak);
                        $('#bok_swapp_view_in').val(data['header'].box);
                        $('#palet_swapp_view_in').val(data['header'].palet);

                        var detailDataset = [];
                        for(var i = 0; i < data['detail'].length; i++){
                            detailDataset.push([
                                data['detail'][i].no_sj,
                                data['detail'][i].date_sj,
                        ]);
                        }
                        $('#tbl_in_view_swapp').DataTable().clear().destroy();
                        $('#tbl_in_view_swapp').DataTable({
                            "paging":  true,
                            "scrollY": '250px',
                            "scrollCollapse": true,
                            "columnDefs": [
                                {
                                    "targets": [1],
                                    "className": "text-center"
                                }
                            ],
                            data: detailDataset,
                            columns: [
                                { title: 'No Sj' },
                                { title: 'Date Sj'},
                            ]
                        });

                    } else if (info_in == '5') {
                        $('#sles_no_revisi_sj_view_in').val(data['header'].sles_no);
                        $('#no_pol_revisi_sj_view_in').val(data['header'].no_pol);
                        $('#driver_revisi_sj_view_in').val(data['header'].driver);
                        $('#rak_revisi_sj_view_in').val(data['header'].rak);
                        $('#bok_revisi_sj_view_in').val(data['header'].box);
                        $('#palet_revisi_sj_view_in').val(data['header'].palet);
                        $('#ket_revisi_sj_view_in').val(data['header'].ket);

                        var detailDataset = [];
                        for(var i = 0; i < data['detail'].length; i++){
                            detailDataset.push([
                                data['detail'][i].no_po,
                                data['detail'][i].status_po,
                                data['detail'][i].kd_sup,
                                data['detail'][i].name_sup,
                                data['detail'][i].no_sj,
                                data['detail'][i].date_sj,
                        ]);
                        }
                        $('#tbl_in_view_revisi_sj').DataTable().clear().destroy();
                        $('#tbl_in_view_revisi_sj').DataTable({
                            "paging":  true,
                            "scrollY": '250px',
                            "scrollCollapse": true,
                            "columnDefs": [
                                {
                                    "targets": [0, 1, 2, 5 ],
                                    "className": "text-center"
                                }
                            ],
                            data: detailDataset,
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
                        $('#sles_no_sj_temporary_view_in').val(data['header'].sles_no);
                        $('#no_pol_sj_temporary_view_in').val(data['header'].no_pol);
                        $('#driver_sj_temporary_view_in').val(data['header'].driver);
                        $('#kd_sup_sj_temporary_view_in').val(data['header'].kd_sup);
                        $('#nama_sup_sj_temporary_view_in').val(data['header'].name_sup);
                        $('#rak_sj_temporary_view_in').val(data['header'].rak);
                        $('#bok_sj_temporary_view_in').val(data['header'].box);
                        $('#palet_sj_temporary_view_in').val(data['header'].palet);
                        $('#ket_sj_temporary_view_in').val(data['header'].ket);

                        var detailDataset = [];
                        for(var i = 0; i < data['detail'].length; i++){
                            detailDataset.push([
                                data['detail'][i].no_sj,
                                data['detail'][i].date_sj,
                        ]);
                        }
                        $('#tbl_in_view_sj_temporary').DataTable().clear().destroy();
                        $('#tbl_in_view_sj_temporary').DataTable({
                            "paging":  true,
                            "scrollY": '250px',
                            "scrollCollapse": true,
                            "columnDefs": [
                                {
                                    "targets": [1],
                                    "className": "text-center"
                                }
                            ],
                            data: detailDataset,
                            columns: [
                                { title: 'No Sj' },
                                { title: 'Date Sj'},
                            ]
                        });

                    } else if (info_in == '7') {
                        $('#sles_no_sample_view_in').val(data['header'].sles_no);
                        $('#no_pol_sample_view_in').val(data['header'].no_pol);
                        $('#driver_sample_view_in').val(data['header'].driver);
                        $('#kd_sup_sample_view_in').val(data['header'].kd_sup);
                        $('#nama_sup_sample_view_in').val(data['header'].name_sup);
                        $('#ket_sj_sample_view_in').val(data['header'].ket);
                    }
                }
            });


    })

    // action deleted
    $(document).on('click','.createIn_Deleted', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $(this).attr('row-id');
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Deleted it!'
        }).
        then((willDelete) => {
            var route  = "{{ route('home.in.delete', ':id') }}",
            route  = route.replace(':id', id);
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
                                $('#tbl_cerate_in_psx').DataTable().ajax.reload();
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

    $(".datetime-picker").datetimepicker({
        date: moment(),
        format: "YYYY-MM-DD",
        useCurrent: true
    });


</script>

@endsection

@push('js')
<!-- Datatables -->
<script src="{{ asset('Datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush


