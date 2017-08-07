<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>داشبورد</title>
        <link rel="favicon" href="images/favicon.png">
        <link rel="favicon" href="images/favicon.png">
        <!-- custome js just for login page -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/fontiran.css">
        <!-- Custom styles for our template -->
        <link rel="stylesheet" href="css/bootstrap-theme.css" media="screen">
        <link rel="stylesheet" href="css/style.css">
        <!--   * Tag-it's base CSS (jquery.tagit.css). -->
        <link href="css/jQuery-ui/jquery.tagit.css" rel="stylesheet" type="text/css">
        <link href="css/jQuery-ui/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="css/general.css">
        <link rel="stylesheet" href="css/Tdashboard.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]-->
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <!--[endif]-->
        <!--for insert mathematics formula-->
        <script type="text/javascript" async
                src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
        </script>
</head>
<body>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="Techro HTML5 template"></a>
        </div>
        <div class="navbar-collapse collapse" >
            <ul class="nav navbar-nav pull-right mainNav" >
                <li><a href="index.html">صفحه ی اصلی</a></li>
                <li><a href="index.html#AboutUs">درباره ی ما</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">تمرین
                        &nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu dropdown-menu-right multi-column columns-3" >
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="multi-column-dropdown">
                                    <li class="dropdown-header">دوره ی دهم</li>
                                    <li><a href="amar10.html">آمار</a></li>
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
                <li><a href="contact.html">ارتباط با ما</a></li>

                <?php
                if(Session::get('Login')=="True")
                {
                ?>
                <li class="active"><a href="#">داشبورد</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Session::get('Name')}}
                    &nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="/Profile">پروفایل</a></li>
                        <li><a href="/Logout">خروج</a></li>
                    </ul>
                </li>
                <?php
                }
                else {
                ?>
                <li><a href="/UserArea">ورود | ثبت نام</a></li>
                <?php
                }
                ?>
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
    <div class="row border">
        <!-- Sidebar -->
        <aside class="col-md-2 col-sm-2 sidebar sidebar-right">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a data-toggle="pill" href="#first-page">صفحه اصلی</a></li>
                <li><a data-toggle="pill" href="#add-class">ایجاد کلاس جدید</a></li>
                <li><a data-toggle="pill" href="#class-data">اطلاعات کلاس ها</a></li>
                <li><a data-toggle="pill" href="#add-test">تعریف تمرین جدید</a></li>
                <li><a data-toggle="pill" href="#test-data">اطلاعات تمرین ها</a></li>
                <li><a data-toggle="pill" href="#solved-test">تمرین های حل شده</a></li>
                <li><a data-toggle="pill" href="#add-question">اضافه کردن سوال</a></li>
                <li><a data-toggle="pill" href="#std-data">اطلاعات دانش آموزان</a></li>
            </ul>
        </aside>
        <!-- /Sidebar -->
        <!-- Article main content -->
        <article class="tab-content col-md-10 col-sm-10">
            <div id="first-page" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-md-3 col-sm-3"></div>
                    <div class="col-sm-6 col-md-6" style="text-align: center">
                        <h1>به داشبورد خوش آمدید</h1>
                        <br><br>
                    </div>
                </div>
                <!--shortcut-->
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-sm-10 col-md-10">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <a onclick="virtual_click('#class-data')" href="javaScript:void(0);">
                                    <div class="dash-shortcut dash1">
                                        <div class="dash-shortcut-pos">
                                            <span class="fa-stack fa-4x">
                                              <i class="fa fa-circle fa-stack-2x"></i>
                                              <i class="fa fa-users fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div><!--icon box top -->

                                        <h4>کلاس ها</h4>
                                    </div><!--dash shortcut box -->
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <a onclick="virtual_click('#test-data')" href="javaScript:void(0);">
                                    <div class="dash-shortcut dash2">
                                        <div class="dash-shortcut-pos">
                                            <span class="fa-stack fa-4x">
                                              <i class="fa fa-circle fa-stack-2x"></i>
                                              <i class="fa fa-file-text fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div><!--icon box top -->

                                        <h4>تمرین ها</h4>
                                    </div><!--dash shortcut box -->
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <a onclick="virtual_click('#std-data')" href="javaScript:void(0);">
                                    <div class="dash-shortcut dash3">
                                        <div class="dash-shortcut-pos">
                                            <span class="fa-stack fa-4x">
                                              <i class="fa fa-circle fa-stack-2x"></i>
                                              <i class="fa fa-bar-chart-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div><!--icon box top -->

                                        <h4>دانش آموز</h4>
                                    </div><!--dash shortcut box -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--message part-->
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-md-10 col-sm-10 ">
                        <h3>پیام ها</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-md-10 col-sm-10 message">
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
                <br><br>
            </div>
            <div id="add-question" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-sm-10 col-md-10">
                        <h3 class="black">اضافه کردن سوال</h3>
                        <h4>آمار سال دهم</h4>
                        <br>
                        <form>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="chapter">فصل:</label>
                                        <select class="form-control" id="chapter" required>
                                            <option selected>...</option>
                                            <option>گردآوری داده ها</option>
                                            <option>معیارهای گرایش به مرکز</option>
                                            <option>معیارهای پراکندگی</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="difficulty">میزان سختی سوال:</label>
                                        <select class="form-control " id="difficulty" required>
                                            <option selected>...</option>
                                            <option>آسان (1نمره)</option>
                                            <option>متوسط (2نمره)</option>
                                            <option>سخت (3نمره)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>صورت سوال:</label>
                                <p>برای اطلاعات بیشتر درباره ی نحوه ی وارد کردن عکس، فرمول های ریاضی و یا نمودارها در سوالات به قسمت <a href="guidance.html">راهنمایی</a> مراجعه کنید.</p>
                                <textarea rows="4" class="form-control" placeholder="..." required>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>گزینه ها:</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control " placeholder="گزینه 1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">

                                        <input class="form-control " placeholder="گزینه 2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control " placeholder="گزینه 3">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control " placeholder="گزینه 4">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>گزینه درست:</label>
                                        <input class="form-control " type="number" placeholder="عدد گزینه صحیح">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>راه حل(اختیاری):</label>
                                <textarea rows="4" class="form-control" placeholder="..." required>
                                </textarea>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-lg">ثبت</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div id="add-class" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-sm-10 col-md-10">
                        <h3 class="black">اضافه کردن کلاس</h3>
                        <h4>آمار سال دهم</h4>
                        <br>
                        <form>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>نام کلاس:</label>
                                        <input type="text" class="form-control" placeholder="کلاس">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>نام مدرسه:</label>
                                        <select class="form-control" required>
                                            <option selected value="1">...</option>
                                            <option value="1">فرزانگان 3</option>
                                            <option value="2">علامه حلی 1</option>
                                            <option value="3">شهید سلطانی 3</option>
                                            <option value="4">فرزانگان 1</option>
                                            @foreach($schools as $school)
                                                <option value = '5'>{{$school->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>انتخاب دانش آموزان:</label>
                                        <ul class="add-std" id="whole-student"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-lg">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="add-test" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-sm-10 col-md-10">
                        <h3 class="black">تعریف تمرین</h3>
                        <h4>آمار سال دهم</h4>
                        <br>
                        <form>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>تعداد سوالات آسان:</label>
                                        <input class="form-control" type="number">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>تعداد سوالات متوسط:</label>
                                        <input class="form-control" type="number">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>تعداد سوالات سخت:</label>
                                        <input class="form-control" type="number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>آزمون برای:</label>
                                        <select class="form-control" id="choose-test-group" required>
                                            <option selected value="1">یک کلاس</option>
                                            <option value="2">تعدادی از دانش آموزان </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>کلاس:</label>
                                        <select class="form-control" required>
                                            <option selected>دهم 1</option>
                                            <option>دهم 2</option>
                                            <option>دهم 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 stu-name" hidden>
                                    <div class="form-group">
                                        <label>انتخاب دانش آموزان:</label>
                                        <ul class="add-std" id="studentTag"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label >فصل:</label>
                                <select class="form-control"required>
                                    <option selected>...</option>
                                    <option>گردآوری داده ها</option>
                                    <option>معیارهای گرایش به مرکز</option>
                                    <option>معیارهای پراکندگی</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>نام تمرین:</label>
                                        <input class="form-control" placeholder="test">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>رمز:</label>
                                        <input class="form-control" placeholder="برای ورود دانش آموزان به تمرین">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>تاریخ شروع تمرین:</label>
                                        <input class="form-control" type="date" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>تاریخ پایان تمرین:</label>
                                        <input class="form-control" type="date" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-lg">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="test-data" class="tab-pane fade">
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-sm-10 col-md-10">
                    <h3 class="black">اطلاعات تمرین ها</h3>
                    <h4>آمار سال دهم</h4>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><i class="fa fa-2x fa-file-text" aria-hidden="true"></i>&nbsp; تمرین ها</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 dash-table">
                            <div class="row dash-table-title">
                                <div class="col-md-3">
                                    <h4>نام تمرین</h4>
                                </div>
                                <div class="col-md-3">
                                    <h5>کلاس</h5>
                                </div>
                                <div class="col-md-3">
                                    <h5>مدرسه</h5>
                                </div>
                                <div class="col-md-2">
                                    <h5>وضعیت تمرین</h5>
                                </div>
                                <div class="col-md-1">
                                    <h5>حذف</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row dash-table-content chapter">
                                <div class="col-md-3">
                                    <p><a href="#">تمرین دهم 1</a></p>
                                </div>
                                <div class="col-md-3">
                                    <p>دهم 2</p>
                                </div>
                                <div class="col-md-3">
                                    <p>فرزانگان 3</p>
                                </div>
                                <div class="col-md-2">
                                    <p>حل شده</p>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn-delete btn-sm delete-test" title="حذف تمرین">
                                        <i class="fa fa-1x fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <div class="row dash-table-content chapter">
                                <div class="col-md-3">
                                    <p><a href="#">تمرین گردآوری داده 1</a></p>
                                </div>
                                <div class="col-md-3">
                                    <p>دهم 2</p>
                                </div>
                                <div class="col-md-3">
                                    <p>علامه حلی 2</p>
                                </div>
                                <div class="col-md-2">
                                    <p>در انتظار حل</p>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn-delete btn-sm delete-test" title="حذف تمرین">
                                        <i class="fa fa-1x fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <div class="row dash-table-content chapter">
                                <div class="col-md-3">
                                    <p><a href="#">تمرین معیار پراکندگی 1</a></p>
                                </div>
                                <div class="col-md-3">
                                    <p>دهم 2</p>
                                </div>
                                <div class="col-md-3">
                                    <p>فرزانگان 3</p>
                                </div>
                                <div class="col-md-2">
                                    <p>در انتظار حل</p>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn-delete btn-sm delete-test" title="حذف تمرین">
                                        <i class="fa fa-1x fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <form>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>نام</label>
                                    <input type="text" class="form-control editable" value="" disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>کلاس</label>
                                    <input type="text" class="form-control" value="" disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>مدرسه</label>
                                    <input type="text" class="form-control" value="" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>رمز</label>
                                    <input type="text" class="form-control editable" value="" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>فصل</label>
                                    <select class="form-control editable" disabled>
                                        <option selected>فصل گردآوری داده</option>
                                        <option>معیار گرایش به مرکز</option>
                                        <option>معیار پراکندگی 1</option>
                                        <option>معیار پراکندگی 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>تاریخ شروع</label>
                                    <input type="date" class="form-control editable" value="" disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>تاریخ پایان</label>
                                    <input type="date" class="form-control editable" value="" disabled>
                                </div>
                            </div>
                        </div>
                        <div >
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">تعداد سوال:</label>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-4">
                                    <div class="form-group">
                                        <label>آسان</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-8">
                                    <div class="form-group">
                                        <input type="number" class="form-control editable" value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-4">
                                    <div class="form-group">
                                        <label>متوسط</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-8">
                                    <div class="form-group">
                                        <input type="number" class="form-control editable" value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-4">
                                    <div class="form-group">
                                        <label>سخت</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-8">
                                    <div class="form-group">
                                        <input type="number" class="form-control editable" value="" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>دانش آموزان</label>
                                    <input id="testDataStu" class="form-control" disabled>
                                </div>
                                <div class="form-group" hidden>
                                    <label>دانش آموزان</label>
                                    <ul class="add-std" id="testDataStuEdit"></ul>
                                </div>

                            </div>
                        </div>
                        <div class="row test-data-btn" hidden>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <button id="setChanges" class="btn btn-block btn-success">اعمال تغییر</button>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <button class="btn btn-block btn-delete" id="noChange">انصراف</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <div class="row">
                        <div class="col-md-1 col-sm-1">
                            <i class="fa fa-2x fa-pencil" aria-hidden="true"></i>&nbsp;:
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <button class="btn btn-block btn-delete" id="delete-test">حذف</button>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <button class="btn btn-block btn-success" onclick="change_test()">ایجاد تغییرات</button>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <button onclick="virtual_click('#solved-test')" class="btn btn-block btn-default">مشاهده جزئیات(تمرین های حل شده)</button>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
            <div id="solved-test" class="tab-pane fade">
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-sm-10 col-md-10">
                    <h3 class="black">نمایش تمرین ها</h3>
                    <h4>آمار سال دهم</h4>
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>تمرین:</label>
                                <select class="form-control">
                                    <option selected>تمرین گردآوری داده 3</option>
                                    <option>معیار گرایش به مرکز</option>
                                    <option>معیار پراکندگی 1</option>
                                    <option>معیار پراکندگی 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>فصل</label>
                                <input class="form-control" type="text" value="گردآوری داده" disabled>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-sm-12">
                            <canvas id="test-pie"></canvas>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <canvas id="test-bar" ></canvas>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><i class="fa fa-3x fa-graduation-cap" aria-hidden="true"></i>&nbsp; دانش آموزان کلاس</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 dash-table">
                            <div class="row dash-table-title">
                                <div class="col-md-4">
                                    <h4>دانش آموز</h4>
                                </div>
                                <div class="col-md-3">
                                    <h5>نمره</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5>پیشرفت</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row dash-table-content chapter">
                                <div class="col-md-4">
                                    <p class="black">مینا علیزاده</p>
                                </div>
                                <div class="col-md-3">
                                    <p><span class="stuPoint">8</span>/<span class="totalPoint">10</span></p>
                                </div>
                                <div class="col-md-5">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row dash-table-content chapter">
                                <div class="col-md-4">
                                    <p class="black">زیبا نعمتی</p>
                                </div>
                                <div class="col-md-3">
                                    <p><span class="stuPoint">5</span>/<span class="totalPoint">10</span></p>
                                </div>
                                <div class="col-md-5">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row dash-table-content chapter">
                                <div class="col-md-4">
                                    <p class="black">نیلوفر جزایری</p>
                                </div>
                                <div class="col-md-3">
                                    <p><span class="stuPoint">2</span>/<span class="totalPoint">10</span></p>
                                </div>
                                <div class="col-md-5">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <div id="class-data" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-sm-10 col-md-10">
                        <h3 class="black">اطلاعات کلاس ها</h3>
                        <h4>آمار سال دهم</h4>
                        <br>
                        <form>
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label >انتخاب کلاس:</label>
                                        <select class="form-control" required>
                                            <option selected>دهم 1</option>
                                            <option>دهم 2</option>
                                            <option>دهم 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                        <label>مدرسه:</label>
                                        <input class="form-control" type="text" value="فرزانگان 3 - کرج" disabled>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-1 col-sm-1">
                                <i class="fa fa-2x fa-pencil" aria-hidden="true"></i>&nbsp;:
                            </div>
                            <div class="col-md-3 col-sm-5">
                               <button id="class-delete" class="btn btn-block btn-delete">حذف کلاس</button>
                            </div>
                            <div class="col-md-3 col-sm-6">
                               <button id="class-rename" class="btn btn-block">تغییر نام</button>
                            </div>
                        </div>
                        <br>
                        <form id="rename-form" hidden>
                            <div class="row">
                                <div class="col-md-4 col-sm-12"></div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="className" placeholder="نام قبلی">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">تغییر</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br><br>
                        <div class="row" >
                            <div class="col-md-12 col-sm-12">
                                <canvas id="class-bar"></canvas>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <h4><i class="fa fa-3x fa-graduation-cap" aria-hidden="true"></i>&nbsp; دانش آموزان کلاس</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 dash-table">
                                <div class="row dash-table-title">
                                    <div class="col-md-5">
                                        <h4>نام</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>نمره</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>مهارت</h5>
                                    </div>
                                    <div class="col-md-1">
                                        <h5>حذف</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="student-data-block">
                                    <div class="row dash-table-content chapter">
                                        <div class="col-md-5">
                                            <p class="black">مینا علیزاده</p>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-1">
                                            <button class="btn-delete btn-sm delete-student" title="حذف دانش آموز">
                                                <i class="fa fa-1x fa-user-times" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row dash-table-content dash-section">
                                        <div class="col-md-5">
                                            <p>گردآوری داده</p>
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
                                    <div class="row dash-table-content dash-section">
                                        <div class="col-md-5">
                                            <p>معیارهای گرایش به مرکز</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><span class="stuPoint">5</span>/<span class="totalPoint">10</span></p>
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
                                            <p>معیار پراکندگی</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><span class="stuPoint">2</span>/<span class="totalPoint">8</span></p>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped" role="progressbar">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="student-data-block">
                                    <div class="row dash-table-content chapter">
                                        <div class="col-md-5">
                                            <p class="black">زیبا نعمتی</p>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-1">
                                            <button class="btn-delete btn-sm delete-student" title="حذف دانش آموز">
                                                <i class="fa fa-1x fa-user-times" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row dash-table-content dash-section">
                                        <div class="col-md-5">
                                            <p>گردآوری داده</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><span class="stuPoint">3</span>/<span class="totalPoint">10</span></p>
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
                                            <p>معیارهای گرایش به مرکز</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><span class="stuPoint">9</span>/<span class="totalPoint">10</span></p>
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
                                            <p>معیار پراکندگی</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><span class="stuPoint">7</span>/<span class="totalPoint">8</span></p>
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
                    </div>
                </div>
                <br><br>
            </div>
            <div id="std-data" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-sm-10 col-md-10">
                        <h3 class="black">اطلاعات دانش آموزان</h3>
                        <h4>آمار سال دهم</h4>
                        <br>
                        <div class="row">
                            <div class="col-md-3 col-sm-3 choose-class">
                                <div class="form-group">
                                    <label>کلاس:</label>
                                    <select class="form-control">
                                        <option selected>دهم 1</option>
                                        <option>دهم 2</option>
                                        <option>دهم 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>دانش آموز:</label>
                                    <select class="form-control">
                                        <option selected>زیبا نعمتی</option>
                                        <option>هلیا هاشمی</option>
                                        <option>نیلوفر جزایری</option>
                                        <option>سمن عنایتی</option>
                                        <option>لیلا رضایی</option>
                                        <option>سیما بیات</option>
                                        <option>هنگامه حبیبی</option>
                                        <option>راحیل سروش</option>
                                        <option>مینا علیزاده</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h4><i class="fa fa-2x fa-graduation-cap" aria-hidden="true"></i>&nbsp;اطلاعات دانش آموز</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>نام</label>
                                    <input value="زیبا نعمتی" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>ایمیل</label>
                                    <input value="zib@gmail.com" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
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
                            <div class="col-md-12 col-sm-12 dash-table">
                                <div class="row dash-table-title">
                                    <div class="col-md-5">
                                        <h4>نام</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>نمره</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>مهارت</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="student-data-block">
                                    <div class="row dash-table-content chapter">
                                        <div class="col-md-5">
                                            <p class="black">فصلی</p>
                                        </div>
                                    </div>
                                    <div class="row dash-table-content dash-section">
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
                                            <p>معیارهای گرایش به مرکز</p>
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
                                    <div class="row dash-table-content dash-section">
                                        <div class="col-md-5">
                                            <p>معیار پراکندگی</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><span class="stuPoint">2</span>/<span class="totalPoint">8</span></p>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped" role="progressbar">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="student-data-block">
                                    <div class="row dash-table-content chapter">
                                        <div class="col-md-5">
                                            <p class="black">تمرینی</p>
                                        </div>
                                    </div>
                                    <div class="row dash-table-content dash-section">
                                        <div class="col-md-5">
                                            <p>گردآوری داده 1</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><span class="stuPoint">3</span>/<span class="totalPoint">10</span></p>
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
                                            <p>معیارهای گرایش به مرکز 1</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><span class="stuPoint">9</span>/<span class="totalPoint">10</span></p>
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
                                            <p>تمرین 10</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><span class="stuPoint">7</span>/<span class="totalPoint">8</span></p>
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
                        <br>
                    </div>
                </div>
                <br><br>
            </div>
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
                        <h4><a href="contact.html">ارتباط با ما</a></h4>
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
            <a href="#"><i class="fa fa-paper-plane" title="telegram"></i></a>
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
                            <a href="index.html">صفحه اصلی</a> |
                            <a href="index.html#AboutUs">درباره ی ما</a> |
                            <a href="#">آموزش</a> |
                            <a href="contact.html">ارتباط با ما</a> |
                            <a href="Dashboard.html">داشبورد</a>
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
<!-- chart canvas -->
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- jQuery and jQuery UI are required dependencies. -->
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<!-- The real deal -->
<script src="js/jQuery-ui/tag-it.min.js" type="text/javascript"></script>
<!--chart.js for charts-->
<script src="js/chartjs/Chart.bundle.js"></script>
<script src="js/TeacherDashboard.js"></script>
<!-- custome js just for login page -->
<script src="js/custom.js"></script>
<!-- Google Maps -->
<script src="js/Gmap.JS"></script>
<script src="js/google-map.js"></script>

</body>
</html>