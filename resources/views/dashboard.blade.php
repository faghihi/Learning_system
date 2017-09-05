
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
@include('navbar',array('active'=>'dashboard'))
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
                    <h4 class="section-title black">کلاس های فعال :</h4>
                    <ul class="nav nav-pills nav-stacked">
                        <li ><a data-toggle="pill" href="#get-class">گرفتن کلاس جدید</a></li>
                        <li ><a data-toggle="pill" href="#show-class">مشاهده کلاس ها</a></li>
                    </ul>
                    <br>
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
                    <ul class="nav nav-pills nav-stacked" id="co">
                        @if(count($user_course) > 0)
                            @foreach($user_course as $co)
                                @foreach($courses as $course)
                                    @if($co->id == $course->id)
                                        <li><a rel="{{$course->id}}" data-toggle="pill" href="#class1"><span class="course">{{$course->name}}</span>&nbsp;-&nbsp;<span class="teacher">{{$course->teacher_name}}</span></a></li>
                                    @endif
                                @endforeach
                            @endforeach
                        @else
                            فعلا هیچی
                        @endif
                    </ul>
                    <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 activity">
                    <h4 class="section-title black">پیام ها :</h4>
                    <ul class="nav nav-pills nav-stacked">
                        <li ><a data-toggle="pill" href="#new-message">ایجاد پیام</a></li>
                        <li ><a data-toggle="pill" href="#sent-box">مشاهده پیام ها</a></li>
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
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
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
                        <p> تمرین های حل شده:&nbsp;<span class="UrTest">{{$count}}</span>/<span class="GoalTest">{{$info['exam']}}</span></p>
                        <p>سوالات حل شده:&nbsp;<span class="UrQue">{{$answer_count}}</span>/<span class="GoalQue">{{$info['questions']}}</span></p>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <h4 class="black">تمرین جدید:</h4>
                    <div class="row">
                        @if(count($exercises) > 0)
                            @foreach($exercises as $exercise)
                                @if(count($user_exercise) > 0)
                                    @foreach($user->exercises as $use)
                                        @if($exercise->id == $use->id && $use->pivot->status == 0)
                                            <button class="btn course-button btn-md">{{$exercise->name}}</button>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @else
                            تمرینی در سیستم وجود ندارد!
                        @endif
                    </div>
                </div>
                <br>
                <div class="row">
                    <h4 class="black">تمرین در انتظار حل:</h4>
                    <div class="row">
                        @if(count($exercises) > 0)
                            @foreach($exercises as $exercise)
                                @if(count($user_exercise) > 0)
                                    @foreach($user->exercises as $exe)
                                        @if($exe->id == $exercise->id && $exe->pivot->status == 1)
                                            <button class="btn course-button btn-md">{{$exercise->name}}</button>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <br>
                <!--message part-->
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <h3>پیام ها</h3>
                    </div>
                </div>
                @if ($tickets->isEmpty())
                    <p>فعلا پیامی نداری</p>
                @else
                    <div class="row">

                            <div class="col-md-12 col-sm-12 message">
                                <div class="row message-title">
                                    <div class="col-md-2 col-sm-2"><b>دسته</b></div>
                                    <div class="col-md-4 col-sm-4"><b>موضوع</b></div>
                                    <div class="col-md-2 col-sm-2"><b>وضعیت</b></div>
                                    <div class="col-md-4 col-sm-4"><b>آخرین بروزرسانی</b></div>
                                </div>
                                @foreach ($tickets as $ticket)
                                    <div class="row message-part">
                                        @foreach ($categories as $category)
                                            @if ($category->id === $ticket->category_id)
                                                <div class="col-md-2 col-sm-2"><p>{{ $category->name }}</p></div>
                                            @endif
                                        @endforeach
                                        <div class="col-md-4 col-sm-4">
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
                                        <div class="col-md-4 col-sm-4">
                                            {{ $ticket->updated_at }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                    <!--End message part-->
                <br><br>
                @endif
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

            <div id="show-class" class="tab-pane fade">
                <h3 class="black">کلاس های من</h3>
                    @if($user_classes->isEmpty())
                        <p>فعلا در کلاس مشخصی حضور ندارید</p>
                    @else
                        <div class="row">
                            <div class="dash-table">
                                <div class="row dash-table-title">
                                    <div class="col-md-4">
                                        <h4>نام کلاس</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>مدرسه</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>وضعیت</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>حذف</h4>
                                    </div>
                                </div>
                                <hr>
                                @foreach($user->classes as $cl)
                                @foreach($classes as $class)
                                @if($cl->id == $class->id && $cl->pivot->status == 2)
                                    <div class="row dash-table-content chapter">
                                        <div class="col-md-4">
                                            {{$cl->name}}
                                        </div>
                                        <div class="col-md-4">
                                            @foreach($schools as $school)
                                                @if($school->id == $cl->school_id)
                                                    {{$school->name}}
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-md-2">
                                            @if ($cl->pivot->status == 2)
                                                <span class="label label-success">Open</span>
                                            @elseif($cl->pivot->status == 1)
                                                    <span class="label label-danger">pending</span>
                                            @endif
                                        </div>

                                        <form method="post" action="/DeleteClass/{{$cl->id}}">
                                            <input type="hidden" name="_token" value={{ csrf_token()}}>
                                            <div class="col-md-2">
                                                <button class="btn btn-block btn-delete">حذف</button>
                                            </div>
                                        </form>

                                    </div>
                                <hr>
                                @endif
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                    @endif
            </div>
            <!-- create a ticket -->
            <div id="new-message" class="tab-pane fade">
                <h3 class="black">پیام جدید :</h3>
                <p>میتوانید یک پیام جدید ایجاد کنید.</p>
                <hr>
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif
                @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ url('/new_ticket') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">موضوع</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-md-2 control-label">دسته</label>
                        <div class="col-md-6">
                            <select id="category" type="category" class="form-control" name="category">
                                <option value="">...</option>
                                    @if(count($categories) > 0)
                                        @foreach ($categories as $category)
                						    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="priority" class="col-md-2 control-label">اولویت</label>
                        <div class="col-md-6">
                            <select id="priority" type="" class="form-control" name="priority">
                                <option value="">...</option>
                                <option value="low">کم</option>
                                <option value="medium">متوسط</option>
                                <option value="high">زیاد</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-md-2 control-label">متن پیام</label>
                        <div class="col-md-6">
                            <textarea rows="6" id="message" class="form-control" name="message"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-ticket"></i> ایجاد پیام
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="sent-box" class="tab-pane fade">
                <h3 class="black">پیام های من</h3>
                @if ($tickets->isEmpty())
                    <p>تا کنون پیامی ایجاد نکردید.</p>
                @else
                    <div class="row">
                        <div class="dash-table">
                            <div class="row dash-table-title">
                                <div class="col-md-3">
                                    <h4>نام دسته</h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>موضوع</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>وضعیت</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>آخرین به روزرسانی</h4>
                                </div>
                            </div>
                            <hr>
                            @foreach($tickets as $ticket)
                                <div class="row dash-table-content chapter">
                                    <div class="col-md-3">
                                    @foreach($categories as $cat)
                                        @if ($cat->id === $ticket->category_id)
                                            <p>{{$cat->name}}</p>
                                        @endif
                                    @endforeach
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        @if ($ticket->status === 'Open')
                                            <span class="label label-success">{{ $ticket->status }}</span>
                                        @else
                                        	<span class="label label-danger">{{ $ticket->status }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        {{ $ticket->updated_at }}
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div id="new-test" class="tab-pane fade">
                <h3 class="black">تمرین جدید</h3>
                <p>برای شروع به حل تمرین مورد نظر روی گزینه ی شروع کلیک کنید.</p>
                <a  data-toggle="modal" data-target="#test-modal" class="btn btn-default" >تعریف تمرین جدید</a>

                <div id="test-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                                <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <br/>
                                <h4 class="modal-title">تعریف تمرین :</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-1 col-sm-1"></div>
                                    <div class="col-sm-10 col-md-10">
                                        <form action="/CreateStuEx"  method="post">
                                            <div class="row">
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
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label >فصل:</label>
                                                        <select id="choose_section" name="section" class="form-control"required></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 col-sm-5">
                                                    <div class="form-group">
                                                        <label>تعداد سوالات آسان:</label>
                                                        <input name="easy" class="form-control" type="number">
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-sm-5">
                                                    <div class="form-group">
                                                        <label>تعداد سوالات متوسط:</label>
                                                        <input name="medium" class="form-control" type="number">
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-sm-5">
                                                    <div class="form-group">
                                                        <label>تعداد سوالات سخت:</label>
                                                        <input name="hard" class="form-control" type="number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>نام تمرین:</label>
                                                        <input name="nameEx" class="form-control" placeholder="تمرین">
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

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">ببندش!</button>
                            </div>
                        </div>
                    </div>
                </div>

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
                        @if(count($exercises) > 0)
                            @foreach($exercises as $exercise)
                                @if(count($user_exercise) > 0)
                                @foreach($user->exercises as $use)
                                    @if($exercise->id == $use->id && $use->pivot->status == 0)
                                        <div class="row dash-table-content chapter">
                                            <div class="col-md-4">
                                                <p>{{$exercise->name}}</p>
                                            </div>
                                            <div class="col-md-4">
                                                @if(count($user_course) > 0)
                                                    @foreach($user->exercises as $co)
                                                        @foreach($courses as $course)
                                                            @if($course->id == $co->course_id)
                                                                <p></p>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="col-md-2">
                                                <a href="/exercise/{{$exercise->id}}"><button class="btn btn-success btn-sm">شروع</button></a>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="/delete/{{$exercise->id}}"><button class="btn btn-delete btn-sm">حذف</button></a>
                                            </div>
                                        </div>
                                        <br>

                                    @endif
                                @endforeach
                                @endif
                            @endforeach
                        @else
                            <p>فعلا تمرینی در سیستم وجود ندارد</p>
                        @endif
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
                        @if(count($exercises) > 0)
                            @foreach($exercises as $exercise)
                            @if(count($user_exercise) > 0)
                            @foreach($user->exercises as $exe)
                            @if($exe->id == $exercise->id && $exe->pivot->status == 1)
                            <div class="row dash-table-content chapter">
                                <div class="col-md-4">
                                    <p>{{$exercise->name}}</p>
                                </div>
                                <div class="col-md-4">
                                    @foreach($courses as $course)
                                        @if($course->id == $exe->course_id)
                                            <p>{{$course->teacher_name}}</p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-2">
                                    <a href="/exercise/{{$exercise->id}}"><button class="btn btn-success btn-sm">ادامه</button></a>
                                </div>
                                <div class="col-md-2">
                                    <a href="/delete/{{$exercise->id}}"><button class="btn btn-delete btn-sm">حذف</button></a>
                                </div>
                            </div>
                            <br>

                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        @else
                                برو حال کن ، تمرین نداری
                        @endif
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
                        @if(count($exercises) > 0)
                            @foreach($exercises as $exercise)
                            @if(count($user_exercise) > 0)
                            @foreach($user->exercises as $exe)
                            @if($exe->id == $exercise->id && $exe->pivot->status == 2)
                        <div class="row dash-table-content chapter">
                            <div class="col-md-3">
                                <p class="black">{{$exercise->name}}</p>
                            </div>
                            <div class="col-md-3">
                                @foreach($courses as $course)
                                    @if($course->id == $exe->course_id)
                                        <p>{{$course->teacher_name}}</p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-2">
                                @foreach($user_scores as $score)
                                    @if($score->exercise_id == $exercise->id)
                                        <p><span class="stuPoint">{{$score->st_point}}</span>/<span class="totalPoint">{{$score->t_point}}</span></p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" style="width:'{{$score->percent}}%'">
                                        {{$score->percent}}%
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div id="get-test" class="tab-pane fade">
                <h3 class="black">گرفتن تمرین</h3>
                <br>
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif
                @if(session()->has('msg'))
                    <div class="alert alert-danger">
                        {{ session()->get('msg') }}
                    </div>
                @endif
                <br>
                <h4>گرفتن تمرینی که آموزگار تعریف کرده است</h4><br>
                <p>برای گرفتن تمرینی که آموزگارتان تعریف کرده است نام تمرین و پسورد آن را از آموزگارتان بگیرید و آن را در قسمت زیر وارد کنید.</p>
                <br>
                <form class="form-inline" action="/giveEx" method="post">
                    <input type="hidden" name="_token" value={{ csrf_token()}}>
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

            <div id="get-class" class="tab-pane fade">
                <h3 class="black">گرفتن کلاس</h3>
                <br>
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif
                @if(session()->has('msg'))
                    <div class="alert alert-danger">
                        {{ session()->get('msg') }}
                    </div>
                @endif
                <br>
                <h4>گرفتن کلاسی که آموزگار معرفی کرده است</h4><br>
                <br>
                <form class="form-inline" action="/giveCl" method="post">
                    <input type="hidden" name="_token" value={{ csrf_token()}}>
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                                <div class="form-group">
                                    <label>نام کلاس :</label>
                                    <input class="form-control" name="className">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>کد :</label>
                                    <input class="form-control" name="classPass">
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
            </div>

            <div id="class1" class="tab-pane fade">

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
{{--<script src="{{URL::asset('js/Gmap.JS')}}"></script>--}}
{{--<script src="{{URL::asset('js/google-map.js')}}"></script>--}}

</body>
</html>
