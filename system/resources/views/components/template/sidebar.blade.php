@php
    function checkRouteActive($route)
    {
        if (Route::current()->uri == $route) {
            return 'active';
        }
    }
    
@endphp

<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">



            <ul class="nav nav-primary">
                <li class="menu-title">
                    <p style="color: rgb(35, 72, 197); margin-left: 10%;">Menu</p>


                </li>
                <hr>

                <li class="nav-item {{ checkRouteActive('admin/pagu') }}">
                    <a href="{{ url('admin/pagu') }}">
                        <i class="fas fa-folder-open"></i>
                        <p>Data Dokumen Pagu</p>
                    </a>
                </li>
                <li class="nav-item {{ checkRouteActive('admin/kodeba') }}">
                    <a href="{{ url('admin/kodeba') }}">
                        <i class="fas fa-folder-open"></i>
                        <p>Data Dokumen Kode Ba</p>
                    </a>
                </li>

                <li class="nav-item {{ checkRouteActive('admin/kodeakun') }}">
                    <a href="{{ url('admin/kodeakun') }}">
                        <i class="fas fa-folder-open"></i>
                        <p>Data Kode Akun</p>
                    </a>
                </li>

                <li class="nav-item {{ checkRouteActive('admin/kodekab') }}">
                    <a href="{{ url('admin/kodekab') }}">
                        <i class="fas fa-folder-open"></i>
                        <p>Data Dokumen Kode Kab </p>
                    </a>
                </li>

                <li class="nav-item {{ checkRouteActive('admin/kl') }}">
                    <a href="{{ url('admin/kl') }}">
                        <i class="fas fa-folder-open"></i>
                        <p>Data Dokumen KL</p>
                    </a>
                </li>
                <li class="nav-item {{ checkRouteActive('admin/user') }}">
                    <a href="{{ url('admin/user') }}">
                        <i class="fas fa-user"></i>
                        <p>Tambah Akun Admin</p>
                    </a>
                </li>
                <li class="nav-item {{ checkRouteActive('admin/logout') }}">
                    <a href="{{ url('login') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

                {{-- <li class="nav-item {{ checkRouteActive('dashboard') }}">
                    <a data-toggle="collapse" href="{{ url('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ checkRouteActive('user') }}">
                    <a data-toggle="collapse" href="{{ url('user') }}">
                        <i class="fas fa-user"></i>
                        <p>User</p>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
