<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

	<meta content="@yield('metadeskription')" name="description">
	<meta content="@yield('metakeywords')" name="keywords">
	<link rel="shortcut icon" sizes="196x196" href="/Assets/proyek/images/logo.png">
	<link href="@yield('thumbnail')" rel="apple-touch-icon">
	<title>@yield('title')Open Data Kontak Bojonegoro</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
	<!-- Bootstrap CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/bootstrap.min.css">
	<!-- Bootstrap CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/font-awesome.min.css">
	<!-- owl.carousel CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/owl.carousel.css">
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/owl.theme.css">
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/owl.transitions.css">
	<!-- meanmenu CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/meanmenu/meanmenu.min.css">
	<!-- animate CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/animate.css">
	<!-- normalize CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/normalize.css">
	<!-- mCustomScrollbar CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/scrollbar/jquery.mCustomScrollbar.min.css">
	<!-- jvectormap CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/jvectormap/jquery-jvectormap-2.0.3.css">
	<!-- notika icon CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/notika-custom-icon.css">
	<!-- wave CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/wave/waves.min.css">
	<!-- main CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/main.css">
	<!-- style CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/style.css">
	<!-- responsive CSS
	============================================ -->
	<link rel="stylesheet" href="https://siipp.net/assets/proyek/css/responsive.css">
	<!-- modernizr JS
	============================================ -->
	<script type="text/javascript" src="https://siipp.net/assets/datatables/bootstrap.min.js"></script>  
	<script src="https://siipp.net/assets/datatables/jquery.min.js"></script> 

	<style type="text/css">
		.preloader {
		  position: absolute;
		  top: 0;
		  left: 0;
		  width: 100%;
		  height: 100%;
		  z-index: 9999;
		  background-color: #fff;
		}
		.preloader .loading {
		  position: absolute;
		  left: 50%;
		  top: 50%;
		  transform: translate(-50%,-50%);
		  font: 14px arial;
		}
	</style>
</head>

<body id="page-top" style="background-color: #f0f0f0">
	<div class="header-top-area" style="background-color: #0f6926;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="/Home" class="logo h4" style="color: white"><b> BOJONEGORO<span style="color: red"> OPEN </span>SYSTEM </b>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <a href="/proyek" class="btn btn-default" style="color: black;margin: 0px 10px 10px 5px">Data Proyek</a>
                            <a href="/proyek/tender" class="btn btn-default" style="color: black;margin: 0px 15px 10px 5px">Tahap Tender</a>
                            <a href="" style="color: white;" class="h3 dropdown-toggle" role="button"  data-toggle="modal" data-target="#loginModal"><i class="fa fa-user" style="margin-top: 15px"></i></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
   <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a class="btn btn-info"  href="/"><i class="notika-icon notika-house"></i> Home</a>
                                </li>
                                <li><a class="btn btn-info"  href="/proyek"><i class="notika-icon notika-form"></i> Data Proyek</a>
                                </li>
                                <li><a class="btn btn-info"  href="/pengaduan"><i class="notika-icon notika-support"></i> Pengaduan</a>
                                </li>
                                <li><a class="btn btn-info"  href="/statistik"><i class="glyphicon glyphicon-stats"></i> Statistik</a>
                                </li>
                                <li><a class="btn btn-info"  href="/proyek/penyedia"><i class="glyphicon glyphicon-briefcase"></i>Penyedia</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a class="btn btn-info" style="background-color:#59af4b;color:white" href="/"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li><a class="btn btn-info" style="background-color:#59af4b;color:white" href="/proyek"><i class="notika-icon notika-form"></i> Data Proyek</a>
                        </li>
                        <li><a class="btn btn-info" style="background-color:#59af4b;color:white" href="/pengaduan"><i class="notika-icon notika-support"></i> Pengaduan</a>
                        </li>
                        <li><a class="btn btn-info" style="background-color:#59af4b;color:white" href="/statistik"><i class="glyphicon glyphicon-stats"></i> Statistik</a>
                        </li>
                        <li><a class="btn btn-info" style="background-color:#59af4b;color:white" href="/proyek/penyedia"><i class="glyphicon glyphicon-briefcase"></i> Penyedia</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
    <!-- Start Status area -->
	<!-- APP MAIN ==========-->
	<main id="app-main" class="app-main">
		<div class="wrap">
			<section class="app-content">
				<div id="wrapper">
        			@yield('container')
				</div>
			</section>
		</div>
		<div style="margin-top: 30px">
		  <!--akhir-->
		  <section id="footered"  style="background-color: black ">
		    <div class="container">
		      <div class="row">
		        <div class="col-sm-12">
		          &nbsp;
		        </div>        
		      </div>
		    </div>  
		  </section><!-- #footer -->
		  <section id="copyright" style="background-color: black">
		    <div class="container text-center">
		      <p style="font-size: 13px;font-family: Dosis;color: #FFFFFF;text-transform: uppercase;letter-spacing: 0.2em;"> Published by Bojonegoro Institute<br>Alamat : Jl. Panglima Polim Gg. Mangga 1 No. 9 Bojonegoro<br>
		  Telp : (0353) 888557 , Email : bjn.institute@gmail.com
		  <br>Copyright &copy; 2019 Bojonegoro Institute</p>
		    </div>
		  </section><!-- #copyright -->
		</div>
	</main>
	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
	<!-- new label Modal -->
	<div id="loginModal" class="modal fade" tabindex="-1" role="dialog">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Sign In With Your ODCBJN Account</h4>
	            </div>
	            <form action="/" method="POST">
	                <div class="modal-body">
				        <div class="form-group">
				            <input type="text" name="email" class="form-control" placeholder="Email">
				        </div>
				        <div class="form-group">
				            <input type="password" name="password" class="form-control" placeholder="Password">
				        </div>
	                    <button type="submit" class="btn btn-success">Sign In</button>
	                </div><!-- .modal-body -->
	                <div class="modal-footer">                    
	                    <center style="margin-top: 15px"><a href="#" style="color: #59af4b">Lupa Password?</a></center>
	                    <center><a href="/auth/daftar" style="color: #59af4b">Belum Punya Akun ? Daftar akun</a></center>
	                </div><!-- .modal-footer -->
	            </form>
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->  
<script src="https://siipp.net/assets/proyek/js/wow.min.js"></script>
<!-- price-slider JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/jquery-price-slider.js"></script>
<!-- owl.carousel JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/owl.carousel.min.js"></script>
<!-- scrollUp JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/jquery.scrollUp.min.js"></script>
<!-- meanmenu JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/meanmenu/jquery.meanmenu.js"></script>
<!-- counterup JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/counterup/jquery.counterup.min.js"></script>
<script src="https://siipp.net/assets/proyek/js/counterup/waypoints.min.js"></script>
<script src="https://siipp.net/assets/proyek/js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- jvectormap JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="https://siipp.net/assets/proyek/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="https://siipp.net/assets/proyek/js/jvectormap/jvectormap-active.js"></script>
<!-- sparkline JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/sparkline/jquery.sparkline.min.js"></script>
<script src="https://siipp.net/assets/proyek/js/sparkline/sparkline-active.js"></script>
<!-- sparkline JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/flot/jquery.flot.js"></script>
<script src="https://siipp.net/assets/proyek/js/flot/jquery.flot.resize.js"></script>
<script src="https://siipp.net/assets/proyek/js/flot/curvedLines.js"></script>
<script src="https://siipp.net/assets/proyek/js/flot/flot-active.js"></script>
<!-- knob JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/knob/jquery.knob.js"></script>
<script src="https://siipp.net/assets/proyek/js/knob/jquery.appear.js"></script>
<script src="https://siipp.net/assets/proyek/js/knob/knob-active.js"></script>
<!--  wave JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/wave/waves.min.js"></script>
<script src="https://siipp.net/assets/proyek/js/wave/wave-active.js"></script>
<!--  todo JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/todo/jquery.todo.js"></script>
<!-- plugins JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/plugins.js"></script>
<!--  Chat JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/chat/moment.min.js"></script>
<script src="https://siipp.net/assets/proyek/js/chat/jquery.chat.js"></script>
<!-- main JS
============================================ -->
<script src="https://siipp.net/assets/proyek/js/main.js"></script><script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
@yield('script_tambahan')
</body>
</html>
