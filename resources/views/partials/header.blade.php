<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="{{ asset('assets/images/Logo-Abadimas.png')}}" alt="" class="logo">
            <img src="{{ asset('assets/images/Logo-Abadimas.png')}}" alt="" class="logo-thumb">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="dropdown-toggle h-drop m-l-10 text-uppercase" href="#" data-toggle="dropdown">
                        Welcome Back {{ auth()->user()->name}}
                    </a>
                    <div class="dropdown-menu profile-notification ">
                        <ul class="pro-body">
                            <li><a href="user-profile.html" class="dropdown-item"><i class="fas fa-circle"></i> Profile</a></li>
                            <li><a href="email_inbox.html" class="dropdown-item"><i class="fas fa-circle"></i> My Messages</a></li>
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="fas fa-circle"></i> Lock Screen</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>

        <?php  
            $stockProduct = \DB::select("SELECT * FROM products WHERE stock <= 20");
            $date = date('Y-m-d', strtotime("-7 days"));
            $credits = \DB::select("SELECT * FROM credits WHERE expired = $date");
            $count = count($stockProduct) + count($credits);
        ?>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="icon feather icon-bell"></i>
                        <span class="badge badge-pill badge-danger">{{ $count }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">Stok Produk</p>
                            </li>
                            @foreach ($stockProduct as $item)
                                <li class="notification">
                                    <div class="media">
                                        <a href="/product/{{ $item->id }}">
                                            <h5>{{ $item->productName}}</h5>
                                        </a>
                                        <div class="media-body">
                                            <p> stok sisa {{ $item->stock}}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <li class="n-title">
                                <p class="m-b-0">utang jatuh Tempo</p>
                            </li>
                            @foreach ($credits as $credit)
                                <li class="notification">
                                    <div class="media">
                                        <a href="/product/{{ $credit->id }}">
                                            <h5>{{ $credit->dbt}}</h5>
                                        </a>
                                        <div class="media-body">
                                            <p> Jatuh Tempo {{ $credit->expired}}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="noti-footer">
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{asset('assets/images/user/avatar-1.jpg')}}" class="img-radius" alt="User-Profile-Image">
                            <span>{{ auth()->user()->name }}</span>
                            <a class="dud-logout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="feather icon-log-out"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>