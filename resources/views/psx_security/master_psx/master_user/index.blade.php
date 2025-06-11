@extends('layouts.masterHome')

@section('title', 'Master User - SLES')

@section('css')
<!-- DATATABLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('Datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"  type="text/css" href="{{asset('datetimepicker/css/bootstrap-datetimepicker.css')}}"/>
<script src="{{asset('datetimepicker/js/jquery.min.js')}}"></script>
<script src="{{asset('datetimepicker/js/moment.min.js')}}"></script>
<script src="{{asset('datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<style>
    .custominput {
        outline: 1px solid #b3cee5;
    }
</style>
@endsection

@section('page-title')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">View User</h4>
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
<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="#">
                <div class="form-row">
                    &nbsp;&nbsp;
                    <button type="button" id="addDataUser" class="btn btn-info btn-sm btn-icon-text">
                        + Tambah
                        <i class="menu-icon mdi mdi-library-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-1">
            <div class="card">
                <div class="card-body">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="datatable datatable-primary">
                                <div class="table-responsive">
                                        <table id="tbl_view_psx"
                                            class="table table-striped table-bordered table-hover" width="100%">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>NIK</th>
                                                    <th>Email</th>
                                                    <th>Pass</th>
                                                    <th>Create Date</th>
                                                    <th>Update Date</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_item">
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

@include('psx_security.master_psx.master_user.modal.create');
@include('psx_security.master_psx.master_user.modal.edit');





@endsection
@push('js')
<!-- Datatables -->
<script src="{{ asset('Datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
// bikin table
    $(document).ready(function() {

        var table = $('#tbl_view_psx').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('master.index.datatable') }}",
            },
            "oLanguage": {
            "sSearch": "Filter Data"
            },
            "columnDefs": [
                {
                "targets": 0,
                "className": "text-center",
                },
                {
                "targets": 2,
                "className": "text-center",
                },
                {
                "targets": 7,
                "className": "text-center",
                },
                {
                "targets": 8,
                "className": "text-center",
                }
                ],
                order: [[ 1, 'asc']],
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
                { data: 'name', name: 'name' },
                { data: 'nik', name: 'nik' },
                { data: 'email', name: 'email' },
                { data: 'pass_list', name: 'pass_list' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'is_admin', name: 'is_admin' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });

    $('#addDataUser').click(function() {
        $('#create-modal-user').modal('show');

    })

    $(document).ready(function() {
        $('#create-modal-user').on('hidden.bs.modal', function () {
            clearValueUser();
        });


    });

    function clearValueUser() {
        $('#nik').val("");
        $('#nama').val("");
        $('#email').val("");
        $('#password').val("");
        $('#role').val("");
    }

    $('#submit_user').click(function() {
        var nik = $('#nik').val();
            nama = $('#nama').val();
            email = $('#email').val();
            password = $('#password').val();
            role = $('#role').val();
        // alert(nik);

        if ( !nik || !nama || !email || !password || !role ) {
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian!',
                text: 'Terjadi kesalahan! Form tidak boleh kosong',
            })
        } else {
            $.ajax({
                url: "{{ route('master.addUser') }}",
                type: 'POST',
                data: $('#form-create-user').serialize(),
                success: function (response) {
                    console.log(response)
                    if (response.msg == 'ada') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Perhatian!',
                            text: 'Data NIK sudah dipakai!!',
                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'success!',
                            text: 'Data Berhasil di tambahkan!!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#create-modal-user').modal('hide');
                        $('#tbl_view_psx').DataTable().ajax.reload();

                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'error!',
                        text: 'Hub Admin!!',
                    })
                }
            });
        }
    })

    // DELETED
    $(document).on('click','.deletedData', function(){
        var get_id = $(this).attr('row-id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Deleted it!'
        }).
        then((willDelete) => {
            var route  = "{{ route('master.deleteUser', ':id') }}",
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
                                timer: 1000
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

    // edit
    $(document).on('click','.editDataUser', function(){
        var id = $(this).attr('row-id');
        $('#edit-modal-user').modal('show');

        var route = "{{ route('master.editUser', 'id') }}";
        var url   = route.replace('id', id);
        $.ajax({
          url: url,
          method: 'GET',
          dataType: 'JSON',
          success:function(data){
            // console.log(data.nip);
            $('#id_user_edit').val(data.id);
            $('#nik_edit').val(data.nik);
            $('#nama_edit').val(data.name);
            $('#email_edit').val(data.email);
            $('#password_edit').val(data.pass_list);
            $('#role_edit').val(data.is_admin);
          },
          error: function(){
            alert('error');
          }
        })
    });

    $('#submit_user_edit').click(function() {
        // alert('ada');
        var id = $('#id_user_edit').val();
            nik = $('#nik_edit').val();
            nama = $('#nama_edit').val();
            email = $('#email_edit').val();
            password = $('#password_edit').val();
            role = $('#role_edit').val();

        if ( !nik || !nama  || !email || !password || !role ) {
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian!',
                text: 'Terjadi kesalahan! Form tidak boleh kosong',
            })
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var route = "{{ route('master.updateUser', 'id') }}";
            var url = route.replace('id', id);
            $.ajax({
                url: url,
                type: "PUT",
                data: $('#form-edit-user').serialize(),
                success: function (data) {
                    if (data.msg == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'success!',
                            text: 'Data Berhasil di update!!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#edit-modal-user').modal('hide');
                        $('#tbl_view_psx').DataTable().ajax.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesaalahan hubungi Admin!',
                        })
                    }
                }
            })
        }
    });




</script>
@endpush


