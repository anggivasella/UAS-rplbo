<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Sistem Laundry</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
    <meta name="author" content="JSOFT.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
    <link rel="stylesheet" href="/assets/vendor/pnotify/pnotify.custom.css" />
    <!-- Specific Page Vendor CSS -->
    @stack('css')

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="/assets/vendor/modernizr/modernizr.js"></script>

</head>
<body>
<section class="body">
    @php($pengguna = \Illuminate\Support\Facades\Session::get('pengguna'))
    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="/" class="logo">
                <img src="/logo.png" height="35" alt="Laundry" />
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">


            <span class="separator"></span>

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="/assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                    </figure>
                    <div class="profile-info">
                        <span class="name">{{$pengguna->username}}</span>
                        <span class="role">{{$pengguna->nohp}}</span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        @if($pengguna->tipe == 'admin')
                        <li>
                            <a class="modal-with-formpass" role="menuitem" tabindex="-1" href="#modalPass"><i class="fa fa-user"></i> Ubah Password</a>
                        </li>
                        @endif
                        <li>
                            <a role="menuitem" tabindex="-1" href="/keluar"><i class="fa fa-power-off"></i> Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title" style="color: white">
                    Menu
                </div>
                <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">
                        <ul class="nav nav-main">
                            @if($pengguna->tipe == 'admin')
                                <li class="@yield('beranda')">
                                    <a href="/beranda">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Beranda</span>
                                    </a>
                                </li>
                                <li class="@yield('kategori')">
                                    <a href="/kategori">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                        <span>Kategori</span>
                                    </a>
                                </li>
                                <li class="@yield('transaksi')">
                                    <a href="/transaksi">
                                        <i class="fa fa-exchange" aria-hidden="true"></i>
                                        <span>Transaksi</span>
                                    </a>
                                </li>
                                <li class="@yield('pelanggan')">
                                    <a href="/pelanggan">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <span>Data Pelanggan</span>
                                    </a>
                                </li>
                            @else
                                <li class="@yield('riwayat')">
                                    <a href="/riwayat">
                                        <i class="fa fa-history" aria-hidden="true"></i>
                                        <span>Riwayat</span>
                                    </a>
                                </li>
                                <li class="@yield('profil')">
                                    <a href="/profil">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span>Profil</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>

            </div>

        </aside>
        <!-- end: sidebar -->

        <section role="main" class="content-body">
            @yield('content')
        </section>

        <div id="modalPass" class="modal-block modal-block-primary mfp-hide">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Ubah Password</h2>
                </header>
                <div class="panel-body">
                    <form action="/password" method="post" class="form-horizontal mb-lg">
                        @csrf
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Password Lama</label>
                            <div class="col-sm-9">
                                <input type="password" name="passwordlama" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Konfirmasi Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" name="passwordkonfirmasi" class="form-control" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary modal-confirm">Simpan</button>
                                <button type="button" class="btn btn-default modal-dismiss">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

</section>

<!-- Vendor -->
<script src="/assets/vendor/jquery/jquery.js"></script>
<script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/assets/vendor/pnotify/pnotify.custom.js"></script>
<script src="/assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

@stack('js')

<script>
    $('.modal-with-formpass').magnificPopup({
        type: 'inline',
        preloader: false,
        modal: true,
    });
    $(document).on('click', '.modal-dismiss', function (e) {
        e.preventDefault();
        $.magnificPopup.close();
    });

    @if(session()->has('sukses'))
    new PNotify({
        title: 'Sukses',
        text: '{{session()->get('sukses')}}',
        type: 'success'
    });
    @elseif(session()->has('gagal'))
    new PNotify({
        title: 'Gagal',
        text: '{{session()->get('gagal')}}',
        type: 'error'
    });
    @endif

</script>

<!-- Theme Base, Components and Settings -->
<script src="/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/assets/javascripts/theme.init.js"></script>


</body>
</html>
