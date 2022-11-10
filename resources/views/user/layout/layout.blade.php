<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FreeHTML5.co

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('asset/user/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('asset/user/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('asset/user/css/bootstrap.css') }}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('asset/user/css/flexslider.css') }}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ asset('asset/user/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/user/css/owl.theme.default.min.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('asset/user/css/style.css') }}">

    <link href="{{ asset('asset/admin/css/lib/themify-icons.css') }}" rel="stylesheet">


	<!-- Modernizr JS -->
	<script src="{{ asset('asset/user/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div class="fh5co-loader"></div>

	<div id="page">

    @include('user.layout.nav_bar')

    @yield('content')

    @include('user.layout.footer')

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="{{ asset('asset/user/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('asset/user/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('asset/user/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('asset/user/js/jquery.waypoints.min.js') }}"></script>
	<!-- Carousel -->
	<script src="{{ asset('asset/user/js/owl.carousel.min.js') }}"></script>
	<!-- countTo -->
	<script src="{{ asset('asset/user/js/jquery.countTo.js') }}"></script>
	<!-- Flexslider -->
	<script src="{{ asset('asset/user/js/jquery.flexslider-min.js') }}"></script>
	<!-- Main -->
	<script src="{{ asset('asset/user/js/main.js') }}"></script>

    @yield('script-section')

	</body>
</html>

