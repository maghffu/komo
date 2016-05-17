<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Aplikasi Penjualan">
    <meta name="keywords" content="Point of sales, aplikasi penjualan">
    <title>Sistem informasi Komoditi Kab. Batang</title>

    <!-- Favicons-->
    <link rel="icon" href="{{url('images/favicon/favicon-32x32.png')}}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{url('images/favicon/apple-touch-icon-152x152.png')}}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{url('images/favicon/mstile-144x144.png')}}">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->    
    <link href="{{url('css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{url('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
    <link href="{{url('js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{url('js/plugins/jvectormap/jquery-jvectormap.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{url('js/plugins/chartist-js/chartist.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <style type="text/css">
        @font-face {
          font-family: 'Material Icons';
          font-style: normal;
          font-weight: 400;
          src: local('Material Icons'), local('MaterialIcons-Regular'), url({{ url('ff.woff2') }}) format('woff2');
      }

      .material-icons {
          font-family: 'Material Icons';
          font-weight: normal;
          font-style: normal;
          font-size: 24px;
          line-height: 1;
          letter-spacing: normal;
          text-transform: none;
          display: inline-block;
          white-space: nowrap;
          word-wrap: normal;
          direction: ltr;
          -webkit-font-feature-settings: 'liga';
          -webkit-font-smoothing: antialiased;
      }
  </style>
<script type="text/javascript" src="{{url('js/jquery-1.11.2.min.js')}}"></script>    
            <!--materialize js-->
            <script type="text/javascript" src="{{url('js/materialize.min.js')}}"></script>
            <!--scrollbar-->
            <script type="text/javascript" src="{{url('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

</head>

<body>

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="{{url('beranda')}}" class="brand-logo darken-1">Sistem informasi komoditi</a> <span class="logo-text">Materialize</span></h1>

                    <ul class="right hide-on-med-and-down">
                         @if (!Auth::guest())
                        <li>
                            <a class="dropdown-button" href="#!" data-activates="dropdown1">
                                {{ Auth::user()->name }}
                                <i class="material-icons right">account_circle</i>
                            </a>
                        </li>
                        @else
                         <li>
                            <a href="{{url('auth/login')}}">
                                Login
                                <i class="material-icons right">lock</i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->

        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#"> Profil</a></li>
            <li><a href="#">Ganti Password</a></li>
            <li><a href="#">Help</a></li>
            <li class="divider"></li>
            <li><a href="{{url('auth/logout')}}">Logout</a></li>
        </ul>
    </header>
    <!-- END HEADER -->
    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                            </div>
                            <div class="col col s8 m8 l8">
                                

                                @if (!Auth::guest())
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" >
                                    {{ Auth::user()->name }}
                                </a>
                                    <p class="user-roal">
                                    {{ Auth::user()->role }}
                                    </p>
                                @else
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" >
                                    Guest
                                </a>
                                    <p class="user-roal">Guest</p>
                                @endif
                            </div>
                        </div>
                    </li>
            <li class="bold"><a href="{{url('beranda')}}" class="waves-effect waves-cyan"><i class="material-icons">home</i> Beranda</a>
                    </li>

                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="material-icons">developer_board</i> Master</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="{{url('komoditas')}}">Komoditas</a></li>
                                        <li><a href="{{url('pasar')}}">Pasar</a></li> 
                                    </ul>
                                </div>
                            </li>
                            <li class="bold">
                                <a href="{{url('harga')}}" class="waves-effect waves-cyan"><i class="material-icons">import_export</i>Input Data</a>
                            </li>
                            <li class="bold">
                            	<a href="{{url('harga/create')}}" class="waves-effect waves-cyan"><i class="material-icons">build</i>Edit Data</a>
                            </li>
                            <li class="bold">
                            	<a class=" waves-effect waves-cyan"><i class="material-icons">receipt</i> Laporan</a>
                            </li>

                        </ul>
                    </li>
                </ul>
                 <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
            </aside>

            <section id="content">
                @yield('konten')
            </section>

            <!-- jQuery Library -->
            

            <!-- chartist -->
            <!-- <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>    -->

            <!-- chartjs -->
            <!-- <script type="text/javascript" src="js/plugins/chartjs/chart.min.js"></script> -->
            <!-- <script type="text/javascript" src="js/plugins/chartjs/chart-script.js"></script> -->

            <!-- sparkline -->
            <!-- <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script> -->
            <!-- <script type="text/javascript" src="js/plugins/sparkline/sparkline-script.js"></script> -->

            <!--jvectormap-->
            <!-- <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
            <!-- <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
            <!-- <script type="text/javascript" src="js/plugins/jvectormap/vectormap-script.js"></script> -->


            <!--plugins.js - Some Specific JS codes for Plugin Settings-->
            <script type="text/javascript" src="{{url('js/plugins.js')}}"></script>
            <!-- Toast Notification -->

            <script type="text/javascript">
                $(document).ready(function () {
                    $(".dropdown-button").dropdown();
                })
            </script>
        </body>

        </html>