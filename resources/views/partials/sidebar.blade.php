<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('assets/images/user/avatar-2.jpg')}}" alt="User-Profile-Image">
                    <div class="user-details">
                        <span>{{ auth()->user()->name }}</span>
                        <div>{{ auth()->user()->role}}</div>
                    </div>
                </div>
            </div>
            
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu utama</label>
                </li>
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : ''}}">
                    <a href="/dashboard" class="nav-link "><span class="pcoded-micon "><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>

                {{-- autorizer owner--}}
                @can('isOwner')
                    <li class="nav-item {{ Request::is('setting*') ? 'active' : ''}}">
                        <a href="/setting" class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings"></i></i></span><span class="pcoded-mtext">Pengaturan</span></a>
                    </li>
                @endcan

                <li class="nav-item pcoded-menu-caption">
                    <label>Data Master</label>
                </li>
                {{-- autorizer warehouese --}}
                @can('isWarehous')
                    <li class="nav-item {{ Request::is('suplayer*') ? 'active' : ''}}">
                        <a href="/suplayer" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layers"></i></i></span><span class="pcoded-mtext">Suplayer</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('category*') ? 'active' : ''}}">
                        <a href="/category" class="nav-link "><span class="pcoded-micon"><i class="feather icon-grid"></i></i></span><span class="pcoded-mtext">Kategori</span></a>
                    </li>
                @endcan

                <li class="nav-item {{ Request::is('product*') ? 'active' : ''}}">
                    <a href="/product" class="nav-link "><span class="pcoded-micon"><i class="feather icon-package"></i></i></span><span class="pcoded-mtext">Produk</span></a>
                </li>

                {{-- autorizer cashier--}}
                @can('isCashier')
                    <li class="nav-item {{ Request::is('customer*') ? 'active' : ''}}">
                        <a href="/customer" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></i></span><span class="pcoded-mtext">Member</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('credit*') ? 'active' : ''}}">
                        <a href="/credit" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></i></span><span class="pcoded-mtext">Kredit</span></a>
                    </li>
                @endcan

                <li class="nav-item pcoded-menu-caption">
                    <label>Data Transaksi</label>
                </li>

                <li class="nav-item pcoded-hasmenu ">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                    <ul class="pcoded-submenu">

                        {{-- autorizer warehouse--}}
                        @can('isWarehous')
                        <li class="{{ Request::is('purchase*') ? 'active' : ''}}">
                            <a href="/purchase"><span>Pemelian</span></a>
                        </li>
                        @endcan

                        {{-- autorizer cashier--}}
                        @can('isCashier')
                            <li class="{{ Request::is('invoice*') ? 'active' : ''}}">
                                <a href="/invoice"><span></span><span class="pcoded-mtext">Penjualan</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>  
            
                <li class="nav-item pcoded-hasmenu ">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Page layouts</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="layout-vertical.html" target="_blank">Vertical</a></li>
                        <li><a href="layout-horizontal.html" target="_blank">Horizontal</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>