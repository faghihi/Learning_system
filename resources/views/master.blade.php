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

<footer id="footer">

    <div class="container">
        <div class="row">
            <div class="footerbottom">
                <div class="col-md-3 col-sm-6 footer-col">
                    <div class="footerwidget">
                        <h4><a href="#" data-toggle="modal" data-target="#teacher-modal">
                                اساتید عضو
                            </a></h4>
                        <div class="menu-course">
                            <ul class="menu">
                                <li><a href="#">
                                        مریم رهبر زارع
                                    </a>
                                </li>
                                <li><a href="#">
                                        احمد بیات
                                    </a>
                                </li>
                                <li><a href="#">
                                        سهیلا مورچگانی
                                    </a>
                                </li>
                                <li><a href="#">
                                        میرهادی سرکارفرشی
                                    </a>
                                </li>
                                <li><a href="#">
                                        سپیده صاحب فصولی
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 footer-col">
                    <div class="footerwidget">
                        <h4><a href="#" data-toggle="modal" data-target="#school-modal">
                                مدارس عضو
                            </a></h4>
                        <div class="menu-course">
                            <ul class="menu">
                                <li> <a href="#">
                                        فرزانگان 3 کرج
                                    </a>
                                </li>
                                <li><a href="#">
                                        علامه حلی 4 تهران
                                    </a>
                                </li>
                                <li><a href="#">
                                        شهدای کارگر
                                    </a>
                                </li>
                                <li><a href="#">
                                        ابوریحان
                                    </a>
                                </li>
                                <li><a href="#">
                                        سلام صادقیه
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 footer-col">
                    <div class="footerwidget">
                        <h4><a href="#" data-toggle="modal" data-target="#course-modal">
                                دروس ارائه شده
                            </a></h4>
                        <div class="menu-course">
                            <ul class="menu">
                                <li><a href="#">
                                        آمار
                                    </a>
                                </li>
                                <li> <a href="#">
                                        ریاضی 2
                                    </a>
                                </li>
                                <li><a href="#">
                                        ریاضی 1
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 footer-col">
                    <div class="footerwidget">
                        <h4><a href="/Contact">ارتباط با ما</a></h4>
                        <p>ارتباط مستقیم</p>
                        <div class="contact-info">
                            <i class="fa fa-map-marker"></i>&nbsp; تهران، چهارراه ولیعصر، دانشگاه صنعتی امیرکبیر<br>
                            <i class="fa fa-phone"></i>&nbsp; 021-22224444<br>
                            <i class="fa fa-envelope-o"></i>&nbsp; youremail@email.com
                        </div>
                    </div><!-- end widget -->
                </div>
            </div>
        </div>
        <div class="supporter text-center">
            <h4>حامیان: &nbsp;</h4>
            <a  href="http://www.aut.ac.ir"><img  src="{{URL::asset('images/AKUT.svg.png')}}" title="دانشگاه صنعتی امیرکبیر"></a>
            <a href="#"></a>
        </div>
        <div class="social text-center">
            <a href="#"><i class="fa fa-twitter" title="twitter"></i></a>
            <a href="#"><i class="fa fa-facebook" title="facebook"></i></a>
            <a href="#"><i class="fa fa-instagram" title="instagram"></i></a>
            <a href="#"><i class="fa fa-location-arrow" title="telegram"></i></a>
        </div>

        <!-- Modal -->
        <!--Teacher Modal-->
        <div id="teacher-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <br/>
                        <h4 class="modal-title">اساتید عضو در سایت :</h4>
                    </div>
                    <div class="modal-body">
                        <p>جستجو در نام اساتید:</p>
                        <form>
                            <input class="search-modal" type="text" name="search" placeholder="جستجو ...">
                        </form>
                        <hr>
                        <div class="result-search">
                            <div class="teacher-block">
                                <img src="{{URL::asset('images/profile1.png')}}">
                                <p>مریم رهبر زارع</p>
                            </div>
                            <div class="teacher-block">
                                <img src="{{URL::asset('images/profile2.png')}}">
                                <p>مریم رهبر زارع</p>
                            </div>
                            <div class="teacher-block">
                                <img src="{{URL::asset('images/profile1.png')}}">
                                <p>مریم رهبر زارع</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ببندش!</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Teacher Modal-->
        <!--school Modal-->
        <div id="school-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <br/>
                        <h4 class="modal-title">مدارس ثبت شده در سایت: </h4>
                    </div>
                    <div class="modal-body">
                        <p>جستجو در نام مدارس:</p>
                        <form>
                            <input class="search-modal" type="text" name="search" placeholder="جستجو ...">
                        </form>
                        <hr>
                        <div class="result-search">
                            <div class="school-block">
                                <p>فرزانگان 3</p>
                                <p>کرج - بلوار امام رضا - اردلان 3</p>
                            </div>
                            <div class="school-block">
                                <p>فرزانگان 3</p>
                                <p>کرج - بلوار امام رضا - اردلان 3</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ببندش!</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /school Modal-->
        <!--school Modal-->
        <div id="course-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <br/>
                        <h4 class="modal-title">دروس  موجود در سایت: </h4>
                    </div>
                    <div class="modal-body">
                        <p>جستجو در نام دروس:</p>
                        <form>
                            <input class="search-modal" type="text" name="search" placeholder="جستجو ...">
                        </form>
                        <hr>
                        <div class="result-search">
                            <div class="course-block">
                                <p>آمار</p>
                                <p>مقطع: &nbsp;<span>دهم</span></p>
                            </div>
                            <div class="course-block">
                                <p>ریاضی</p>
                                <p>مقطع: &nbsp;<span>دهم</span></p>
                            </div>
                            <div class="course-block">
                                <p>آمار</p>
                                <p>مقطع: &nbsp;<span>دهم</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ببندش!</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /school Modal-->
        <!-- /Modal -->

        <div class="clear"></div>
        <!--CLEAR FLOATS-->
    </div>
    <div class="footer2">
        <div class="container">
            <div class="row">
                <div class="col-md-4 panel footer-col">
                    <div class="panel-body">
                        <p class="simplenav">
                            <a href="#">صفحه اصلی</a> |
                            <a href="#AboutUs">درباره ی ما</a> |
                            <a href="#">آموزش</a> |
                            <a href="/Contact">ارتباط با ما</a> |
                            <a href="/Dashboard">داشبورد</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-5 panel footer-col">
                </div>
                <div class="col-md-3 panel footer-col">
                    <p class="text-right">
                        Copyright &copy; 2016 example.com
                    </p>
                </div>
            </div>
            <!-- /row of panels -->
        </div>
    </div>
</footer>

</body>
</html>