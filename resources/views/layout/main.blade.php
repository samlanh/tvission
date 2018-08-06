<!DOCTYPE html>
@php
$urlFromBack = Config::get('constants.myConstant.weburlpart');
@endphp

<html lang="en-us">
  <head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    
	@yield('title')
    <link rel="shortcut icon" href="{{ $urlFromBack.'/icon.ico'}}">

    <!-- GOOGLE FONTS
    <link href='//fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>-->
    
    <!-- STYLESHEETS-->
    <link href="{{ asset('assets/js/chosen/chosen.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
	
	<link rel="stylesheet" href="{{ asset('assets/kendo/styles/kendo.common-material.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/kendo/styles/kendo.material.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/kendo/styles/kendo.material.mobile.min.css') }}" />

    
	<link href="{{ asset('assets/js/typeahead/typeahead.css') }}" rel="stylesheet">    
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
   
    
    <!--[if lte IE 9]>
      <script src="js/respond.min.js" type="text/javascript"></script>
    <![endif]-->
	@yield('style')
  </head>
  <!----class="enable-fixed-header"--->
  <body >

    <!-- Start Header -->
    <header id="header" class="triangle">

      <!-- Menu toggle Mobile -->
      <label id="toggle" class="toggle"></label>
		<!-- Start Header-Inner -->
        <div class="header-inner cleafix">
          <!-- Start Header-Tool-Bar -->
          <div class="header-tool-bar">
            <div class="container">
              <div class="row">
                <!-- Start Header-Left -->
                <div class="col-lg-4 col-md-5 col-xs-12 header-left">

                  
                </div>
                <!-- End Header-Left -->

              </div>
            </div>
          </div>
          <!-- End Header-tool-bar -->

         

        </div>
        <!-- End Header-Inner -->
        <nav class="navbar navbar--fixed header-menu">
            <div class="navbar__brand">
                  <a class="logo" href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo.png') }}" />
                  </a>
          </div>
        </nav>
    </header>
    <!-- End Header -->
	

	@yield('content')
	
    <!-- Start Footer -->
    <footer id="footer">
      <div class="container">

          <!-- Start Footer-Content -->
          <div class="footer-content">
            <div class="row">

              
            </div>
        </div>
      </div>
      <!-- End Footer-Content -->

    </footer>
    <!-- End Footer -->

    <a href="#" class="btn" id="back-to-top"><i class="fa fa-arrow-up"></i></a>
    <!-- SCRIPTS-->
    <script src="{{ asset('assets/js/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/chosen/chosen.jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/chosen/init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/kendo/js/kendo.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.vide.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.10.4.custom.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/jquery.ba-outside-events.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.placeholder.js') }}"></script>
	<script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
  <script src="{{ asset('assets/js/typeahead/handlebars-v4.0.11.js') }}"></script>
	<script>
    var states = [];

	</script>
  <script type="text/javascript">
  var APP_URL = {!! json_encode(url('/')) !!}
  </script>
  <script src="{{ asset('assets/js/script-custome.js') }}"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>
  
	@yield('script')
  </body>
</html>