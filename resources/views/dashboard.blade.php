
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبور شخصی</title>
    <link rel="favicon" href="{{URL::asset('images/favicon.png')}}">
    <!-- custome js just for login page -->

    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fontiran.css')}}">
    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-theme.css')}}" media="screen">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">

    <link rel="stylesheet" href="{{URL::asset('css/general.css')}}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{URL::asset('js/html5shiv.js')}}"></script>
    <script src="{{URL::asset('js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="/">
                <img src="images/logo.png" alt="Techro HTML5 template"></a>
        </div>
        <div class="navbar-collapse collapse" >
            <ul class="nav navbar-nav pull-right mainNav" >
                <li><a href="/">صفحه ی اصلی</a></li>
                <li><a href="/#AboutUs">درباره ی ما</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">تمرین
                        &nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu dropdown-menu-right multi-column columns-3" >
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="multi-column-dropdown">
                                    <li class="dropdown-header">دوره ی دهم</li>
                                    <li><a href="/Courses/amar10">آمار</a></li>
                                    <li class="disabled"><a href="#">ریاضی</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="multi-column-dropdown">
                                    <li class="dropdown-header">دوره ی یازدهم</li>
                                    <li><a href="#">آمار</a></li>
                                    <li class="disabled"><a href="#">احتمال</a></li>
                                    <li class="disabled"><a href="#">ریاضی</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="multi-column-dropdown">
                                    <li class="dropdown-header">دوره ی دوازدهم</li>
                                    <li><a href="#">آمار</a></li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                </li>
                <li><a href="#">آموزش</a></li>
                <li><a href="/Contact">ارتباط با ما</a></li>
                <li class="active"><a href="#">داشبورد</a></li>
                <li><a href="/UserArea">ورود | ثبت نام</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">روشنک
                        &nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="/Profile">پروفایل</a></li>
                        <li><a href="#">خروج</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<!-- /.navbar -->

<header id="head" class="secondary">
    <div class="container">
        <h1>داشبورد</h1>
        <p></p>
    </div>
</header>


<!-- container -->
<div class="container">
    <br>
    <br>
    <div class="row">
        <!-- Sidebar -->
        <aside class="col-md-3 sidebar sidebar-right">
            <div class="activity">
                <h4 class="section-title">&nbsp;دروس فعال: </h4>
                <button class="btn course-button btn-md">آمار</button>
                <button class="btn course-button btn-md">ریاضی</button>
            </div>
        </aside>
        <!-- /Sidebar -->
        <!-- Article main content -->
        <article class="col-md-9">
            <h2>آمار</h2>
            <div class="row">
                <div class="col-md-4 activity">
                    <h4>وضعیت:</h4>
                    <img src="images/emoticon/64perfect.png">
                    <span>&nbsp;</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
                             aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:30%">
                            30%
                        </div>
                    </div>
                    <p> کوییزهای حل شده: <span>&nbsp;1/6</span></p>
                    <p>سوالات حل شده: <span>&nbsp;0/10</span></p>
                    <p>امتیاز کسب شده: <span>&nbsp;0/20</span></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <a href="Q/Courses/amar10"><button class="btn btn-default btn-md">ادامه ی تمرین</button></a>
                </div>
                <div class="col-md-3">
                    <a href="Q/Courses/amar10"></a><button class="btn btn-default btn-md">تمرین جدید</button></a>
                </div>
            </div>
            <h3>جدول نمایش اطلاعات</h3>
            <p>در جدول زیر اطلاعات امنیازات و مهارت های کسب شده ی مربوط به هر موضوع درسی آمده است. برای اطلاع از هر بخش موس را روی آن نگه دارید.</p>
            <div class="row">
                <div class="dash-table">
                    <div class="row dash-table-title">
                        <div class="col-md-5">
                            <h4>فصل</h4>
                        </div>
                        <div class="col-md-3">
                            <h4>امتیاز</h4>
                        </div>
                        <div class="col-md-4">
                            <h4>مهارت</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row dash-table-content chapter">
                        <div class="col-md-5">
                            <p>گردآوری داده</p>
                        </div>
                        <div class="col-md-3">
                            <p>2/10</p>
                        </div>
                        <div class="col-md-4">
                            <div class="progress">
                                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                    20%
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row dash-table-content dash-section">
                        <div class="col-md-5">
                            <p>انواع متغیر</p>
                        </div>
                        <div class="col-md-3">
                            <p>2/3</p>
                        </div>
                        <div class="col-md-4">
                            <div class="progress">
                                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                    60%
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row dash-table-content dash-section">
                        <div class="col-md-5">
                            <p>مقیاس های اندازه گیری</p>
                        </div>
                        <div class="col-md-3">
                            <p></p>
                        </div>
                        <div class="col-md-4">
                            <div class="progress">
                                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
                                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    0%
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </article>
        <!-- /Article main content -->

    </div>
</div>
<!-- /container -->

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
            <a  href="http://www.aut.ac.ir"><img  src="images/AKUT.svg.png" title="دانشگاه صنعتی امیرکبیر"></a>
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
                                <img src="images/profile1.png">
                                <p>مریم رهبر زارع</p>
                            </div>
                            <div class="teacher-block">
                                <img src="images/profile2.png">
                                <p>مریم رهبر زارع</p>
                            </div>
                            <div class="teacher-block">
                                <img src="images/profile1.png">
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
                            <a href="/">صفحه اصلی</a> |
                            <a href="/#AboutUs">درباره ی ما</a> |
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


<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<!-- custome js just for login page -->
<script src="{{URL::asset('js/custom.js')}}"></script>

<!-- Google Maps -->
<script src="{{URL::asset('js/Gmap.JS')}}"></script>
<script src="{{URL::asset('js/google-map.js')}}"></script>

</body>
</html>
