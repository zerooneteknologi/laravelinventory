<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('assets/images/user/avatar-2.jpg')}}" alt="User-Profile-Image">
                    <div class="user-details">
                        <span>John Doe</span>
                        <div id="more-details">UX Designer<i class="fa fa-chevron-down m-l-5"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                        <li class="list-group-item">
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                        <i class="feather icon-log-out m-r-5"></i>
                                        {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : ''}}">
                    <a href="/dashboard" class="nav-link "><span class="pcoded-micon "><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item {{ Request::is('suplayer*') ? 'active' : ''}}">
                    <a href="/suplayer" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layers"></i></i></span><span class="pcoded-mtext">Suplayer</span></a>
                </li>
                <li class="nav-item {{ Request::is('category*') ? 'active' : ''}}">
                    <a href="/category" class="nav-link "><span class="pcoded-micon"><i class="feather icon-grid"></i></i></span><span class="pcoded-mtext">Kategori</span></a>
                </li>
                <li class="nav-item {{ Request::is('product*') ? 'active' : ''}}">
                    <a href="/product" class="nav-link "><span class="pcoded-micon"><i class="feather icon-package"></i></i></span><span class="pcoded-mtext">Produk</span></a>
                </li>
                <li class="nav-item {{ Request::is('customer*') ? 'active' : ''}}">
                    <a href="/customer" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></i></span><span class="pcoded-mtext">klien</span></a>
                </li>
                <li class="nav-item {{ Request::is('setting*') ? 'active' : ''}}">
                    <a href="/setting" class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings"></i></i></span><span class="pcoded-mtext">Pengaturan</span></a>
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