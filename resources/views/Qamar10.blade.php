
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>amar 10</title>
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
@include('navbar',array('active'=>'home'))

<header id="head" class="secondary">
    <div class="container">
        <h1>{{$exercise->name}}-{{$course->name}}</h1>
        <p></p>
    </div>
</header>


<!-- container -->
<section class="container black">

    <div class="row">
        <div class="col-md-2 col-sm-2"></div>
        <!-- Article main content -->
        <div class="col-md-8 col-sm-8 maincontent">
            <br />
            <br />
            <h2>{{$section->name}}</h2>
            <div class="row panel">
                <div class="col-xs-12 activity">
                    <h5>وضعیت فعلی:</h5>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar">
                        </div>
                    </div>
                    <p>سوالات حل شده: <span class="prog-answer"></span>/<span class="prog-total"></span></p>
                    <br>
                </div>
            </div>
            <br>
            <input type="submit" form="test" formaction="/Q/Save" class="btn btn-success center-block" value="ذخیره و بازگشت به داشبورد">
            <hr>
            <ol>
                <?php
                    $count=0;
                ?>
                @foreach($questions as $question)
                <li>
                    <div class="question-box">
                        <p>{{$question['content']}}</p>
                        <input name="t<?php echo $count?>" type="hidden" value="{{$question['content']}}" form="test">
                        @if($question->level == 0)
                            <div class="point">(نمره : <span>&nbsp;1&nbsp;</span>)</div>
                            <img src="{{URL::asset('images/emoticon/32easy.png')}}" title="{{$question['level']}}">
                        @elseif($question->level == 1)
                            <div class="point">(نمره : <span>&nbsp;2&nbsp;</span>)</div>
                            <img src="{{URL::asset('images/emoticon/32normal.png')}}" title="{{$question['level']}}">
                        @else
                            <div class="point">(نمره : <span>&nbsp;3&nbsp;</span>)</div>
                            <img src="{{URL::asset('images/emoticon/32hard.png')}}" title="{{$question['level']}}">
                        @endif
                        <br>

                        <div class="row answer">
                        @foreach($answers as $ans=>$answeri)
                        @if($ans == $question->id)
                        @foreach($answeri as $answer=>$value)
                            <div class="col-md-3">
                                <input name="n<?php echo $count?>" type="hidden" value="{{$question['id']}}" form="test">
                                <input name="a<?php echo $count?>" type="hidden" value="{{$question['answer']}}" form="test">

                                <label class="radio-inline"><input class="right" form="test" type="radio" name="q<?php echo $count?>" value="{{$answer}}">{{$value}} </label>
                            </div>

                        @endforeach
                        @endif
                        @endforeach
                        </div>

                        <br>
                        <button onclick="refresh('q<?php echo $count?>')" class="btn btn-default btn-xs" >پاک کردن جواب</button>
                        <button class="btn btn-warning btn-xs" >اعلام مشکل در سوال.</button>
                    </div>
                    <hr>
                </li>
                    <?php
                            $count++;
                    ?>
                @endforeach
            </ol>
            <br/>
            <form id="test" method="post" action="/Q/Check" >
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input name="number" type="hidden" value="{{$count}}"/>
                <input type="submit" class="btn btn-default" value="تصحیح">
            </form>
        </div>
        <!-- /Article -->
            <div class="col-md-2 col-sm-2"></div>
    </div>
</section>
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
<script src="{{URL::asset('js/QAmar.js')}}"></script>
<script src="{{URL::asset('js/custom.js')}}"></script>
<!-- Google Maps -->
<script src="{{URL::asset('js/Gmap.JS')}}"></script>
<script src="{{URL::asset('js/google-map.js')}}"></script>



</body>
</html>
