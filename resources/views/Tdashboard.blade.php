<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>داشبورد</title>
        <link rel="shortcut icon" href="images/favicon.png">
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
        <style>
            .truncate {
                display:inline-block;
                width: 200px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        </style>
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
                <li><a data-toggle="pill" href="#show-question">سوالات طرح شده</a></li>
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
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <br>
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
                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>
                        <div class="col-md-10 col-sm-10">
                            <hr>
                            <p>فعلا پیامی نداری</p>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>
                        <div class="col-md-10 col-sm-10">
                            <hr>
                            <div class="col-md-4 col-sm-4">
                                <p id="search"></p>
                            </div>
                        </div>
                    </div>
                <br>
                <div class="row list">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-md-10 col-sm-10 message">
                        <div class="row message-title">
                            <div class="col-md-3 col-sm-3"><b>دسته</b></div>
                            <div class="col-md-4 col-sm-4"><b>موضوع</b></div>
                            <div class="col-md-1 col-sm-1"><b>وضعیت</b></div>
                            <div class="col-md-1 col-sm-1"></div>
                            <div class="col-md-2 col-sm-2"><b>عملیات</b></div>
                        </div>
                        @foreach ($tickets as $ticket)
                            <div class="row message-part entry">
                                @foreach ($categories as $category)
                                    @if ($category->id == $ticket->category_id)
                                        <div class="col-md-3 col-sm-3 category"><p>{{ $category->name }}</p></div>
                                    @endif
                                @endforeach
                                <div class="col-md-4 col-sm-4">
                                    <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                        #{{ $ticket->title }}
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    @if ($ticket->status === 'Open')
                                        <span class="label label-success">فعال</span>
                                    @elseif($ticket->status == 'Pending')
                                        <span class="label label-warning">منتظر تایید</span>
                                    @else
                                    	<span class="label label-danger">بسته</span>
                                    @endif
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    @if($ticket->category_id == 4)
                                        <form action="{{ url('accept_ticket/' . $ticket->ticket_id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-default btn-sm" >تایید</button>
                                        </form>
                                    @else
                                        <form action="{{ url('close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                            {!! csrf_field() !!}
                                    	    <button type="submit" class="btn btn-default btn-sm" >بستن</button>
                                        </form>
                                    @endif
                                </div>
                                <form method="get" action="/DeleteTicket/{{$ticket->id}}">
                                    <input type="hidden" name="_token" value={{ csrf_token()}}>
                                    <div class="col-md-2 col-sm-2">
                                        <button class="btn btn-sm btn-delete">حذف</button>
                                    </div>
                                </form>
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
                        @if($errors->CreateQ->any())
                            <h4 style="color:red">{{$errors->CreateQ->first()}}</h4>
                        @endif
                        @if(session()->has('error'))
                            <h4 style="color:red">{{ session()->get('error') }}</h4>
                        @endif
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
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>تصویر سوال(ختیاری) :</label>
                                        <input name="Q_image" type="file" class="form-control">
                                    </div>
                                </div>
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
            <div id="show-question" class="tab-pane fade">
                <h3 class="black">سوال های من:</h3>
                @if($user_questions->isEmpty())
                    <p>فعلا سوال طرح نکردید</p>
                @else
                    <div class="row">
                        <div class="dash-table">
                            <div class="row dash-table-title">
                                <div class="col-md-5">
                                    <h4>#</h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>درس</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>ویرایش</h4>
                                </div>
                            </div>
                            <hr>
                            @foreach($user_questions as $question)
                                <div class="row dash-table-content chapter">
                                    <div class="col-md-5">
                                        <span class="truncate">{{$question->content}}</span>
                                    </div>
                                    <div class="col-md-4">
                                        @foreach($courses as $course)
                                            @if($course->id == $question->course_id)
                                                {{$course->name}}
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-default whichQ" value="{{$question->id}}" >ویرایش</button>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div id="add-class" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-sm-10 col-md-10">
                        <h3 class="black">اضافه کردن کلاس</h3>
                        <br>
                        @if($errors->create_class->any())
                            <h4 style="color:red">{{$errors->create_class->first()}}</h4>
                        @endif
                        @if(session()->has('error'))
                            <h4 style="color:red">{{ session()->get('error') }}</h4>
                        @endif
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
                                        <select name="school" class="form-control" required>
                                            <option selected value="0">...</option>
                                            @foreach($schools as $school)
                                                <option value = {{$school->id}}>{{$school->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="row">--}}
                                {{--<div class="col-md-12 col-sm-12">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label>کد عضویت در درس :</label><span id="error_code" style="margin-right: 20px; color: red;display: none;">کد نا قبلا استفاده شده است.</span>--}}
                                        {{--<input id="join_code" name="join_code" class="form-control" type="text" placeholder="کد عضویت در درس">--}}
                                        {{--<select name="students[]" class="add-std" id="whole-student" multiple>--}}

                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
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
                        @if($errors->create_course->any())
                            <h4 style="color:red">{{$errors->create_course->first()}}</h4>
                        @endif
                        @if(session()->has('error'))
                            <h4 style="color:red">{{ session()->get('error') }}</h4>
                        @endif
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
                        <h3 class="black">تعریف تمرین</h3><span id="error_easy" style="margin-right: 20px; color: red;display: none;">این تعداد سوال آسان در سیستم موجود نیست.</span>
                        <span id="error_medium" style="margin-right: 20px; color: red;display: none;">این تعداد سوال متوسط در سیستم موجود نیست.</span>
                        <span id="error_hard" style="margin-right: 20px; color: red;display: none;">این تعداد سوال سخت در سیستم موجود نیست.</span>
                        <br>
                        @if($errors->CreateEx->any())
                            <h4 style="color:red">{{$errors->CreateEx->first()}}</h4>
                        @endif
                        @if(session()->has('error'))
                            <h4 style="color:red">{{ session()->get('error') }}</h4>
                        @endif
                        <br>
                        <form id="my_form" action="/CreateEx"  method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>کلاس:</label>
                                        <select id="choose-cl" name="class" class="form-control" required>
                                            <option value=""></option>
                                            @if(count($user_classes) > 0)
                                                @foreach($user_classes as $class)
                                                    <option value={{$class->id}}>{{$class->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label><br>
                                        <input id="all" type="checkbox" name="all"> تمرین برای همه
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label><br>
                                        <input id="myQ" type="checkbox" name="myQ" /> تمرین از سوال های خودم
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>درس:</label>
                                        <select id="choose_course" name="course" class="form-control" required>
                                            <option value=""></option>
                                            @if(count($courses) > 0)
                                                @foreach($courses as $course)
                                                    @foreach($grades as $grade)
                                                        @if($grade->id == $course->grade_id)
                                                            <option value={{$course->id}}>{{$course->name}}-{{$grade->name}}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label >فصل:</label>
                                        <select id="choose_section" name="section" class="form-control"required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>تعداد سوالات آسان:</label>
                                        <input id="easy_num" name="easy" class="form-control" type="number">
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>تعداد سوالات متوسط:</label>
                                        <input id="medium_num" name="medium" class="form-control" type="number">
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label>تعداد سوالات سخت:</label>
                                        <input id="hard_num" name="hard" class="form-control" type="number">
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
                                {{--<div class="col-md-6 col-sm-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label>رمز:</label>--}}
                                        {{--<input id="code-cl" name="code" class="form-control" placeholder="برای ورود دانش آموزان به تمرین">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
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
                                <div class="col-md-6">
                                    <h4>نام تمرین</h4>
                                </div>
                                <div class="col-md-3">
                                    <h5>کلاس</h5>
                                </div>
                                <div class="col-md-3">
                                    <h5>مدرسه</h5>
                                </div>
                            </div>
                            <hr>
                            @if(count($user_exercises) > 0)
                            @foreach($user_exercises as $exercise)
                            {{--@if($exercise->code != 0)--}}
                            <div class="row dash-table-content chapter">
                                <div class="col-md-6">
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
                                    @if(count($class_exercise) > 0)
                                        @foreach($class_exercise as $cl_ex)
                                            @if($cl_ex->name == $exercise->name)
                                                @foreach($classes as $class)
                                                    @if($cl_ex->class_id == $class->id)
                                                        @if($class->school_id != 0)
                                                            @foreach($schools as $school)
                                                                @if($class->school_id == $school->id)
                                                                    <p>{{$school->name}}</p>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            .....
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <hr>
                            {{--@endif--}}
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <br>
                    <div id="ex-info"></div>
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
                                    @foreach($user_exercises as $exercise)
                                        {{--@if($exercise->code != 0)--}}
                                            <option value="{{$exercise->id}}">{{$exercise->name}}</option>
                                        {{--@endif--}}
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
                        @if($user_classes->isEmpty())
                            فعلا کلاسی ایجاد نکرده اید.
                        @else
                        <br>
                        <form >
                            <div class="row">
                                {{--<div class="col-md-4 col-sm-12">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label>مدرسه:</label>--}}
                                            {{--<select id="selectSchool" name="selectSchool" class="form-control">--}}
                                            {{--<option value=""></option>--}}
                                            {{--@if(count($schools) > 0)--}}
                                                {{--@foreach($schools as $school)--}}
                                                    {{--<option value="{{$school->id}}">{{$school->name}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}
                                            {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label >انتخاب کلاس:</label>
                                        <select id="chooseClass" name="chooseClass" class="form-control">
                                            <option value=""></option>
                                            @if(count($user_classes) > 0)
                                                @foreach($user_classes as $uc)
                                                    <option value="{{$uc->id}}">{{$uc->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="class_delete" class="row">

                        </div>
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
                        @endif
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
                                        @foreach($user_classes as $class)
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
    </div>
</div>
<!-- /container -->

@include('footer')
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
<script>
    $('.btn-delete').on('click',function(){
        var r = confirm("مطمئنی می خوای حذفش کنی؟");
        if (r == true) {

        } else {
            return false;
        }
    });
</script>
<script>
	(function ($) {
//	  jQuery.expr[':'].Contains = function(a,i,m){
//		  return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
//	  };

	  function listFilter(search, list) {
		var form = $("<form>").attr({"class":"filterform","action":"#"}),
			input = $("<input>").attr({"class":"form-control search","type":"text","placeholder":"جستجو"});
		$(form).append(input).appendTo(search);

		$('.search')
		  .change( function () {
			var filter = $(this).val();

			if(filter) {
			  $(list).find(".category:not(:Contains(" + filter + "))").parent().slideUp();
			  $(list).find(".category:Contains(" + filter + ")").parent().slideDown();
			} else {
			  $(list).find(".entry").slideDown();
			}
			return false;
		  })
		.keyup( function () {
			$(this).change();
		});
	  }

	  $(function () {
		listFilter($("#search"), $(".list"));
	  });
	}(jQuery));
</script>

<script>

$('.whichQ').on('click',function(){
    var ID = $(this).val();
    console.log(ID);
    $.ajax({
        url: '/Q/ajax/'+ID,
        type: "GET",
        dataType: "json",

        success:function(data) {

            $('#show-question').empty();

            $('#show-question').append(
                '<div class="row"><div class="col-sm-10 col-md-10"><h3 class="black">اضافه کردن سوال</h3><br>'+
                "<form method=\"get\" action=\"/EditQuestion/"+ID+"\">"+
                '<input type="hidden" name="csrf-token" value="'+$('meta[name="csrf-token"]').attr('content')+'">'+
                '<div class="row"><div class="col-md-4 col-sm-4"><div class="form-group"><label for="chapter">درس :</label>'+
                '<select name="course" class="form-control" id="cha_course" required>'+
                '<option value='+data.course_id+' selected>'+data.course+'</option>'+
                '</select></div></div><div class="col-md-4 col-sm-4"><div class="form-group"><label for="chapter">فصل:</label>'+
                '<select name="section" class="form-control" id="ch_chapter" required><option value='+data.section_id+'>'+data.section+'</option>'+
                '</select></div></div><div class="col-md-4 col-sm-4"><div class="form-group"><label for="difficulty">میزان سختی سوال:</label><select name="difficulty" class="form-control " id="difficulty" required>'+
                '<option value="0">آسان (1نمره)</option><option value="1">متوسط (2نمره)</option><option value="2">سخت (3نمره)</option></select></div></div></div>'+
                '<div class="form-group"><label>صورت سوال:</label><textarea name="question" rows="4" class="form-control" required>'+data.content+'</textarea></div>'+
                ' <div class="form-group"><label>گزینه ها:</label></div><div class="row"><div class="col-md-6 col-sm-12"><div class="form-group">'+
                '<input name="gozine1" class="form-control " value='+data.gozine1+'></div></div><div class="col-md-6 col-sm-12"><div class="form-group">'+
                '<input name="gozine2" class="form-control " value='+data.gozine2+'> </div></div></div><div class="row"><div class="col-md-6 col-sm-12"><div class="form-group">'+
                '<input name="gozine3" class="form-control " value='+data.gozine3+'> </div></div><div class="col-md-6 col-sm-12"><div class="form-group">'+
                '<input name="gozine4" class="form-control " value='+data.gozine4+'> </div></div></div><div class="row"><div class="col-md-6 col-sm-12">'+
                '<div class="form-group"><label>گزینه درست:</label><input name="answer" class="form-control " type="number" value='+data.gozine_correct+'> </div></div></div>'+
                '<div class="form-group"><label>راه حل(اختیاری):</label><textarea name="solution" rows="4" class="form-control" required>'+data.solution+'</textarea></div><div class="form-group">'+
                '<button id="khar" type="submit" class="btn btn-default btn-lg">ویرایش</button></div></form></div></div>');

                $.each(data.courses, function(key,value){
                    if(value == data.course){

                    }else {
                        $('#cha_course').append('<option value=' + key + '>' + value + '</option>')
                    }
                });

                $.each(data.sections, function(key,value){
                    if(value == data.section){

                    }else {
                        $('#ch_chapter').append('<option value=' + key + '>' + value + '</option>')
                    }
                });


        }
    });
});

</script>
</body>
</html>