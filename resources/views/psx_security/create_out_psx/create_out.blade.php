@extends('layouts.masterHome')

@section('title', 'Out - SLES')

@section('css')
<!-- DATATABLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('Datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"  type="text/css" href="{{asset('datetimepicker/css/bootstrap-datetimepicker.css')}}"/>
<script src="{{asset('datetimepicker/js/jquery.min.js')}}"></script>
<script src="{{asset('datetimepicker/js/moment.min.js')}}"></script>
<style>

    .additional-text {
        display: inline-block;
        padding: 5px 10px;
        /* margin-left: 1px; */
        font-size: 14px;
        border-radius: 4px;
        font-weight: bold;
    }

    .bawa-barang {
        background-color: #218838;
        color: white;
    }

    .bawa-rak-box {
        background-color: #E0A800;
        color: black;
    }

    .kosong {
        background-color: #C82333;
        color: white;
    }
</style>
@endsection

@section('page-title')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Supplier Keluar</h4>
                    <button ty  pe='button' onclick="refreshSupIn()" class='btn btn-sm btn-info'><i class="ti-reload"></i>   Refresh</button>
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
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="datatable datatable-primary">
                                <div class="table-responsive">
                                    <table id="tbl_cerate_out_psx" class="table table-striped table-hover" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="10%">Sles No</th>
                                                <th width="25%">Nama Supplier</th>
                                                <th width="10%">No Pol</th>
                                                <th width="10%">Driver</th>
                                                <th width="10%">Date</th>
                                                <th width="10%">In</th>
                                                <th width="15%">Info In</th>
                                                <th width="10%">Action</th>
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
@include('psx_security.create_out_psx.modal.edit')
@include('psx_security.create_out_psx.modal.out_material')
@include('psx_security.create_out_psx.modal.out_rak_box')
@include('psx_security.create_out_psx.modal.view.view_out_all')


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // datatable
    $(document).ready(function() {
        //get data from datatables
        var table = $('#tbl_cerate_out_psx').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('home.out.datatables') }}",
            },
            "oLanguage": {
            "sSearch": "Filter Data"
            },
            "columnDefs": [
                {
                    "targets": [0, 1, 4, 5, 6, 7, 8],
                    "className": "text-center"
                }
            ],
            order: [[ 1, 'asc'],[ 5, 'asc']],
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
            { data: 'no_pol', name: 'no_pol' },
            { data: 'driver', name: 'driver' },
            { data: 'create_date', name: 'create_date' },
            { data: 'in', name: 'in' },
            { data: 'info_in', name: 'info_in' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

    function refreshSupIn()
    {
        $('#tbl_cerate_out_psx').DataTable().ajax.reload();
    }

    // hidden modal
    $(document).ready(function(){
        $('#modal-out-material').on('hidden.bs.modal', function(){
            $('#sles_no_out_material').val('');
            $('#no_pol_out_material').val('');
            $('#nama_sup_out_material').val('');
            $('#rak_out_material').val('');
            $('#bok_out_material').val('');
            $('#palet_out_material').val('');
            var table = $('#tbl_out_material_sj').DataTable();
                table.rows().remove().draw();
            $('#tbl_cerate_out_psx').DataTable().ajax.reload();
        });
        $('#modal-out-rakbox').on('hidden.bs.modal', function(){
            $('#sles_no_out_rakbox').val('');
            $('#no_pol_out_rakbox').val('');
            $('#nama_sup_out_rakbox').val('');
            $('#rak_out_rakbox').val('');
            $('#bok_out_rakbox').val('');
            $('#palet_out_rakbox').val('');
            $('#no_sj_out_rakbox').val('');
            $('#date_sj_out_rakbox').val('');
            $('#tbl_cerate_out_psx').DataTable().ajax.reload();
        });

        $('#modal-view-out-all').on('hidden.bs.modal', function(){
            $('#tbl_cerate_out_psx').DataTable().ajax.reload();
        });
    });


    // out bawa material
    $(document).on('click','.OutBawaBarang', function(){
        $('#modal-out-material').modal('show');
        var sles_no = $(this).attr('row-id');
        var no_pol = $(this).attr('row-nopol');
        var name_sup = $(this).attr('row-name');
            $('#sles_no_out_material').val(sles_no)
            $('#no_pol_out_material').val(no_pol)
            $('#nama_sup_out_material').val(name_sup)
    });

    document.getElementById('rak_out_material').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('bok_out_material').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('palet_out_material').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });

    $(document).ready(function () {
    $('#addRowOutMaterial').click(function (e) {
        e.preventDefault();

        const table = $('#tbl_out_material_sj').DataTable({
            stateSave: true,
            "bDestroy": true,
            paging: false,
            searching: false,
            language: {
                info: ""
            },
            "columnDefs": [{
                "targets": [0, 1, 2],
                "className": "text-center",
                "orderable": false,
            }],
        });

        const counter = $('#jml_row_out_material_sj').val();
        const jml_row = Number(counter) + 1;
        $('#jml_row_out_material_sj').val(jml_row);

        const no_sj_out_material = "no_sj_out_material" + jml_row;
        const date_sj_out_material = "date_sj_out_material" + jml_row;

        // Get current date in YYYY-MM-DD format
        const today = new Date().toISOString().split('T')[0];

        // Add the row with a read-only date field
        table.row.add([
            `<input type="text" name="no_sj_out_material[]" id="${no_sj_out_material}" maxlength="20" class="form-control form-control-sm no_sj_out_material">`,
            `<input type="text" name="date_sj_out_material[]" id="${date_sj_out_material}" class="form-control form-control-sm date_sj_out_material" value="${today}" readonly style="pointer-events: none;">`,
            `<a href="#" class="btn btn-xs btn-danger destroy_out_material_sj" style="font-size: 12px;"><i class="fa fa-trash"></i></a>`
        ]).draw(false);
    });
});


    $(document).on('click','.destroy_out_material_sj', function(){
        var table = $('#tbl_out_material_sj').DataTable();
        $('#tbl_out_material_sj tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
        var index = table.row('.selected').indexes();
            table.row(index).remove().draw(false);
        var jml_row = document.getElementById("jml_row_out_material_sj").value.trim();
            jml_row = Number(jml_row) + 1;
            nextRow = table.rows().count() + 1;

        for($i = nextRow; $i <= jml_row; $i++) {

            var no_sj_out_material = "no_sj_out_material" + $i;
            var no_sj_out_material_new = "no_sj_out_material" + ($i-1);
                $(no_sj_out_material).attr({"id":no_sj_out_material_new, "name":no_sj_out_material_new});

            var date_sj_out_material = "date_sj_out_material" + $i;
            var date_sj_out_material_new = "date_sj_out_material" + ($i-1);
                $(date_sj_out_material).attr({"id":date_sj_out_material_new, "name":date_sj_out_material_new});
        }
    });

    // save out material
    $(document).on('click','#submit_out_material', function(){
        var rak_out_material = $('#rak_out_material').val();
            bok_out_material = $('#bok_out_material').val();
            palet_out_material = $('#palet_out_material').val();

    var condtion = !rak_out_material || !bok_out_material || !palet_out_material

        if (condtion) {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Perhatikan Inputan Anda! Form Tidak Boleh Kosong',
            });
        } else {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('home.out.add.material') }}",
                type: "POST",
                data: $('#form-out-material').serialize(),
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
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!!',
                                    text: 'Menambahkan data!!',
                                    timer: 1200
                                }).then(function(){
                                    $('#modal-out-material').modal('hide');
                                    $('#tbl_cerate_out_psx').DataTable().ajax.reload();
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

    // out bawa rak bok
    $(document).on('click','.OutBawaBox', function(){
        $('#modal-out-rakbox').modal('show');
        var sles_no = $(this).attr('row-id');
        var no_pol = $(this).attr('row-nopol');
        var name_sup = $(this).attr('row-name');
            $('#sles_no_out_rakbox').val(sles_no)
            $('#no_pol_out_rakbox').val(no_pol)
            $('#nama_sup_out_rakbox').val(name_sup)
    });

    document.getElementById('rak_out_rakbox').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('bok_out_rakbox').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });
    document.getElementById('palet_out_rakbox').addEventListener('input', function () {
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });

    // save out rakbok
    $(document).on('click','#submit_out_rakbox', function(){
        var no_sj_out_rakbox = $('#no_sj_out_rakbox').val();
            date_sj_out_rakbox = $('#rak_out_rakbox').val();
            rak_out_rakbox = $('#rak_out_rakbox').val();
            bok_out_rakbox = $('#bok_out_rakbox').val();
            palet_out_rakbox = $('#palet_out_rakbox').val();

    var condtion = !no_sj_out_rakbox || !date_sj_out_rakbox || !rak_out_rakbox || !bok_out_rakbox ||
                   !palet_out_rakbox

        if (condtion) {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Perhatikan Inputan Anda! Form Tidak Boleh Kosong',
            });
        } else {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('home.out.add.rakbox') }}",
                type: "POST",
                data: $('#form-out-rakbox').serialize(),
                dataType: 'json',
                    success: function(data){
                        console.log(data);
                        if($.isEmptyObject(data.error)){
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!!',
                                text: 'Menambahkan data!!',
                                timer: 1200
                            }).then(function(){
                                $('#modal-out-rakbox').modal('hide');
                                $('#tbl_cerate_out_psx').DataTable().ajax.reload();
                            })

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

    // out Kosong
    $(document).on('click','.OutKosong', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $(this).attr('row-id');
        Swal.fire({
            title: 'Apakah anda yakin ingin update data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update it!'
        }).
        then((willDelete) => {
            var route  = "{{ route('home.out.kosong', ':id') }}";
            route  = route.replace(':id', id);
            if(willDelete.value){
                $.ajax({
                    url:      route,
                    method:   'get',
                    dataType: 'json',
                    success:function(data){
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'success!',
                                text: 'Data Berhasil di update!!'
                            }).then(function(){
                                $('#tbl_cerate_out_psx').DataTable().ajax.reload();
                            });
                        }
                    },
                    error: function(){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!!',
                            text: 'Error Hub Admin!',
                        })
                    }
                })

            } else {

            }

        })
    });

    // action view
    $(document).on('click','.createOut_View', function(){
        var sles_no = $(this).attr('row-id');
        var info_in_ = $(this).attr('row-infoIn');
            id = ([sles_no,info_in_]);

            $('#modal-view-out-all').modal('show');

            function resetElement(element, table) {
                element.hide();
                element.find('input, textarea, select').val('');
                table.clear().draw();
            }

            var tableMaterial = $('#tbl_out_view_material').DataTable();
            var tableRevisiSj = $('#tbl_out_add_revisi_sj').DataTable();
            var tableSwapp = $('#tbl_out_add_swapp').DataTable();
            var tableSjTemporary = $('#tbl_out_add_sj_temporary').DataTable();

            resetElement($('#view_out_material'), tableMaterial);
            resetElement($('#view_out_rak_box'), tableRevisiSj);
            resetElement($('#view_out_kosong'), tableSjTemporary);
            resetElement($('#view_out_swapp'), tableSjTemporary);
            resetElement($('#view_out_revisi_sj'), tableSwapp);
            resetElement($('#view_out_sj_temporary'), tableSjTemporary);
            resetElement($('#view_out_sample'), tableSjTemporary);

            $('#view_out_material').hide();
            $('#view_out_rak_box').hide();
            $('#view_out_kosong').hide();
            $('#view_out_swapp').hide();
            $('#view_out_revisi_sj').hide();
            $('#view_out_sj_temporary').hide();
            $('#view_out_sample').hide();

            if (info_in_ == '1') {
                $('#view_out_material').show();
            } else if (info_in_ == '2') {
                $('#view_out_rak_box').show();
            } else if (info_in_ == '3') {
                $('#view_out_kosong').show();
            } else if (info_in_ == '4') {
                $('#view_out_swapp').show();
            } else if (info_in_ == '5') {
                $('#view_out_revisi_sj').show();
            } else if (info_in_ == '6') {
                $('#view_out_sj_temporary').show();
            } else if (info_in_ == '7') {
                $('#view_out_sample').show();
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
                        $('#sles_no_material_view_out').val(data['header'].sles_no);
                        $('#no_pol_material_view_out').val(data['header'].no_pol);
                        $('#driver_material_view_out').val(data['header'].driver);
                        $('#rak_material_view_out').val(data['header'].rak);
                        $('#bok_material_view_out').val(data['header'].box);
                        $('#palet_material_view_out').val(data['header'].palet);

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
                        $('#tbl_out_view_material').DataTable().clear().destroy();
                        $('#tbl_out_view_material').DataTable({
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
                        $('#sles_no_rakbok_view_out').val(data['header'].sles_no);
                        $('#no_pol_rakbok_view_out').val(data['header'].no_pol);
                        $('#driver_rakbok_view_out').val(data['header'].driver);
                        $('#kd_sup_rakbok_view_out').val(data['header'].kd_sup);
                        $('#nama_sup_rakbok_view_out').val(data['header'].name_sup);
                        $('#rak_rakbok_view_out').val(data['header'].rak);
                        $('#bok_rakbok_view_out').val(data['header'].box);
                        $('#palet_rakbok_view_out').val(data['header'].palet);

                    } else if (info_in == '3') {
                        $('#sles_no_kosong_view_out').val(data['header'].sles_no);
                        $('#no_pol_kosong_view_out').val(data['header'].no_pol);
                        $('#driver_kosong_view_out').val(data['header'].driver);
                        $('#kd_sup_kosong_view_out').val(data['header'].kd_sup);
                        $('#nama_sup_kosong_view_out').val(data['header'].name_sup);

                    } else if (info_in == '4') {
                        $('#sles_no_swapp_view_out').val(data['header'].sles_no);
                        $('#no_pol_swapp_view_out').val(data['header'].no_pol);
                        $('#driver_swapp_view_out').val(data['header'].driver);
                        $('#kd_sup_swapp_view_out').val(data['header'].kd_sup);
                        $('#nama_sup_swapp_view_out').val(data['header'].name_sup);
                        $('#rak_swapp_view_out').val(data['header'].rak);
                        $('#bok_swapp_view_out').val(data['header'].box);
                        $('#palet_swapp_view_out').val(data['header'].palet);

                        var detailDataset = [];
                        for(var i = 0; i < data['detail'].length; i++){
                            detailDataset.push([
                                data['detail'][i].no_sj,
                                data['detail'][i].date_sj,
                        ]);
                        }
                        $('#tbl_out_view_swapp').DataTable().clear().destroy();
                        $('#tbl_out_view_swapp').DataTable({
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
                        $('#sles_no_revisi_sj_view_out').val(data['header'].sles_no);
                        $('#no_pol_revisi_sj_view_out').val(data['header'].no_pol);
                        $('#driver_revisi_sj_view_out').val(data['header'].driver);
                        $('#rak_revisi_sj_view_out').val(data['header'].rak);
                        $('#bok_revisi_sj_view_out').val(data['header'].box);
                        $('#palet_revisi_sj_view_out').val(data['header'].palet);
                        $('#ket_revisi_sj_view_out').val(data['header'].ket);

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
                        $('#tbl_out_view_revisi_sj').DataTable().clear().destroy();
                        $('#tbl_out_view_revisi_sj').DataTable({
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
                        $('#sles_no_sj_temporary_view_out').val(data['header'].sles_no);
                        $('#no_pol_sj_temporary_view_out').val(data['header'].no_pol);
                        $('#driver_sj_temporary_view_out').val(data['header'].driver);
                        $('#kd_sup_sj_temporary_view_out').val(data['header'].kd_sup);
                        $('#nama_sup_sj_temporary_view_out').val(data['header'].name_sup);
                        $('#rak_sj_temporary_view_out').val(data['header'].rak);
                        $('#bok_sj_temporary_view_out').val(data['header'].box);
                        $('#palet_sj_temporary_view_out').val(data['header'].palet);
                        $('#ket_sj_temporary_view_out').val(data['header'].ket);

                        var detailDataset = [];
                        for(var i = 0; i < data['detail'].length; i++){
                            detailDataset.push([
                                data['detail'][i].no_sj,
                                data['detail'][i].date_sj,
                        ]);
                        }
                        $('#tbl_out_view_sj_temporary').DataTable().clear().destroy();
                        $('#tbl_out_view_sj_temporary').DataTable({
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
                        $('#sles_no_sample_view_out').val(data['header'].sles_no);
                        $('#no_pol_sample_view_out').val(data['header'].no_pol);
                        $('#driver_sample_view_out').val(data['header'].driver);
                        $('#kd_sup_sample_view_out').val(data['header'].kd_sup);
                        $('#nama_sup_sample_view_out').val(data['header'].name_sup);
                    }
                }
            });
    })




</script>

@endsection

@push('js')
<!-- Datatables -->
<script src="{{ asset('Datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush


