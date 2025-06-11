@extends('layouts.masterHome')

@section('title', 'Home - SLES')

@section('css')
    <style>
        .custom-button {
            height: 80px;
            font-size: 18px;
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
                    <h4 class="page-title pull-left">Dashboard (Input kedatangan)</h4>
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
        <div class="col-md-1 mt-4"></div>
        <div class="col-md-4 mt-4">
            <button type="button" class="btn btn-success btn-block custom-button" id="addModalBawaBarang">
                <strong><i class="fa fa-plus-square"></i>&nbsp;&nbsp;PO</strong>
            </button>
        </div>
        <div class="col-md-2 mt-4"></div>
        <div class="col-md-4 mt-4">
            <button type="button" class="btn btn-danger btn-block custom-button" id="addModalBawaBox">
                <strong><i class="fa fa-plus-square"></i>&nbsp;&nbsp;NON PO</strong>
            </button>
        </div>
        <div class="col-md-1 mt-4"></div>
    </div>

    <hr>

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





@endsection

@section('script')
@endsection
