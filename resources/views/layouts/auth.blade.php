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
	<link href="{{ asset('css/login.css') }}" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel= "stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</head>
<body>
	<div class="row g-0">
		<div class="col-lg-5">
			<div class="login-inputs mx-auto">
				<!-- auth flash message -->
				@include('auth-flash-message')

				<!-- content -->
				@yield('content')
			</div>
		</div>
		<div class="col-lg-7 d-none d-lg-block">
			<div class="background-programming rounded-end border-end">
				<div class="d-flex justify-content-around figures-margin">
					<img src="{{ asset('assets/img/coding-elements-2.svg') }}" class="figures-2">
					<img src="{{ asset('assets/img/coding-elements-1.svg') }}">
				</div>
				<div class="d-flex justify-content-center pb-5 mb-2">
					<img src="{{ asset('assets/img/Programirane.svg') }}" class="programirane">
				</div>
				<div class="d-flex justify-content-center">
					<div class="new d-flex justify-content-center">
						<div class="d-inline text-normal text-white pt-3 align-self-center">
							Ново
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center pb-5 mb-2 text-uppercase basics-programming pt-1">
					Основи на
					<br>
					програмирането
				</div>
				<div class="d-flex justify-content-center">
					<button class="btn-4 btn-program btn-navy-blue row g-0 align-items-center mt-1">
						<div class="col text-start text-5"><b>Виж повече</b></div>
						<div class="col-auto">
							<img src="{{ asset('assets/img/action_icon.svg') }}">
						</div>
					</button>
				</div>
				<div class="d-flex justify-content-around ">
					<img src="{{ asset('assets/img/coding-elements-3.svg') }}">
					<img src="{{ asset('assets/img/coding-elements-4.svg') }}">
				</div>
			</div>
		</div>
		<div class="col-lg-7 d-lg-none">
			<div class="background-programming-2 rounded-bottom">
				<div class="d-flex justify-content-around figures-margin">
					<img src="{{ asset('assets/img/coding-elements-2.svg') }}" class="figures-2">
					<div class="d-flex justify-content-center">
						<img src="{{ asset('assets/img/Programirane.svg') }}" class="programirane">
					</div>
					<img src="{{ asset('assets/img/coding-elements-1.svg') }}" class="figures-2">
				</div>
				<div class="d-flex justify-content-center">
					<div class="new d-flex justify-content-center">
						<div class="d-inline text-normal text-white pt-3 align-self-center">
							Ново
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center pb-4 text-uppercase basics-programming pt-1">
					Основи на
					<br>
					програмирането
				</div>
				<div class="d-flex justify-content-center pb-5">
					<button class="btn-4 btn-program btn-navy-blue row g-0 align-items-center mt-1">
						<div class="col text-start text-5"><b>Виж повече</b></div>
						<div class="col-auto">
							<img src="{{ asset('assets/img/action_icon.svg') }}">
						</div>
					</button>
				</div>
			</div>
		</div>
	</div>

    <script>
    	$(function() {
    		var cities = {
    			"0":"Враца",
    			"1":"Борован",
    			"2":"Бяла Слатина",
    			"3":"Козлодуй",
    			"4":"Криводол",
    			"5":"Мездра",
    			"6":"Мизия",
    			"7":"Оряхово",
    			"8":"Роман",
    			"9":"Хайредин",
    			"10": "Друго"
    		};

    		var options = [];
    		$.each( cities, function( key, val ) {
    			options.push( "<option value='"+val+"'>" + val + "</option>" );
    		});
    		$('#location').append(options);
    	})
    </script>

	<!-- Bootstrap core JS Files -->
	<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
	<script type= "text/javascript" src= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
</body>
</html>
