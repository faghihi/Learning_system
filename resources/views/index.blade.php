<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>سایت آموزش آمار</title>
	<link rel="favicon" href="{{URL::asset('images/favicon.png')}}">
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

  <div class="container">
    <div class="row">

					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="{{URL::asset('images/2.png')}}" alt="" />
							</div><!--icon box top -->
							<h4>آموزش دروس</h4>
							<p>آموزش در ئبسایت جداگانه که دایرکت میشود به آن.</p>
     						<p><a href="#"><em>اطلاعات بیشتر →</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
                    <div class="col-md-3">
                        <div class="grey-box-icon">
                            <div class="icon-box-top grey-box-icon-pos">
                                <img src="{{URL::asset('images/4.png')}}" alt="" />
                            </div><!--icon box top -->
                            <h4>حل تمرین ها</h4>
                            <p>با حل تمرین ها امتیاز و  مهارت های مختلف کسب کنید و با دوستان خود وارد رقابت شوید.</p>
                            <p><a href="#"><em>اطلاعات بیشتر →</em></a></p>
                        </div><!--grey box -->
                    </div><!--/span3-->
                    <div class="col-md-3">
                        <div class="grey-box-icon">
                            <div class="icon-box-top grey-box-icon-pos">
                                <img src="{{URL::asset('images/1.png')}}" alt="" />
                            </div><!--icon box top -->
                            <h4>داشبورد</h4>
                            <p>اطلاعات کارهایی که تا الان انجام داده اید را مشاهده کنید.</p>
                            <p><a href="/Dashboard"><em>اطلاعات بیشتر →</em></a></p>
                        </div><!--grey box -->
                    </div><!--/span3-->
                    <div class="col-md-3">
                        <div class="grey-box-icon">
                            <div class="icon-box-top grey-box-icon-pos">
                                <img src="{{URL::asset('images/3.png')}}" alt="" />
                            </div><!--icon box top -->
                            <h4>راهنمایی</h4>
                            <p>اگر گیج شدی و نمیدونی دقیق باید چیکار کنی بیا اینجا.</p>
                            <p><a href="#"><em>اطلاعات بیشتر →</em></a></p>
                        </div><!--grey box -->
                    </div><!--/span3-->
				</div>
    </div>
	
  <section class="container black" id="AboutUs">
      <div class="row">
      	<div class="col-md-12"><div class="title-box clearfix ">
            <h2 class="title-box_primary">درباره ی ما</h2></div>
            <p><span>
                سایت آموزش و تمرین برای دانش آموزان با محیطی شاد.
            </span></p>
            <p>متن توضیح. متن توضیح. متن توضیح. متن توضیح. متن توضیح. ر متن توضیح. متن توضیح. متن توضیح. متن توضیح. متن توضیح. ر متن توضیح. ر رمتن توضیح.</p>
            <p>متن توضیح. متن توضیح. متن توضیح. متن توضیح. متن توضیح. ر متن توضیح. متن توضیح. متن توضیح. متن توضیح. متن توضیح. ر متن توضیح. ر رمتن توضیح.</p>
        </div>
      </div>
      </section>
      
    @include('footer')

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="{{URL::asset('js/modernizr-latest.js')}}"></script>
	<script type='text/javascript' src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/fancybox/jquery.fancybox.pack.js')}}"></script>
    
    <script type='text/javascript' src="{{URL::asset('js/jquery.mobile.customized.min.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/jquery.easing.1.3.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/camera.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('js/custom.js')}}"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: 'images/'
			});

		});
      
	</script>
    
</body>
</html>
