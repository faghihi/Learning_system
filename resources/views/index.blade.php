@extends('master')
@section('content')
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
                            @if(Session::get('Login') == 'True')
                                @if($user->type == 'student')
                                    <p><a href="/Dashboard"><em>اطلاعات بیشتر →</em></a></p>
                                @else
                                    <p><a href="/TDashboard"><em>اطلاعات بیشتر →</em></a></p>
                                @endif
                            @else
                                <p><a href="/UserArea"><em>اطلاعات بیشتر →</em></a></p>
                            @endif
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
  <section class="news-box top-margin">
          <div class="container">
              <h2><span>دروس جدید</span></h2>
              <div class="row">
                  @if(count($new_course) > 0)
                    @foreach($new_course as $nc)
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="newsBox">
                                <a href="/Courses/{{$nc->id}}">
                                <div class="thumbnail">
                                    <figure><img src="uploads/{{$nc->image}}" alt=""></figure>
                                    <div class="caption maxheight2">
                                        <div class="box_inner">
                                            <div class="box">
                                                <p class="title"><h5>{{$nc->name}}</h5></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                  @endif
              </div>
          </div>
      </section>
      <br>
      <!--videos part-->
      <section class="container" >
          <div class="row">
              <div class="col-md-12"><div class="title-box clearfix ">
                  <h2><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;ویدئوهای آموزشی</h2>
              </div>
                  <p>در این قسمت می توانید ویدئوهای آموزشی که برای بهبود سطح یادگیری و یا حل تمرین های شما درست شده است را مشاهده کنید.</p>
                  <p><a href="/Video"><em>→ اطلاعات بیشتر </em></a></p>
              </div>
          </div>
      </section>
      <!--about us part-->
  <section class="container black" id="AboutUs">
            <div class="row">
              <div class="col-md-12"><div class="title-box clearfix ">
                  <h2 class="title-box_primary">درباره ی ما</h2></div>
                  <p><span>
        سایت آموزش و تمرین برای دانش آموزان با محیطی شاد.
                  </span></p>
                  <p>تمرین حل کنید. رقابت کنید. پیشرفت کنید.</p>
                  <p>هدف ما این است که با محیطی جذاب حل کردن تمرین ها را برایتان لذت بخش کنیم.</p>
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
    
@endsection
