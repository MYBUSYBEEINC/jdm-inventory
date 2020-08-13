<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>JDM - Techno Computer Center</title>
	<meta charset="UTF-8">
	<meta name="description" content=" JDM - Techno Computer Center">
	<meta name="keywords" content="jdm, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon"/>
    
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


    <!-- Stylesheets -->
    
    <link rel="stylesheet" href="{{asset('ecom/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('ecom/flaticon.css')}}"/>
	<link rel="stylesheet" href="{{asset('ecom/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('ecom/slicknav.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('ecom/jquery-ui.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('ecom/owl.carousel.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('ecom/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('ecom/style.css')}}"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.3.92/css/materialdesignicons.min.css" />
    <script src="https://kit.fontawesome.com/451e0261bd.js" crossorigin="anonymous"></script>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
    </div>

	<header class="header-section">
        @include('partials.header')
	</header>

    @yield('content')

	<!-- Footer section -->
	<section class="footer-section">
		@include('partials.footernew')
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('ecom/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('ecom/bootstrap.min.js')}}"></script>
	<script src="{{asset('ecom/jquery.slicknav.min.js')}}"></script>
	<script src="{{asset('ecom/owl.carousel.min.js')}}"></script>
	<script src="{{asset('ecom/jquery.nicescroll.min.js')}}"></script>
	<script src="{{asset('ecom/jquery.zoom.min.js')}}"></script>
	<script src="{{asset('ecom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('ecom/main.js')}}"></script>

	</body>
</html>
