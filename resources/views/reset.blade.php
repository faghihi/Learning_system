
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تغییر رمز</title>
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


<header id="head" class="secondary">
    <div class="container">
        <h1>تغییر رمز</h1>
        <p></p>
    </div>
</header>

<!-- container -->
<div class="container">
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">

            <form id="changeProfile" class="form-light mt-20" role="form" action="/Reset" method="post">


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>رمز جدید</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
            </div>
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <button type="submit" class="btn btn-default">تغییر رمز</button><p><br/></p>

            </form>

    </div>
    </div>
</div>
<!-- /container -->

@include('footer')


<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<!-- custome js just for login page -->
<script src="{{URL::asset('js/custom.js')}}"></script>
<script src="{{URL::asset('js/profilecheck.js')}}"></script>

<!-- Google Maps -->
<script src="{{URL::asset('js/Gmap.JS')}}"></script>
<script src="{{URL::asset('js/google-map.js')}}"></script>


</body>
</html>
