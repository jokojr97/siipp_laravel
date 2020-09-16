<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Dashboard">
        <meta content="@yield('metadeskription')" name="description">
        <meta content="@yield('metakeywords')" name="keywords">
        <link rel="shortcut icon" sizes="196x196" href="/Assets/proyek/images/logo.png">
        <link href="@yield('thumbnail')" rel="apple-touch-icon">
        <title>@yield('title')Open Data Kontak Bojonegoro</title>
            
        <!-- Template CSS Files
        ================================================== -->
        <!-- Twitter Bootstrs CSS -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css"> -->
        <!-- Ionicons Fonts Css -->
        <link rel="stylesheet" href="/Assets/plugins/ionicons/ionicons.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="/Assets/plugins/animate-css/animate.css">
        <!-- Hero area slider css-->
        <link rel="stylesheet" href="/Assets/plugins/slider/slider.css">
        <!-- owl craousel css -->
        <link rel="stylesheet" href="/Assets/plugins/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="/Assets/plugins/owl-carousel/owl.theme.css">
        <!-- Fancybox -->
        <link rel="stylesheet" href="/Assets/plugins/facncybox/jquery.fancybox.css">
        <!-- template main css file -->
        <link rel="stylesheet" href="/Assets/css/style.css">
        <link rel="stylesheet" href="/Assets/libs/bower/font-awesome/css/font-awesome.min.css">
        <style>
           
        @media screen and (min-width: 601px) {
          div.example {
            font-size: 22px;
          }
          div.headerex {
            font-size: 40px;  
          }
          .header-joe {
            margin-top: -20px;
            margin-bottom: -130px
          }
        }
        
        @media screen and (max-width: 600px) {
          div.example {
            font-size: 14px;
          }
          div.headerex {
            font-size: 24px;  
          }
          .header-joe {
            margin-top: -10px;
            margin-bottom: -50px
          }
        }

        .background-home {
            
        }

        </style>
    </head> 

    <body style="background-color: #f0f0f0">
        <!--
        ==================================================
        Header Section Start
        ================================================== -->
        <header id="top-bar" class="navbar-fixed-top animated-header" style="background-color: #0f6926;">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    
                    <!-- logo -->
                    <div class="navbar-brand">                       
                        <a href="/" class="logo" style="color: white;font-size: 21px">
                            <small style="color: white">
                                <b> BOJONEGORO<span style="color: #fa1127"> OPEN </span>SYSTEM  </b>
                            </small>
                        </a>
                    </div>
                    <!-- /logo -->
                </div>
                <!-- main menu -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                             <li>
                                <a href="/" style="color: white;"><center><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Beranda</center></a>
                            </li>
                            <li><a href="/proyek" class="btn btn-default" style="margin: 0 5px;background-color: white;color: black;font-size: 12px;padding: 10px"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Proyek</a></li>
                            <li><a href="/pengaduan" class="btn btn-default" style="margin: 0 5px;background-color: white;color: black;font-size: 12px;padding: 10px"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Pengaduan</a></li>
                            <li><a href="/statistik" class="btn btn-default" style="margin: 0 5px;background-color: white;color: black;font-size: 12px;padding: 10px"><span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Statistik</a></li>
                            <li><a href="/proyek/penyedia" class="btn btn-default" style="margin: 0 5px;background-color: white;color: black;font-size: 12px;padding: 10px"><span class="glyphicon glyphicon-briefcase"></span> &nbsp;Penyedia</a></li>
                            <li><a href="/proyek/tender" class="btn btn-default" style="margin: 0 5px;background-color: white;color: black;font-size: 12px;padding: 10px"><span class="glyphicon glyphicon-th-list"></span> &nbsp;Tahap Tender</a></li>                            
                            <li style="text-align: center;"><a href="/login" style="color: white;"></i><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Login</center></a></center></li>
                            <!-- <li style="text-align: center;"><a href="" style="color: white;" role="button" data-toggle="modal" data-target="#loginModal"></i><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Login</center></a></center></li> -->

                        </ul>
                    </div>
                </nav>
                <!-- /main nav -->
            </div>
        </header>
        @yield('container')
        <!--
        ==================================================
        Footer Section Start
        ================================================== -->
        <!--<footer id="footer" >-->
        <div class="container-fluid" style="background-color: white ">
            <div class="row">
              <div class="col-md-12">
                <div class="widget products-widget">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                  <h3 class="m-0 m-h-md" style="font-size: 12px;font-family: Dosis;text-transform: uppercase;letter-spacing: 0.2em;">didukung oleh</h3>
                </div>
              </div>
            </div>        
            <div class="widget-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3" style="padding: 15px 0">
                            <center><img class="img-responsive" src="/Assets/images/lkpp.png" alt="oroduct image"></center>
                        </div><!-- END column -->
                        <div class="col-sm-6 col-md-3" style="padding: 15px 0">
                            <center><img class="img-responsive" src="/Assets/images/bjn.jpg" alt="oroduct image"></center>
                        </div><!-- END column -->
                        <div class="col-sm-6 col-md-3" style="padding: 15px 0">
                            <center><img class="img-responsive" src="/Assets/images/bi.png" alt="oroduct image"></center>
                        </div><!-- END column -->
                        <div class="col-sm-6 col-md-3" style="padding: 15px 0">
                            <center><img class="img-responsive" src="/Assets/images/fordfoundation.png" alt="oroduct image"></center>
                        </div><!-- END column -->
                    </div>
                </div><!-- .row -->
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- .row -->
        <!-- new label Modal -->
		<div id="loginModal" class="modal fade" tabindex="-1" role="dialog">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h4 class="modal-title">Sign In With Your ODCBJN Account</h4>
		            </div>
		            <form action="{{route('login')}}" method="post">
                        @csrf
		                <div class="modal-body">
		                    <div class="form-group">
		                        <input  id="email" type="text" name="email" class="form-control" placeholder="Email">
		                    </div>

		                    <div class="form-group">
		                        <input id="password" type="password" name="password" class="form-control" placeholder="Password">
		                    </div>

		                    <button type="submit" class="btn btn-success btn-block">Sign In</button>
		                </div><!-- .modal-body -->
		                <div class="modal-footer">
		                    <center style="margin-top: 15px"><a href="#" style="color: #59af4b">Lupa Password?</a></center>
		                    <center><a href="/Assets/auth/daftar" style="color: #59af4b">Belum Punya Akun ? Daftar akun</a></center>
		                </div><!-- .modal-footer -->
		            </form>
		        </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->   
		<br>
		<br>
		<br>
  		<!-- APP FOOTER -->
        </div>
        
		<!--========== END app main -->
        <div>
	        <section id="copyright" style="background-color: black">
		        <br>
				<div class="container text-center">
					<p style="font-size: 13px;font-family: Dosis;color: #FFFFFF;text-transform: uppercase;letter-spacing: 0.2em;"> Published by Bojonegoro Institute<br>Alamat : Jl. Panglima Polim Gg. Mangga 1 No. 9 Bojonegoro<br>
					Telp : (0353) 888557 , Email : bjn.institute@gmail.com
					<br>Copyright &copy; 2019 Bojonegoro Institute</p>
				</div>
	        </section><!-- #copyright -->
	    </div>
	</div>
	<!--</footer> /#footer -->

	    <!-- Template Javascript Files
	    ================================================== -->
	    <!-- jquery -->
	    <script src="/Assets/plugins/jQurey/jquery.min.js"></script>
	    <!-- Form Validation -->
	    <script src="/Assets/plugins/form-validation/jquery.form.js"></script> 
	    <script src="/Assets/plugins/form-validation/jquery.validate.min.js"></script>
	    <!-- owl carouserl js -->
	    <script src="/Assets/plugins/owl-carousel/owl.carousel.min.js"></script>
	    <!-- bootstrap js -->
	    <script src="/Assets/plugins/bootstrap/bootstrap.min.js"></script>
	    <!-- wow js -->
	    <script src="/Assets/plugins/wow-js/wow.min.js"></script>
	    <!-- slider js -->
	    <script src="/Assets/plugins/slider/slider.js"></script>
	    <!-- Fancybox -->
	    <script src="/Assets/plugins/facncybox/jquery.fancybox.js"></script>
	    <!-- template main js -->
	    <script src="/Assets/js/main.js"></script>
        @yield('script_tambahan')
    </body>
</html>