<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('home.in') }}"><img src="{{ asset('images/icon/logo_sles.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active active-menu">
                        {{-- DEVELOP --}}
                        <a href="{{ route('home') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-arrow-circle-down"></i><span>Customer</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('home.datasj') }}">Check Data SJ</a></li>
                            <li><a href="{{ route('home.milkrun') }}">Milkrun</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-arrow-circle-down"></i><span>Supplier</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('home.in') }}">Supplier IN</a></li>
                            {{-- DEVELOP --}}
                            <li><a href="{{ route('home.docking')}}">Supplier DOCKING</a></li>
                            <li><a href="{{ route('home.out') }}">Supplier OUT</a></li>
                            <li><a href="{{ route('home.view') }}">View data</a></li>
                        </ul>
                    </li>

                    @if(Auth::user()->is_admin == 1)

                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-database"></i><span>Master Data</span></a>
                            <ul class="collapse">
                                <li><a href="{{ route('master.index') }}">Data User</a></li>
                            </ul>
                        </li>

                    @endif


                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
