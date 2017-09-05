
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ثبت نام | ورود</title>
	<link rel="favicon" href="{{URL::asset('images/favicon.png')}}">
	<!-- custome js just for login page -->
	<link rel="stylesheet" href="{{URL::asset('css/login/css/reset.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/login/css/style.css')}}">
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
            <h1>ورود | ثبت نام</h1>
        </div>
    </header>

	<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
						<!-- Form Module-->
						@if($errors->register->any())
							<h4 style="color:red">{{$errors->register->first()}}</h4>
						@endif
						<div class="module form-module">
							<div class="toggle " >
								<i class="fa fa-times fa-pencil"></i>
								<div class="tooltips">ثبت نام</div>
							</div>
							<div class="form">
								<h2>وارد حساب کاربریت شو :-)</h2>
								<form action="/Login" method="post">
								    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
								    <!--show error validation-->
                                    @if($errors->any())
                                        <h4 style="color:red">{{$errors->first()}}</h4>
                                    @endif
									<input type="email" name="email" placeholder="ایمیل"/>
									<input type="password" name="password" placeholder="گذر واژه"/>
									<input class="btn btn-default" type="submit" value="ورود">
								</form>
							</div>
							<div class="form">
								<h2>حساب کاربری جدید بساز :-)</h2>
								<form action="/SignUp" method="post" onsubmit="return checklogin()">
									<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
									<input type="checkbox" name="teacher"><label>معلم هستید؟</label>
									<input type="text" name="name" placeholder="نام و نام خانوادگی"/>
									<input type="password" id="pass" name="password" placeholder="گذر واژه"/>
									<input type="password" id="repass" name="repassword" placeholder="تکرار گذر واژه"/>
									<input type="email" name="email" placeholder="ایمیل"/>
									<input type="tel" name="phone" placeholder="تلفن"/>
                                    <label for="grade">مقطع :</label>
                                    <select id="grade" name="grade">
										@foreach($grades as $grade)
                                        	<option value="{{$grade->id}}" >{{$grade->name}}</option>
										@endforeach
                                    </select>
									<label for="school">مدرسه :</label>
									<select id="school" name="school">
									    <option value="0" >مدرسه من در این مدارس نیست</option>
									    @if(count($schools) > 0)
									        @foreach($schools as $school)
										        <option value={{$school->id}}>{{$school->name}}</option>
										    @endforeach
										@endif
									</select>
									<input class="btn btn-default" type="submit" value="ثبت نام">
								</form>
							</div>
							<div class="cta"><a href="/Forgetpass">رمزم را فراموش کردم. :-(</a></div>
						</div>
					</div>
					<div class="col-md-3">
					</div>
				</div>
			</div>
	<!-- /container -->

@include('footer')

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<!-- custome js just for login page -->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<!-- custome js just for login page -->
<script src="{{URL::asset('js/login/index.js')}}"></script>
<script src="{{URL::asset('js/custom.js')}}"></script>

<!-- Google Maps -->
{{--<script src="{{URL::asset('js/Gmap.JS')}}"></script>--}}
{{--<script src="{{URL::asset('js/google-map.js')}}"></script>--}}


</body>
</html>
