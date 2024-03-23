@php
    use App\Models\CustomClass;
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/icon_user_160x160.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                <!-- <a href="#" class="d-block">{{ config('app.name') }}</a> -->
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('administrator.dashboard') }}" class="nav-link">
                        <i class='fas fa-chevron-circle-right'></i>
                        <p>DashBoard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('administrator.barang') }}" class="nav-link">
                        <i class='fas fa-chevron-circle-right'></i>
                        <p>Master Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('administrator.transaksi') }}" class="nav-link">
                        <i class='fas fa-chevron-circle-right'></i>
                        <p>Transaksi</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
