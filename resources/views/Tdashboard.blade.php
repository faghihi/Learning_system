<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        <script src="ASCIIMathML.js"></script>
</head>
<body>

@include('navbar',array('active'=>'home'))

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
                <li><a data-toggle="pill" href="#add-course">ایجاد درس جدید</a></li>
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
                @if ($tickets->isEmpty())
                    <p>فعلا پیامی نداری</p>
                @else
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-md-10 col-sm-10 message">
                        <div class="row message-title">
                            <div class="col-md-2 col-sm-2"><b>دسته</b></div>
                            <div class="col-md-3 col-sm-3"><b>موضوع</b></div>
                            <div class="col-md-2 col-sm-2"><b>وضعیت</b></div>
                            <div class="col-md-3 col-sm-3"><b>آخرین بروزرسانی</b></div>
                            <div class="col-md-2 col-sm-2"><b>عملیات</b></div>
                        </div>
                        @foreach ($tickets as $ticket)
                            <div class="row message-part">
                                @foreach ($categories as $category)
                                    @if ($category->id === $ticket->category_id)
                                        <div class="col-md-2 col-sm-2"><p>{{ $category->name }}</p></div>
                                    @endif
                                @endforeach
                                <div class="col-md-3 col-sm-3">
                                    <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                        #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    @if ($ticket->status === 'Open')
                                        <span class="label label-success">{{ $ticket->status }}</span>
                                    @else
                                    	<span class="label label-danger">{{ $ticket->status }}</span>
                                    @endif
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    {{ $ticket->updated_at }}
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <form action="{{ url('close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                        {!! csrf_field() !!}
                                    	<button type="submit" class="btn btn-default">Close</button>
                                    </form>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--End message part-->
                <br><br>
                @endif
            </div>
            <div id="add-question" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-sm-10 col-md-10">
                        <h3 class="black">اضافه کردن سوال</h3>
                        <br>
                        <form action="/CreateQuestion" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value={{ csrf_token() }}>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="chapter">درس :</label>
                                        <select name="course" class="form-control" id="ch_course" required>
                                            <option selected>...</option>
                                            @if(count($courses) > 0)
                                                @foreach($courses as $course)
                                                    <option value={{$course->id}}>{{$course->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="chapter">فصل:</label>
                                        <select name="section" class="form-control" id="choose_chapter" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="difficulty">میزان سختی سوال:</label>
                                        <select name="difficulty" class="form-control " id="difficulty" required>
                                            <option selected>...</option>
                                            <option value="0">آسان (1نمره)</option>
                                            <option value="1">متوسط (2نمره)</option>
                                            <option value="2">سخت (3نمره)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>صورت سوال:</label>
                                <p>برای اطلاعات بیشتر درباره ی نحوه ی وارد کردن عکس، فرمول های ریاضی و یا نمودارها در سوالات به قسمت <a href="/guide">راهنمایی</a> مراجعه کنید.</p>
                                <textarea name="question" rows="4" class="form-control" required>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>گزینه ها:</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input name="gozine1" class="form-control " placeholder="گزینه 1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input name="gozine2" class="form-control " placeholder="گزینه 2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input name="gozine3" class="form-control " placeholder="گزینه 3">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input name="gozine4" class="form-control " placeholder="گزینه 4">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>گزینه درست:</label>
                                        <input name="answer" class="form-control " type="number" placeholder="عدد گزینه صحیح">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>راه حل(اختیاری):</label>
                                <textarea name="solution" rows="4" class="form-control" required>
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

                        <br>
                        <form action="/CreateClass" method="post">
                            <input type="hidden" name="_token" value={{ csrf_token() }}>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>نام کلاس:</label>
                                        <input name="classname" type="text" class="form-control" placeholder="کلاس">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>نام مدرسه:</label>
                                        <select id="schoolID" name="school" class="form-control" required>
                                            <option selected value="0">...</option>
                                            @foreach($schools as $school)
                                                <option value = {{$school->id}}>{{$school->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>کد عضویت در درس :</label><span id="error_code" style="margin-right: 20px; color: red;display: none;">کد نا قبلا استفاده شده است.</span>
                                        <input id="join_code" name="join_code" class="form-control" type="text" placeholder="کد عضویت در درس">
                                        {{--<select name="students[]" class="add-std" id="whole-student" multiple>--}}

                                        {{--</select>--}}
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
            <div id="add-course" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-sm-10 col-md-10">
                        <h3 class="black">اضافه کردن درس</h3>
                        <br>
                        <form action="/CreateCourse" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value={{ csrf_token() }}>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>نام درس :</label>
                                        <input name="coursename" type="text" class="form-control" placeholder= "درس">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>مقطع :</label>
                                        <select name="grade" class="form-control">
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>تصویر درس :</label>
                                        <input name="image" type="file" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>فصل :</label>
                                        <input name="section" type="text" class="form-control" placeholder="فصل">
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
                        <br>
                        <form action="/CreateEx"  method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>کلاس:</label>
                                        <select id="s_class" name="class" class="form-control" required>
                                            <option value=""></option>
                                            @if(count($classes) > 0)
                                                @foreach($classes as $class)
                                                    <option value={{$class->id}}>{{$class->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>درس:</label>
                                        <select id="choose_course" name="course" class="form-control" required>
                                            <option value=""></option>
                                            @if(count($courses) > 0)
                                                @foreach($courses as $course)
                                                    <option value={{$course->id}}>{{$course->name}}-{{$course->grade}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label >فصل:</label>
                                <select id="choose_section" name="section" class="form-control"required>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label>تعداد سوالات آسان:</label>
                                        <input name="easy" class="form-control" type="number">
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <div class="form-group">
                                        <label>تعداد</label>
                                        <input id="easy_no" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label>تعداد سوالات متوسط:</label>
                                        <input name="medium" class="form-control" type="number">
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <div class="form-group">
                                        <label>تعداد</label>
                                        <input id="medium_no" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label>تعداد سوالات سخت:</label>
                                        <input name="hard" class="form-control" type="number">
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <div class="form-group">
                                        <label>تعداد</label>
                                        <input id="hard_no" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>نام تمرین:</label>
                                        <input name="nameEx" class="form-control" placeholder="تمرین">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>رمز:</label>
                                        <input name="code" class="form-control" placeholder="برای ورود دانش آموزان به تمرین">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>تاریخ شروع تمرین:</label>
                                        <input name="startdate" class="form-control" type="date" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>تاریخ پایان تمرین:</label>
                                        <input name="enddate" class="form-control" type="date" >
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value={{ csrf_token() }}>
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
                            @if(count($exercises) > 0)
                            @foreach($exercises as $exercise)
                            <div class="row dash-table-content chapter">
                                <div class="col-md-3">
                                    <button class="btn btn-default which_ex" value="{{$exercise->id}}">{{$exercise->name}}</button>
                                </div>
                                <div class="col-md-3">
                                @if(count($class_exercise) > 0)
                                    @foreach($class_exercise as $cl_ex)
                                        @if($cl_ex->name == $exercise->name)
                                            @foreach($classes as $class)
                                                @if($cl_ex->class_id == $class->id)
                                                    <p>{{$class->name}}</p>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                                </div>
                                <div class="col-md-3">
                                        @foreach($schools as $school)
                                            @if($school->id == 1)
                                                <p>{{$school->name}}</p>
                                            @endif
                                        @endforeach
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
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <br>
                    <form>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>نام</label>
                                    <input id="ex_name" type="text" class="form-control editable" value="" >
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>رمز</label>
                                    <input id="ex_code" type="text" class="form-control" value="" disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>درس</label>
                                    <input id="ex_course" type="text" class="form-control" value="" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>فصل</label>
                                    <input id="ex_section" type="text" class="form-control" value="" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>تاریخ شروع</label>
                                    <input id="ex_start" type="date" class="form-control editable" value="" disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>تاریخ پایان</label>
                                    <input id="ex_end" type="date" class="form-control editable" value="" disabled>
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
                                        <input id="ex_easy" type="number" class="form-control editable" value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-4">
                                    <div class="form-group">
                                        <label>متوسط</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-8">
                                    <div class="form-group">
                                        <input id="ex_medium" type="number" class="form-control editable" value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-4">
                                    <div class="form-group">
                                        <label>سخت</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-8">
                                    <div class="form-group">
                                        <input id="ex_hard" type="number" class="form-control editable" value="" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>دانش آموزان</label>
                                    <input id="testDataStu" class="form-control" value="" disabled>
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
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>تمرین:</label>
                                <select id="selectExercise" class="form-control">
                                    <option selected>...</option>
                                    @foreach($exercises as $exercise)
                                        <option value="{{$exercise->id}}">{{$exercise->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>فصل</label>
                                <input id="sect" class="form-control" type="text" value="" disabled>
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
                            </div>
                            <hr>
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
                        <br>
                        <form >
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>مدرسه:</label>
                                            <select id="selectSchool" name="selectSchool" class="form-control">
                                            <option value=""></option>
                                            @if(count($schools) > 0)
                                                @foreach($schools as $school)
                                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                                @endforeach
                                            @endif
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                        <label >انتخاب کلاس:</label>
                                        <select id="chooseClass" name="chooseClass" class="form-control">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-1 col-sm-1">
                                <i class="fa fa-2x fa-pencil" aria-hidden="true"></i>&nbsp;:
                            </div>
                            @if(count($classes) > 0)
                            <form method="post" action="/DeleteClass/{{$class->id}}">
                                <input type="hidden" name="_token" value={{ csrf_token()}}>
                            <div class="col-md-3 col-sm-5">
                               <button id="class-delete" class="btn btn-block btn-delete">حذف کلاس</button>
                            </div>
                            </form>
                            @endif
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
                                <div id="stud_info" class="student-data-block">
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
                        <br>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 choose-class">
                                <div class="form-group">
                                    <label>کلاس:</label>
                                    <select id="ch_class" class="form-control">
                                        <option selected>...</option>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>دانش آموز:</label>
                                    <select id="selectStudent" class="form-control">
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
                                <label>نام</label>
                                <input id="stu_name" class="form-control" disabled>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label>ایمیل</label>
                                <input id="stu_email" class="form-control" disabled>
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
                                            <p class="black">نام تمرین</p>
                                        </div>
                                    </div>
                                    <div id="exercise_info" class="row dash-table-content">
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
{{--<script src="js/Gmap.JS"></script>--}}
{{--<script src="js/google-map.js"></script>--}}

<!--when choose a school , show student's of the school-->
<script type="text/javascript">
     $('#schoolID').on('change', function() {
            var id = $("#schoolID option:selected").val();
                $.ajax({
                    url: '/createClass/ajax/'+id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#whole-student').empty();
                        $.each(data, function(key, value) {
                            $('#whole-student').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
     });
</script>

<!--for exercise creation -->
<script type="text/javascript">
     $('#s_class').on('change',function(){
        alert('با کلیک بروی هر فصل تعداد سوالات موجود در سیستم برای آن موضوع نمایش داده می شود');
     });
     $('#choose_course').on('change', function() {
            var id = $("#choose_course option:selected").val();

                $.ajax({
                    url: '/section/ajax/'+id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#choose_section').empty();
                        $.each(data, function(key, value) {
                            $('#choose_section').append('<option value="'+ key +'">'+ value.name +'</option>');
                            $('#choose_section').on('click' , function(){
                                var sec = $('#choose_section option:selected').val();
                                if(key == sec){
                                    $('#easy_no').val(value.easy);
                                    $('#medium_no').val(value.medium);
                                    $('#hard_no').val(value.hard);
                                }
                            });

                        });
                    }
                });

      });
</script>

<script type="text/javascript">
     $('#ch_course').on('change', function() {
            var id = $("#ch_course option:selected").val();

                $.ajax({
                    url: '/question/ajax/'+id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#choose_chapter').empty();
                        $.each(data, function(key, value) {

                                $('#choose_chapter').append('<option value="'+ key +'">'+ value +'</option>');

                        });
                    }
                });
      });
     $("#join_code").on('change',function(){
         var code=$("#join_code").val();
         console.log(code);
         $.ajax({
             "async": false,
             "crossDomain": true,
             "url": "http://localhost:8000/checkcode",
             "method": "POST",
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             "data":{
                 "code":code
             },
             success:function (response) {
                 console.log(response);
                 if(response!=1){
                    $("#error_code").show()
                 }
                 else{
                     $("#error_code").hide()
                 }
             },
             error:function (xhr, ajaxOptions, thrownError){
                  alert('error');

             }
         });
     })
</script>

{{--<script>--}}
    {{--CKEDITOR.config.image_previewText = 'در اینجا می توانید پیش نمایش عکس را مشاهده کنید';--}}
    {{--CKEDITOR.config.contentsLangDirection = 'rtl';--}}
    {{--CKEDITOR.replace( 'editor1' );--}}
    {{--CKEDITOR.config.mathJaxLib = '//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML';--}}
{{--</script>--}}
</body>
</html>