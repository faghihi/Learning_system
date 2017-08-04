
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد</title>
    <link rel="favicon" href="{{URL::asset('images/favicon.png')}}">
    <!-- custome js just for login page -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fontiran.css')}}">
    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-theme.css')}}" media="screen">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">

    <link rel="stylesheet" href="{{URL::asset('css/general.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/dashboard.css')}}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{URL::asset('js/html5shiv.js')}}"></script>
    <script src="{{URL::asset('js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body>
<!-- Fixed navbar -->
@include('navbar',array('active'=>'dashboard'));
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
        <aside class="col-md-3 col-sm-12 sidebar sidebar-right">
            <div class="row">
                <div class="col-md-12 col-sm-12 activity">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a data-toggle="pill" href="#first-page">
                                <i class="fa fa-home fa-3x" aria-hidden="true"></i>صفحه نخست
                            </a></li>
                        <li><a data-toggle="pill" href="#goal">
                                <i class="fa fa-bullseye fa-3x" aria-hidden="true"></i>&nbsp;هدف
                            </a></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 activity">
                    <h4 class="section-title black">تمرین ها:</h4>
                    <ul class="nav nav-pills nav-stacked">
                        <li ><a data-toggle="pill" href="#new-test">تمرین های جدید</a></li>
                        <li ><a data-toggle="pill" href="#solving-test">تمرین های در حال حل</a></li>
                        <li ><a data-toggle="pill" href="#solved-test">تمرین های حل شده</a></li>
                        <li ><a data-toggle="pill" href="#get-test">گرفتن تمرین</a></li>
                    </ul>
                    <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 activity">
                    <h4 class="section-title black">درس های فعال:</h4>
                    <ul class="nav nav-pills nav-stacked">
                        <li ><a data-toggle="pill" href="#class1"><span class="course">آمار دهم</span>&nbsp;-&nbsp;<span class="teacher">محمدی</span></a></li>
                        <li ><a data-toggle="pill" href="#class2"><span class="course">آمار دهم</span>&nbsp;-&nbsp;<span class="teacher">سایت</span></a></li>
                        <li ><a data-toggle="pill" href="#class3"><span class="course">ریاضی دهم</span>&nbsp;-&nbsp;<span class="teacher">موسوی</span></a></li>
                    </ul>
                    <br>
                </div>
            </div>
        </aside>
        <!-- /Sidebar -->
        <!-- Article main content -->
        <article class="tab-content col-md-9 col-sm-12">
            <br>
            <div id="first-page" class="tab-pane fade in active">
                <h2 class="black">به داشبورد خوش اومدی.</h2>
                <br>
                <div class="row">
                    <div class="col-md-8 activity situation">
                        <h4>وضعیت در این هفته:</h4>
                        <img>
                        <span>&nbsp;</span>
                        <div class="progress">
                            <div id="progTestPart" class="progress-bar progress-bar-striped" role="progressbar">
                                <p>تمرین (<span></span>)</p>
                            </div>
                            <div id="progQuesPart" class="progress-bar progress-bar-striped" role="progressbar">
                                <p>سوال (<span></span>)</p>
                            </div>
                        </div>
                        <p> تمرین های حل شده:&nbsp;<span class="UrTest">1</span>/<span class="GoalTest">{{$info['exam']}}</span></p>
                        <p>سوالات حل شده:&nbsp;<span class="UrQue">1</span>/<span class="GoalQue">{{$info['questions']}}</span></p>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <h4 class="black">تمرین جدید:</h4>
                    <div class="row">
                        <p>نداری!</p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <h4 class="black">تمرین در انتظار حل:</h4>
                    <div class="row">
                        <button class="btn course-button btn-md">گردآوری داده ها - 1</button>
                        <button class="btn course-button btn-md">گردآوری داده 2</button>
                        <button class="btn course-button btn-md">گردآوری داده - سایت</button>
                    </div>
                </div>
                <br>
                <!--message part-->
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <h3>پیام ها</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 message">
                        <div class="row message-title">
                            <div class="col-md-3 col-sm-3"><b>فرستنده</b></div>
                            <div class="col-md-2 col-sm-2"><b>موضوع</b></div>
                            <div class="col-md-5 col-sm-5"><b>پیام</b></div>
                            <div class="col-md-2 col-sm-2"><b>پاسخ</b></div>
                        </div>
                        <div class="row message-part">
                            <div class="col-md-3 col-sm-3"><p>ادمین</p></div>
                            <div class="col-md-2 col-sm-2"><p>ثبت درخواست</p></div>
                            <div class="col-md-5 col-sm-5"><p>
                                    <a href="#" data-toggle="modal" data-target="#message-modal">درخواست شما در حال بررسی.</a>
                                </p></div>
                            <div class="col-md-2 col-sm-2"><button class="btn btn-primary btn-sm" disabled>
                                    <i class="fa fa-lg fa-pencil-square-o" aria-hidden="true"></i></button></div>
                        </div>
                        <div class="row message-part">
                            <div class="col-md-3 col-sm-3"><p>ادمین</p></div>
                            <div class="col-md-2 col-sm-2"><p>تمرین دوم</p></div>
                            <div class="col-md-5 col-sm-5"><p>در قسمت اول سوال مشکلی وجود دارد.</p></div>
                            <div class="col-md-2 col-sm-2"><button class="btn btn-primary btn-sm" disabled>
                                    <i class="fa fa-lg fa-pencil-square-o" aria-hidden="true"></i></button></div>
                        </div>
                        <div class="row message-part">
                            <div class="col-md-3 col-sm-3"><p>ادمین</p></div>
                            <div class="col-md-2 col-sm-2"><p>مدرسه</p></div>
                            <div class="col-md-5 col-sm-5"><p>درخواست شما برای ثبت مدرسه در حال پیگیری است.</p></div>
                            <div class="col-md-2 col-sm-2"><button class="btn btn-primary btn-sm" disabled>
                                    <i class="fa fa-lg fa-pencil-square-o" aria-hidden="true"></i></button></div>
                        </div>
                    </div>
                </div>
                <!--End message part-->
            </div>
            <div id="goal" class="tab-pane fade">
                <h3 class="black">تعیین هدف</h3>
                <br><br>
                <p>برای یک هفته ی خود هدف تعیین کنید.</p>
                <p>مشخص کنید در یک هفته حل چه تعداد تمرین و مسئله شمارا به در اوج نگه میدارد و یا اگر در اوج نیست به آن نزدیکتان میکند. :-)</p>
                <br><br>
                <form class="form-inline" method="get" action="/Dashboard/SetGoal">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>تعداد تمرین:</label>
                                <input class="form-control" type="number" name="exam" value="{{$info['exam']}}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>تعداد سوال:</label>
                                <input class="form-control" type="number" name="questions" value="{{$info['questions']}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">ثبت</button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
            </div>
            <div id="new-test" class="tab-pane fade">
                <h3 class="black">تمرین جدید</h3>
                <p>برای شروع به حل تمرین مورد نظر روی گزینه ی شروع کلیک کنید.</p>
                <div class="row">
                    <div class="dash-table">
                        <div class="row dash-table-title">
                            <div class="col-md-4">
                                <h4>نام تمرین</h4>
                            </div>
                            <div class="col-md-4">
                                <h4>آموزگار</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>حل</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>حذف</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row dash-table-content chapter">
                            <div class="col-md-4">
                                <p>گردآوری داده - 3</p>
                            </div>
                            <div class="col-md-4">
                                <p>محمدی</p>
                            </div>
                            <div class="col-md-2">
                                <a href="#"><button class="btn btn-success btn-sm">شروع</button></a>
                            </div>
                            <div class="col-md-2">
                                <a href="#"><button class="btn btn-delete btn-sm">حذف</button></a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div id="solving-test" class="tab-pane fade">
                <h3 class="black">تمرین در انتظار حل</h3>
                <p>برای ادامه حل تمرین مورد نظر روی گزینه ی ادامه کلیک کنید.</p>
                <div class="row">
                    <div class="dash-table">
                        <div class="row dash-table-title">
                            <div class="col-md-4">
                                <h4>نام تمرین</h4>
                            </div>
                            <div class="col-md-4">
                                <h4>آموزگار</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>حل</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>حذف</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row dash-table-content chapter">
                            <div class="col-md-4">
                                <p>گردآوری داده - 3</p>
                            </div>
                            <div class="col-md-4">
                                <p>محمدی</p>
                            </div>
                            <div class="col-md-2">
                                <a href="#"><button class="btn btn-success btn-sm">ادامه</button></a>
                            </div>
                            <div class="col-md-2">
                                <a href="#"><button class="btn btn-delete btn-sm">حذف</button></a>
                            </div>
                        </div>
                        <br>
                        <div class="row dash-table-content chapter">
                            <div class="col-md-4">
                                <p>گردآوری داده</p>
                            </div>
                            <div class="col-md-4">
                                <p>سایت</p>
                            </div>
                            <div class="col-md-2">
                                <a href="#"><button class="btn btn-success btn-sm">ادامه</button></a>
                            </div>
                            <div class="col-md-2">
                                <a href="#"><button class="btn btn-delete btn-sm">حذف</button></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="solved-test" class="tab-pane fade">
                <h3 class="black">تمرین های حل شده</h3>
                <br><br>
                <div class="row">
                    <div class="col-md-12 col-sm-12 dash-table">
                        <div class="row dash-table-title">
                            <div class="col-md-3">
                                <h4>تمرین</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>آموزگار</h4>
                            </div>
                            <div class="col-md-2">
                                <h5>نمره</h5>
                            </div>
                            <div class="col-md-4">
                                <h5>پیشرفت</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row dash-table-content chapter">
                            <div class="col-md-3">
                                <p class="black">گردآوری داده ها - 1</p>
                            </div>
                            <div class="col-md-3">
                                <p class="black">محمدی</p>
                            </div>
                            <div class="col-md-2">
                                <p><span class="stuPoint">8</span>/<span class="totalPoint">10</span></p>
                            </div>
                            <div class="col-md-4">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row dash-table-content chapter">
                            <div class="col-md-3">
                                <p class="black">گردآوری داده ها 1</p>
                            </div>
                            <div class="col-md-3">
                                <p class="black">سایت</p>
                            </div>
                            <div class="col-md-2">
                                <p><span class="stuPoint">5</span>/<span class="totalPoint">7</span></p>
                            </div>
                            <div class="col-md-4">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="get-test" class="tab-pane fade">
                <h3 class="black">گرفتن تمرین</h3>
                <br>
                <h4>گرفتن تمرینی که آموزگار تعریف کرده است</h4><br>
                <p>برای گرفتن تمرینی که آموزگارتان تعریف کرده است نام تمرین و پسورد آن را از آموزگارتان بگیرید و آن را در قسمت زیر وارد کنید.</p>
                <br>
                <form class="form-inline">
                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                            <div class="form-group">
                                <label>نام تمرین:</label>
                                <input class="form-control" name="testName">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>رمز:</label>
                                <input class="form-control" name="testPass">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-default btn-md">ثبت</button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <h4>گرفتن تمرین از سایت</h4><br>
                <p>برای گرفتن تمرین از سایت از قسمت منو بر روی درس مورد نظر کلیک کنید تا وارد قسمت تمرین های مربوطه شوید.</p>
            </div>
            <div id="class1" class="tab-pane fade">
                <h3 class="black">اطلاعات کلاس</h3>
                <h4><span class="course">آمار دهم</span>&nbsp;-&nbsp;<span class="teacher">محمدی</span></h4>
                <br><br>
                <div class="row" >
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-md-10 col-sm-10">
                        <canvas id="student-line"></canvas>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h4><i class="fa fa-2x fa-file-text" aria-hidden="true"></i>&nbsp;گزارش وضعیت</h4>
                    </div>
                </div>
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
                                <p><span class="stuPoint">8</span>/<span class="totalPoint">10</span></p>
                            </div>
                            <div class="col-md-4">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row dash-table-content dash-section">
                            <div class="col-md-5">
                                <p>انواع متغیر</p>
                            </div>
                            <div class="col-md-3">
                                <p><span class="stuPoint">2</span>/<span class="totalPoint">10</span></p>
                            </div>
                            <div class="col-md-4">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row dash-table-content dash-section">
                            <div class="col-md-5">
                                <p>مقیاس های اندازه گیری</p>
                            </div>
                            <div class="col-md-3">
                                <p><span class="stuPoint">5</span>/<span class="totalPoint">10</span></p>
                            </div>
                            <div class="col-md-4">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <form>
                    <p>برای حذف درس کلیک کنید.</p>
                    <div class="form-group">
                        <button class="btn btn-delete btn-lg">حذف درس</button>
                    </div>
                </form>
            </div>
            <br><br>
        </article>
        <!-- /Article main content -->
        <!--Message Modal-->
        <div id="message-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <br/>
                        <h3 class="modal-title">ثبت درخواست</h3>
                        <h4>ادمین</h4>
                    </div>
                    <div class="modal-body">
                        <p>درخواست شما در حال بررسی است. تا 24ساعت آینده پاسخ دانش آموز فرستاده خواهد شد.</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ببندش!</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Message Modal-->
    </div>
</div>
<!-- /container -->

@include('footer');

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<!--chart.js for charts-->
<script src="{{URL::asset('js/chartjs/Chart.bundle.js')}}"></script>
<!-- custome js just for login page -->
<script src="{{URL::asset('js/dashboard.js')}}"></script>
<script src="{{URL::asset('js/custom.js')}}"></script>
<!-- Google Maps -->
<script src="{{URL::asset('js/Gmap.JS')}}"></script>
<script src="{{URL::asset('js/google-map.js')}}"></script>


</body>
</html>
