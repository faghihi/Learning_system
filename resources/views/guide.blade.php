
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>راهنما</title>
    <link rel="favicon" href="{{URL::asset('images/favicon.png')}}">
    <!-- custome js just for login page -->

    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fontiran.css')}}">
    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-theme.css')}}" media="screen">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">

    <link rel="stylesheet" href="{{URL::asset('css/general.css')}}">
    <link rel="stylesheet" href="css/Tdashboard.css">
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
        <h1>راهنمای اضافه کردن سوال</h1>
        <p></p>
    </div>
</header>




<div class="container">
    <br>
    <a href = "http://asciimath.org/#gettingStarted">در اینجا می توانید با نحوه ی اضافه کردن سوالات ریاضی آشنا شوید</a>

    <div class="row">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-10 col-sm-10">
            <div class="row message">
                <div class="col-md-2 col-sm-2"><b>#</b></div>
                <div class="col-md-4 col-sm-4"><b>موضوع</b></div>
                <div class="col-md-2 col-sm-6"><b>عملیات</b></div>
            </div>
            <div class="row message-part">
                <div class="col-md-2 col-sm-2">

                </div>
                <div class="col-md-4 col-sm-4">

                </div>
                <div class="col-md-6 col-sm-6">

                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
