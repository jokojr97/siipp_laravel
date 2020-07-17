<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta content="@yield('metadeskription')" name="descriptison">
  <meta content="@yield('metakeywords')" name="keywords">

  <!-- Favicons -->
  <link href="/img/home/icon-kecil.png" rel="icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    hr {
      margin-top:0px;
    }
    #nav-tab .active {
      background-color: #1f3983;
      color: white;
      padding-left: 50px;
    }
    .detail-label {
      color: gray; 
      font-size: 15px;
      font-weight: bold; 
      font-weight:none;
    }
    .detail-h5 {
      margin-top: -8px;
      color: gray;
      margin-bottom: 15px;
      text-transform: uppercase;
    }
    .bg-blues {
      background-color: #1f3983;
    }
    .success .dot {
      background-color: var(--background-color-success);
    }
    .m .dot {
      width: 0.625rem;
      height: 0.625rem;
      margin-right: 0.625rem;
    } 
    #mapid { height: 480px; }
    .dot {
      --background-color-danger: var( --support-danger-default, hsla(12, 92%, 45%, 1) );
      --background-color-warning: var( --support-warning-default, hsla(33, 100%, 56%, 1) );
      --background-color-success: var( --support-success-default, hsla(159, 97%, 27%, 1) );
      --background-color-info: var(--support-info-default, hsla(209, 100%, 42%, 1));
      display: inline-block;
      border-radius: 50%;
    }
    .l {
      font-size: var(--tag-l-size);
    }
    .nk-kycfm-count {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      height: 44px;
      width: 44px;
      float: left;
      font-size: 16px;
      border-radius: 50%;
      color: #526484;
      border: 2px solid #dbdfea;
      margin-right: 1rem;
      flex-shrink: 0;
    }
  </style>
</head>
<body class="sidebar-mini layout-fixed text-sm">
  
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="/" class="brand-link navbar-dark">
      <img src="/Assets/proyek/images/logo.png" alt="Siipp Logo" class="brand-image img-circle elevation-3 bg-light" style="opacity: .8">
      <span class="brand-text text-white">Siipp.net</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/Assets/images/img_avatar2.png" class="img-circle" style="object-fit: cover;height: 50px;width: 50px;object-position: 50% 50%;object-position: 0 0;">
        </div>
        <div class="info tag success withDot m">
          <a href="#" class="d-block text-capitalize">{{ $user->name }}</a>
          <div class="dot l success"></div><a href="#" class="text-secondary text-capitalize">{{ $user->roles[0]->name }}</a>
        </div>
      </div>
      @include('layouts._partials.menu')
      </div>
      <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
        <div class="os-scrollbar-track">
          <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);">
          </div>
        </div>
      </div>
      <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
        <div class="os-scrollbar-track">
          <div class="os-scrollbar-handle" style="height: 52.0202%; transform: translate(0px, 0px);"></div>
        </div>
      </div>
      <div class="os-scrollbar-corner"></div>
    </div>
    <!-- /.sidebar -->
  </aside>
  @yield('container')

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="">Partai Nasdem</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
  function myfunction(){
    var r = confirm('Are you sure want to logout?');
    if (r == true) {
        event.preventDefault();document.getElementById('logout-form').submit();
    }else {
        console.log('cancel');
    }
  }
  function deletefunc(){   
    var r = confirm('Are you sure want to delete this item?');
    if (r == true) {
        event.preventDefault();document.getElementById('del-form').submit();
    }else {
        console.log('cancel');
    } 
  }
</script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="/admin/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>
@yield('script_tambahan');
</body>
</html>
