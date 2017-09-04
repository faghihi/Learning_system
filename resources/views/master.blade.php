<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>سایت آموزش آنلاین</title>
	<link rel="favicon" href='/images/favicon.png'>
	<link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/bootstrap-theme.css')}}" media="screen">
	<link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel='stylesheet' id='camera-css'  href="{{URL::asset('css/camera.css')}}" type='text/css' media='all'>
    <link rel="stylesheet" href="{{URL::asset('css/general.css')}}">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="{{URL::asset('js/html5shiv.js')}}"></script>
	<script src="{{URL::asset('js/respond.min.js')}}"></script>
	<![endif]-->
</head>
<body>
	@include('navbar',array('active'=>'home'))

	<!-- Header -->
	<header id="head">
		<div class="container">
             <div class="heading-text">
							<h1 class="animated flipInY delay1">شروع آموزش</h1>
							<p>وبسایت آموزش و پرسش آنلاین </p>
             </div>

             <div class="fluid_container">
                    <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                        <div data-thumb="{{URL::asset('images/slides/thumbs/img4.jpg')}}" data-src="{{URL::asset('images/slides/img4.jpg')}}">
                        </div>
                        <div data-thumb="{{URL::asset('images/slides/thumbs/img2.jpg')}}" data-src="{{URL::asset('images/slides/img2.jpg')}}">
                        </div>
                        <div data-thumb="{{URL::asset('images/slides/thumbs/img5.jpg')}}" data-src="{{URL::asset('images/slides/img5.jpg')}}">
                        </div>
                    </div><!-- #camera_wrap_3 -->
             </div><!-- .fluid_container -->
		</div>
	</header>
	<!-- /Header -->

@yield('content')

</body>
</html>