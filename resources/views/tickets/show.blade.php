
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ticket->ticket_id }} - {{ $ticket->title }}</title>
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
        <h1>{{ $ticket->title }}</h1>
        <p></p>
    </div>
</header>

<!-- container -->
<div class="container">
    <br>
    <br>
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
	        <div class="panel panel-default">
	        	<div class="panel-body">
	        	    @if(session()->has('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                    @endif
	        		<div class="ticket-info">
	        		    <h4>متن پیام</h4>
	        			<p class="well well-sm">{{ $ticket->message }}</p>
		        		<p>دسته: {{ $category->name }}</p>
		        		<p>
	        			@if ($ticket->status === 'Open')
    						وضعیت: <span class="label label-success">{{ $ticket->status }}</span>
    					@elseif($ticket->status === 'Pending')
    					    وضعیت: <span class="label label-warning">{{ $ticket->status }}</span>
    					@else
    						وضعیت: <span class="label label-danger">{{ $ticket->status }}</span>
    					@endif
		        		</p>
		        		<p>ساخته شده در: {{ $ticket->created_at->diffForHumans() }}</p>
	        		</div>
	        		<hr>
                    @if(count($comments) > 0)
                    <h4>دیدگاه ها:</h4>
	        		<div class="comments">
	        			@foreach ($comments as $comment)
	        				<div class="panel panel-@if($ticket->user->id === $comment->user_id){{"default"}}@else{{"success"}}@endif">
	        					<div class="panel panel-heading">
	        						{{ $comment->user->name }}
	        						<span class="pull-left">{{ $comment->created_at->format('Y-m-d') }}</span>
	        					</div>
	        					<div class="panel panel-body">
	        						{{ $comment->comment }}		
	        					</div>
	        				</div>
	        			@endforeach
	        		</div>
	        		<hr>
	        		@endif

                    <h4>نظر شما در مورد پیام :</h4>
	        		<div class="comment-form">
		        		<form action="{{ url('comment') }}" method="POST" class="form">
		        			{!! csrf_field() !!}
		        			<input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
		        			<div class="form-group">
                                <textarea rows="6" id="comment" class="form-control" name="comment"></textarea>
	                        </div>
	                        <div class="form-group">
                                <button type="submit" class="btn btn-default">ارسال نظر</button>
	                        </div>
		        		</form>
	        	</div>
	        </div>
	    </div>
	</div>
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