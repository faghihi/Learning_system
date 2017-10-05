
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$course->name}}</title>
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
            <hr>
            <ol>
                <?php
                    $count=0;
                ?>
                @foreach($questions as $question)
                <li>
                    <div class="question-box">
                        <p>{{$question['content']}}</p>
                        <div>
                            <img src="/uploads/{{$question->image}}">
                        </div>
                        <input name="t<?php echo $count?>" data-questionid="{{$question->id}}" type="hidden" value="{{$question['content']}}" form="test">
                        @if($question->level == 0)
                            <div class="point">(نمره : <span>&nbsp;1&nbsp;</span>)</div>
                            <img src='/images/emoticon/32easy.png' title="{{$question['level']}}">
                        @elseif($question->level == 1)
                            <div class="point">(نمره : <span>&nbsp;2&nbsp;</span>)</div>
                            <img src='/images/emoticon/32normal.png' title="{{$question['level']}}">
                        @else
                            <div class="point">(نمره : <span>&nbsp;3&nbsp;</span>)</div>
                            <img src='/images/emoticon/32hard.png' title="{{$question['level']}}">
                        @endif
                        <br>

                        <div class="row answer">
                        @foreach($answers as $ans=>$answeri)
                            @if($ans == $question->id)
                                @foreach($answeri as $answer=>$value)
                                    <div class="col-md-3">
                                        <input name="n<?php echo $count?>" type="hidden" value="{{$question['id']}}" form="test">
                                        <input name="a<?php echo $count?>" type="hidden" value="{{$question['answer']}}" form="test">
                                        @if($answer == $question['answer'])
                                            <label class="radio-inline">
                                                <input class="right" form="test" type="radio" name="q<?php echo $count?>" value="{{$answer}}" checked>{{$value}}
                                            </label>
                                        @else
                                            <label class="radio-inline">
                                                <input class="right" form="test" type="radio" name="q<?php echo $count?>" value="{{$answer}}" disabled>{{$value}}
                                            </label>
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                        </div>
                        <br>
                        <button data-toggle="modal" data-target="#problem-modal" class="btn btn-warning btn-xs btn-problem" >اعلام مشکل در سوال.</button>
                        <div id="problem-modal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                            <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <br/>
                                        <h4 class="modal-title">اعلام مشکل :</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-1"></div>
                                            <div class="col-sm-10 col-md-10">
                                                <form action="/problem"  method="get">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label>نام تمرین :</label>
                                                            <input class="form-control" name="exercise_name" value="{{$exercise->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label>سوال :</label>
                                                            <select id="choose_question" name="question" class="form-control">
                                                                @if(count($questions) > 0)
                                                                    <?php $cnt = 1; ?>
                                                                    @foreach($exercise->questions as $ex)
                                                                        <option value={{$ex->id}}>{{$cnt++}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label>مشکل چیه به نظرت؟</label>
                                                        <textarea name="problem" cols="60" rows="5">
                                                            این سوال ایراد دارد لطفا بررسی کنید.
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="_token" value={{ csrf_token() }}>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-default btn-sm">ثبت</button>
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
                        <br>
                        <br>
                        <div>
                            <b>راه حل :</b>
                                <span class="solution">&nbsp;{{$question['solution']}}</span>
                        </div>
                    </div>
                    <hr>
                </li>
                    <?php
                            $count++;
                    ?>
                @endforeach
            </ol>
            <br/>
        </div>
        <!-- /Article -->
            <div class="col-md-2 col-sm-2"></div>
    </div>
</section>
<!-- /container -->
@include('footer')

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<!-- custome js just for login page -->
<script src="{{URL::asset('js/QAmar.js')}}"></script>
<script src="{{URL::asset('js/custom.js')}}"></script>
<!-- Google Maps -->
{{--<script src="{{URL::asset('js/Gmap.JS')}}"></script>--}}
{{--<script src="{{URL::asset('js/google-map.js')}}"></script>--}}


</body>
</html>
