<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="description" content="">
	<meta name="author" content="">
	<title>@yield('title')</title>
	<!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('/images/vso-png.png')}}" />
	<!-- Fonts and Icons -->
	<link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<!-- Bootstrap core CSS -->
	<link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<!-- CSS Files -->
    <link href="{{ asset('css/lection/homework.css') }}" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel= "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</head>
<body>
	<div class="row g-0 p-lg-0 px-4 py-4 mt-lg-0 mt-2">
		<div class="col-xl-auto pe-xl-0 pe-lg-5">
			<div class="row g-0">
				<!-- nav menu -->
				@if (Auth::user())
                	@include('navigation-left-bar')
				@endif
				<!-- nav menu END -->
			</div>
		</div>
		<!-- content -->
		@yield('content')
	</div>

	<!-- Bootstrap core JS Files -->
	<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
	<script type= "text/javascript" src= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
</body>
</html>
