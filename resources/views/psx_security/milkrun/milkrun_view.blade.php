@extends('layouts.masterHome')

@section('title', 'Milkrun - SLES')

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
        font-size: 15px;
        font-weight: 600;
        width: 200px; /* Uniform width based on longest label */
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s ease;
    }

    .custom-button:hover {
        transform: scale(1.05);
    }
</style>
@endsection

@section('page-title')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Milkrun</h4>
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
    <div class="row mt-4 justify-content-center text-center">
    <div class="col-auto">
        <button type="button" class="btn btn-success custom-button" id="addModalBawaBarang">
            <i class="fa fa-plus-square"></i>&nbsp;Bawa Barang
        </button>
    </div>
    <div class="col-auto">
        <button type="button" class="btn btn-danger custom-button" id="addModalKosong">
            <i class="fa fa-plus-square"></i>&nbsp;Kosong
        </button>
    </div>
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
                                    <table id="tbl_milkrun" class="table table-striped table-hover" width="100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="10%">DN Number / SJ Number</th>
                                                <th width="25%">No Pol</th>
                                                <th width="10%">Status</th>
                                                <th width="10%">Vendor name</th>
                                                <th width="10%">Vendor ID</th>
                                                <th width="10%">Date</th>
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

@include('psx_security.milkrun.modal.bawa_barang')
@include('psx_security.milkrun.modal.kosong')
@include('psx_security.milkrun.modal.supplier_pop_up')

<script src="{{ asset('Datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>

//barang


$(document).ready(function () {
    function loadMilkrunData() {
        $.get("{{ route('milkrun.data') }}", function (data) {
            let html = '';
            data.forEach((entry, index) => {
                html += `
                    <tr>
                        <td class="text-center">${index + 1}</td>
                        <td class="text-center">${entry.dnjs_number}</td>
                        <td>${entry.no_pol}</td>
                        <td>${entry.status}</td>
                        <td>${entry.vendor_name}</td>
                        <td>${entry.vendor_id}</td>
                        <td>${entry.date}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-danger" data-id="${entry.id}">Delete</button>
                        </td>
                    </tr>
                `;
            });
            $('#body_item').html(html);
        }).fail(() => {
            $('#body_item').html('<tr><td colspan="8" class="text-center text-danger">Failed to load data</td></tr>');
        });
    }

    loadMilkrunData();
});
let barangData = [];

$(document).ready(function () {
    $('#addModalBawaBarang').on('click', function () {
        $('#modalBawaBarang').modal('show');
    });

    // Vendor selection
    $('#vendor_name_barang').on('click', function () {
        $('#modal_supplier_list').data('targetField', 'vendor_name_barang').modal('show');

        if (!$('#supplierTableBody').hasClass('loaded')) {
            $('#supplierTableBody').html('<tr><td colspan="3" class="text-center">Loading supplier data...</td></tr>');

            $.get('{{ route("get.suppliers") }}', function (data) {
                if (Array.isArray(data)) {
                    const rows = data.map(supplier => `
                        <tr class="supplier-row">
                            <td>${supplier.vendor}</td>
                            <td>${supplier.supplier_name}</td>
                            <td>${supplier.street}</td>
                        </tr>
                    `).join('');
                    $('#supplierTableBody').html(rows).addClass('loaded');
                } else {
                    $('#supplierTableBody').html('<tr><td colspan="3" class="text-danger text-center">Invalid supplier data</td></tr>');
                }
            }).fail(() => {
                $('#supplierTableBody').html('<tr><td colspan="3" class="text-danger text-center">Failed to load suppliers</td></tr>');
            });
        }
    });

    $(document).on('dblclick', '.supplier-row', function () {
        const vendorId = $(this).find('td:eq(0)').text().trim();
        const vendorName = $(this).find('td:eq(1)').text().trim();

        $('#vendor_id_barang').val(vendorId);
        $('#vendor_name_barang').val(vendorName);
        $('#modal_supplier_list').modal('hide');
    });

    $('#addBarangRow').on('click', function () {
        const no_pol = $('#no_pol_barang').val();
        const driver = $('#driver_barang').val();
        const vendor_name = $('#vendor_name_barang').val();
        const vendor_id = $('#vendor_id_barang').val();
        const date = $('#barang_datetime_barang').val();
        const initialSJ = $('#dn_number_barang').val().trim(); // optional pre-fill

        if (!no_pol || !driver || !vendor_name || !vendor_id || !date) {
            return swal.fire({
                icon: 'warning',
                title: 'Missing fields',
                text: 'Please fill all top input fields.'
            });
        }

        const rowData = {
            no_pol,
            driver,
            vendor_name,
            vendor_id,
            date,
            dnsj_number: initialSJ || '',
            date_sj: '',
            status: 'BAWA_BARANG'
        };

        barangData.push(rowData);
        const rowIndex = barangData.length - 1;

        const rowHTML = `
            <tr data-index="${rowIndex}">
                <td>${vendor_name}</td>
                <td>${vendor_id}</td>
                <td>${date}</td>
                <td>
                    <input type="text" class="form-control form-control-sm no-sj bg-warning" placeholder="Enter No SJ" value="${initialSJ}" />
                </td>
                <td>
                    <input type="date" class="form-control form-control-sm date-sj bg-warning" />
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        `;

        $('#barangItem').append(rowHTML);
        $('#dn_number_barang').val(''); // Clear after adding
    });

    $(document).on('click', '.remove-row', function () {
        const row = $(this).closest('tr');
        const index = row.data('index');
        barangData.splice(index, 1);
        row.remove();

        $('#barangItem tr').each(function (i) {
            $(this).attr('data-index', i);
        });
    });

    $('#saveBarang').on('click', function () {
        if (barangData.length === 0) {
            return swal.fire({
                icon: 'warning',
                title: 'No data',
                text: 'Add at least one row before saving.'
            });
        }

        let isValid = true;

        $('#barangItem tr').each(function () {
            const $row = $(this);
            const index = $row.data('index');

            const dnsj_number = $row.find('.no-sj').val()?.trim();
            const date_sj = $row.find('.date-sj').val()?.trim();

            if (!dnsj_number || !date_sj) {
                isValid = false;
                return false; // break
            }

            if (barangData[index]) {
                barangData[index].dnsj_number = dnsj_number;
                barangData[index].date_sj = date_sj;
            }
        });

        if (!isValid) {
            return swal.fire({
                icon: 'warning',
                title: 'Missing SJ Data',
                text: 'Please complete No SJ and Date SJ in the table.'
            });
        }

        swal.fire({
            icon: 'question',
            title: 'Confirm Save',
            text: 'Are you sure you want to save all entries?',
            showCancelButton: true,
            confirmButtonText: 'Save',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '{{ route("barang.save") }}',
                    type: 'POST',
                    data: { data: barangData },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res) {
                        swal.fire({
                            icon: 'success',
                            title: 'Saved!',
                            text: 'All data has been saved.'
                        });
                        barangData = [];
                        $('#barangItem').empty();
                        $('#modalBarang').modal('hide');

                        loadMilkrunData();
                    },
                    error: function (xhr) {
                        swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to save data.'
                        });
                    }
                });
            }
        });
    });

    // Reset barang modal when closed
    $('#modalBawaBarang').on('hidden.bs.modal', function () {
        barangData = [];
        $('#barangItem').empty();
        $('#no_pol_barang, #driver_barang, #vendor_name_barang, #vendor_id_barang, #barang_datetime_barang, #dn_number_barang').val('');
    });

});


//Kosong
let kosongData = [];

$(document).ready(function () {
    // Show modal
    $('#addModalKosong').on('click', function () {
        $('#modalKosong').modal('show');
    });

    // Vendor selection
    $('#vendor_name_kosong').on('click', function () {
        $('#modal_supplier_list').data('targetField', 'vendor_name_kosong').modal('show');

        if (!$('#supplierTableBody').hasClass('loaded')) {
            $('#supplierTableBody').html('<tr><td colspan="3" class="text-center">Loading supplier data...</td></tr>');

            $.get('{{ route("get.suppliers") }}', function (data) {
                if (Array.isArray(data)) {
                    const rows = data.map(supplier => `
                        <tr class="supplier-row">
                            <td>${supplier.vendor}</td>
                            <td>${supplier.supplier_name}</td>
                            <td>${supplier.street}</td>
                        </tr>
                    `).join('');
                    $('#supplierTableBody').html(rows).addClass('loaded');
                } else {
                    $('#supplierTableBody').html('<tr><td colspan="3" class="text-danger text-center">Invalid supplier data</td></tr>');
                }
            }).fail(() => {
                $('#supplierTableBody').html('<tr><td colspan="3" class="text-danger text-center">Failed to load suppliers</td></tr>');
            });
        }
    });

    $(document).on('dblclick', '.supplier-row', function () {
        const vendorId = $(this).find('td:eq(0)').text().trim();
        const vendorName = $(this).find('td:eq(1)').text().trim();

        $('#vendor_id_kosong').val(vendorId);
        $('#vendor_name_kosong').val(vendorName);
        $('#modal_supplier_list').modal('hide');
    });

    $('#addBarangRow').on('click', function () {
        const no_pol = $('#no_pol_kosong').val();
        const driver = $('#driver_kosong').val();
        const vendor_name = $('#vendor_name_kosong').val();
        const vendor_id = $('#vendor_id_kosong').val();
        const date = $('#barang_datetime').val();

        if (!no_pol || !driver || !vendor_name || !vendor_id || !date) {
            return swal.fire({
                icon: 'warning',
                title: 'Missing fields',
                text: 'Please fill all top input fields.'
            });
        }

        const rowData = {
            no_pol,
            driver,
            vendor_name,
            vendor_id,
            date,
            status: 'KOSONG'
        };

        kosongData.push(rowData);

        const rowIndex = kosongData.length - 1;

        const rowHTML = `
            <tr data-index="${rowIndex}">
                <td>${no_pol}</td>
                <td>${driver}</td>
                <td>${vendor_name}</td>
                <td>${vendor_id}</td>
                <td>${date}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        `;

        $('#tableDN tbody').append(rowHTML);
    });

    $(document).on('click', '.remove-row', function () {
        const row = $(this).closest('tr');
        const index = row.data('index');
        kosongData.splice(index, 1);
        row.remove();

        // Reindex
        $('#tableDN tbody tr').each(function (i) {
            $(this).attr('data-index', i);
        });
    });

    $('#saveKosong').on('click', function () {
        if (kosongData.length === 0) {
            return swal.fire({
                icon: 'warning',
                title: 'No data',
                text: 'Add at least one row before saving.'
            });
        }

        swal.fire({
            icon: 'question',
            title: 'Confirm Save',
            text: 'Are you sure you want to save all entries?',
            showCancelButton: true,
            confirmButtonText: 'Save',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '{{ route("kosong.save") }}',
                    type: 'POST',
                    data: { data: kosongData },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res) {
                        swal.fire({
                            icon: 'success',
                            title: 'Saved!',
                            text: 'All data has been saved.'
                        });
                        kosongData = [];
                        $('#tableDN tbody').empty();
                        $('#modalKosong').modal('hide');

                        loadMilkrunData();
                    },
                    error: function (xhr) {
                        swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to save data.'
                        });
                    }
                });
            }
        });
    });

    // Reset kosong modal when closed
    $('#modalKosong').on('hidden.bs.modal', function () {
        kosongData = [];
        $('#tableDN tbody').empty();
        $('#no_pol_kosong, #driver_kosong, #vendor_name_kosong, #vendor_id_kosong, #barang_datetime').val('');
    });

});





</script>





@endsection


