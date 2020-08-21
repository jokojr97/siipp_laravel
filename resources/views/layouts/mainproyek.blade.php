<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

    <meta content="@yield('metadeskription')" name="description">
    <meta content="@yield('metakeywords')" name="keywords">
    <link rel="shortcut icon" sizes="196x196" href="/Assets/proyek/images/logo.png">
    <link href="@yield('thumbnail')" rel="apple-touch-icon">
    <title>@yield('title')Open Data Kontak Bojonegoro</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="/Assets/proyekbaru/css/animate.css">

	<link rel="stylesheet" href="/Assets/proyekbaru/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/Assets/proyekbaru/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="/Assets/proyekbaru/css/magnific-popup.css">

	<link rel="stylesheet" href="/Assets/proyekbaru/css/flaticon.css">
	<link rel="stylesheet" href="/Assets/proyekbaru/css/style.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">

    <!-- datatable -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
  <style>
  	.bg-light {
  		background-color: red;
  	}
  </style>
  	
</head>
<body>
	<div class="wrap">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="bg-wrap">
						<div class="row">
							<div class="col-md-6 align-items-center">
								<p class="mb-0 phone pl-md-2 pt-1">
									<a href="#" class="mr-2 text-center">Bojonegoro Open System v3</a>
								</p>
							</div>
							<div class="col-md-6 justify-content-md-end">
								<center>
		              				<div class="social-media">
		                    			<p class="mb-0 d-flex">
		                      				<a href="#" class="align-items-center justify-content-center pt-1"><span class="fab fa-facebook"><i class="sr-only">Facebook</i></span></a>
		                  					<a href="#" class="align-items-center justify-content-center pt-1"><span class="fab fa-twitter"><i class="sr-only">Twitter</i></span></a>
											<a href="#" class="align-items-center justify-content-center pt-1"><span class="fab fa-instagram"><i class="sr-only">Instagram</i></span></a>
											<a href="#" class="align-items-center justify-content-center pt-1"><span class="fab fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
										</p>
		                  			</div>
		                  		</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" id="joko" href="/"><p class="brd">Bojonegoro <span style="color: red">Open</span> System</p></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu</button>
	      	<div class="collapse navbar-collapse" id="ftco-nav">
	        	<ul class="navbar-nav m-auto">
		        	<li class="nav-item"><a href="/" class="nav-link pr-2 pl-2"><i class="fa fa-home"></i> Home</a></li>
		        	<li class="nav-item @if($menu == 'proyek') active @endif"><a href="/proyek" class="nav-link pr-2 pl-2"><i class="fa fa-columns"></i> Data Rup</a></li>
		        	<li class="nav-item @if($menu == 'tender') active @endif"><a href="/proyek/tender" class="nav-link pr-2 pl-2"><i class="fa fa-briefcase"></i> Data Tender</a></li>
					<li class="nav-item @if($menu == 'penyedia') active @endif"><a href="/proyek/penyedia" class="nav-link pr-2 pl-2"><i class="fa fa-users"></i> Penyedia</a></li>
					<li class="nav-item"><a href="/pengaduan" class="nav-link pr-2 pl-2"><i class="fa fa-comment"></i> Pengaduan</a></li>
					<li class="nav-item"><a href="/statistik" class="nav-link pr-2 pl-2"><i class="fa fa-chart-pie"></i> Statistik</a></li>
					<li class="nav-item"><a href="/login" class="nav-link pr-2 pl-2"><i class="fa fa-user"></i> Login</a></li>

	        	</ul>
	      	</div>
	    </div>
	</nav>
	<!-- END nav -->
		
	@yield('container')

	<footer class="footer">
		<div class="container-fluid px-lg-5 bg-black text-center">
			<div class="row p-3">
				<div class="col">
	            	<p style="font-size: 13px;font-family: Dosis;color: #FFFFFF;text-transform: uppercase;letter-spacing: 0.2em;"> Published by Bojonegoro Institute<br>Alamat : Jl. Panglima Polim Gg. Mangga 1 No. 9 Bojonegoro<br> Telp : (0353) 888557 , Email : bjn.institute@gmail.com <br>Copyright &copy; 2019 Bojonegoro Institute</p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="/Assets/proyekbaru/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="/Assets/proyekbaru/js/popper.min.js"></script>
	<script src="/Assets/proyekbaru/js/bootstrap.min.js"></script>
	<script src="/Assets/proyekbaru/js/jquery.easing.1.3.js"></script>
	<script src="/Assets/proyekbaru/js/jquery.waypoints.min.js"></script>
	<script src="/Assets/proyekbaru/js/jquery.stellar.min.js"></script>
	<script src="/Assets/proyekbaru/js/jquery.animateNumber.min.js"></script>
	<script src="/Assets/proyekbaru/js/owl.carousel.min.js"></script>
	<script src="/Assets/proyekbaru/js/jquery.magnific-popup.min.js"></script>
	<script src="/Assets/proyekbaru/js/scrollax.min.js"></script>
	<!-- <script src="/Assets/proyekbaru/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
	<!-- <script src="/Assets/proyekbaru/js/google-map.js"></script> -->
	<script src="/Assets/proyekbaru/js/main.js"></script>
    @yield('script_tambahan')
</body>
</html>