<!DOCTYPE html>
<html>
<head>
  <title>Info pangan Kabupaten Batang</title>
  <!-- Compiled and minified CSS -->
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
      .fix{
        position: fixed;
        top:0px;
        left: 0px;
        z-index: 12;
      }
  </style>
<script type="text/javascript" src="{{url('js/jquery-1.11.2.min.js')}}"></script>    
            <!--materialize js-->
<script type="text/javascript" src="{{url('js/materialize.min.js')}}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{url('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
</head>

<body style="padding-top:0px; ">
  <div class="row">

    <div class="card blue darken-4" style="margin-top:0px; ">
      <div class="row">
        <div class="card-content white-text col m2 s6 offset-s3 center">
          <img src="{{url('images/logo.png')}}" style="width: 100%;">
        </div>

        <div class="card-content white-text col m8 s12">
          <h5>Sistem Informasi Harga Kebutuhan Pokok Masyarakat <br>Kabupaten Batang </h5>
        </div>
      </div>

      <nav class="blue darken-4 xxxx">
        <div class="nav-wrapper" style="margin-left: 20%;">
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul id="nav-mobile" class="hide-on-med-and-down">
            <li><a href="{{url('/')}}"><i class="material-icons left">home</i>Beranda</a></li>
            <li><a href="{{url('tentang')}}"><i class="material-icons left">supervisor_account</i>Tentang Kami</a></li>
            <li><a href="{{url('info_pasar')}}"><i class="material-icons left">location_city</i>Pasar</a></li>
            <li><a href="{{url('statistik')}}"><i class="material-icons left">trending_up</i>Statistik</a></li>
            <li><a href="{{url('kontak')}}"><i class="material-icons left">recent_actors</i>Kontak</a></li>
            <li><a href="{{url('beranda')}}"><i class="material-icons left">perm_identity</i>Admin</a></li>
          </ul>
           <ul class="side-nav" id="mobile-demo">
            <li><a href="{{url('/')}}"><i class="material-icons left">home</i>Beranda</a></li>
            <li><a href="{{url('tentang')}}"><i class="material-icons left">supervisor_account</i>Tentang Kami</a></li>
            <li><a href="{{url('info_pasar')}}"><i class="material-icons left">location_city</i>Pasar</a></li>
            <li><a href="{{url('statistik')}}"><i class="material-icons left">trending_up</i>Statistik</a></li>
            <li><a href="{{url('kontak')}}"><i class="material-icons left">recent_actors</i>Kontak</a></li>
            <li><a href="{{url('beranda')}}"><i class="material-icons left">perm_identity</i>Admin</a></li>
          </ul>
        </div>
      </nav>

     
      
    </div>

<div class="row">
  <div class="col m10 offset-m1 s12">
  @yield('konten')
  </div>
</div>
    

  <footer class="page-footer blue darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Footer Content</h5>
          <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © {{date('Y')}} Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>
</body> 
<script type="text/javascript">
  $(document).ready(function () {

    var menu = $('.xxxx');
    var origOffsetY = menu.offset().top;

    function scroll() {
      if ($(window).scrollTop() >= origOffsetY) {
        $('.xxxx').addClass('fix');
      } else {
        $('.xxxx').removeClass('fix');
      }
    }
    document.onscroll = scroll;
  });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
    })
</script>
 <script type="text/javascript" src="{{url('js/plugins.js')}}"></script>
</html>