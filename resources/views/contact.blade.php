
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ارتباط با ما</title>
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

@include('navbar',array('active'=>'dashboard'))

		<header id="head" class="secondary">
            <div class="container">
                    <h1>ارتباط با ما</h1>
                    <p>اگر پرسش یا مشکلی درباره ی هر یک از قسمت های سایت دارید، آن را با ما درمیان بگذارید تا در اسرع وقت پاسخگوی شما باشیم.</p>
                </div>
    </header>


	<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h3 class="section-title">فرم پرسش و پاسخ</h3>
						@if($errors->any())
                            <div class="alert alert-danger">
                                {{$errors->first()}}
                            </div>
                        @endif
						@if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
						<form class="form-light mt-20" role="form" method="post" action="/Contact">
							<div class="form-group">
								<label>نام</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>ایمیل</label>
										<input type="email" name="email" class="form-control" placeholder="example@email.com">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>تلفن</label>
										<input type="text" name="phone" class="form-control" placeholder="09301000000">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>موضوع</label>
								<input type="text" name="subject" class="form-control" placeholder="مشکل در ...">
							</div>
							<div class="form-group">
								<label>پیام</label>
								<textarea class="form-control" name="content" id="message" placeholder="..." style="height:100px;"></textarea>
							</div>
							<button type="submit" class="btn btn-two">ارسال</button><p><br/></p>
							<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
						</form>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<h3 class="section-title">راه های ارتباط حضوری</h3>
						<div class="contact-info">
							<h4>آدرس</h4>
							<p> تهران، چهارراه ولیعصر، دانشگاه صنعتی امیرکبیر</p>

							<h4>ایمیل</h4>
							<p>info@email.com</p>

							<h4>تلفن</h4>
							<p>021-22224444</p>
						</div>
					</div>
				</div>
			</div>
	<!-- /container -->

	@include('footer')
</body>
</html>
