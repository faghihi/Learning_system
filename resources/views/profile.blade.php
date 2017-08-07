
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پروفایل کاربری</title>
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
@include('navbar',array('active'=>'profile'))
<!-- /.navbar -->

<header id="head" class="secondary">
    <div class="container">
        <h1>اطلاعات شخصی</h1>
        <p></p>
    </div>
</header>

<!-- container -->
<div class="container">
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h3 class="section-title">اطلاعات شخصی</h3>
            <form id="changeProfile" class="form-light mt-20" role="form" action="/Profile" method="post">
            <?php
                if(isset($error))
                    {
            ?>
                <p style="color:red;">اشکالی در آپدیت اطلاعا شما پیش آمده است.</p>
            <?php
                        }
                ?>
            <div class="form-group">
                <label>نام و نام خانوادگی</label>
                <input type="text" name="name" class="form-control" value="{{$info['name']}}" disabled>
            </div>
            <div class="form-group">
                <label>نام کاربری</label>
                <input type="text" name="username" class="form-control" value="{{$info['username']}}">
            </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ایمیل</label>
                        <input type="email" name="email" class="form-control" value="{{$info['email']}}" disabled>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>تلفن</label>
                        <input type="text" name="phone" class="form-control" value="{{$info['phone']}}">
                    </div>
                </div>
                @if($info['type'] == 'teacher')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>مدرسه</label>
                            <select class="form-control" name="school">
                                <option value="0" selected>مدرسه من در این مدارس نیست</option>
                            </select>
                        </div>
                    </div>
                </div>
                @endif
                <button form="changeProfile" type="submit" class="btn btn-two">ثبت تغییر</button><p><br/></p>
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            </form>
                <form class="form-light mt-20" role="form" action="/ChangePass" method="post" onsubmit="return checkold()">
                    <div class="form-group">
                        <h4>تغییر رمز</h4>
                        <label>رمز قبلی</label>
                        <input type="password"  name="oldpass" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>رمز جدید</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <button type="submit" class="btn btn-two">تغییر رمز</button><p><br/></p>
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
