<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<!-- css links -->
	<link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/profile/flip-card.css') }}" rel="stylesheet" type="text/css">
	<!-- Bootstrap core CSS -->
	<link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<!-- CSS Files -->
    <link href="{{ asset('css/profile/profile.css') }}" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel= "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

	<script src="{{ asset('js/profile/profile.js') }}"></script>

	@include('layouts.partials.head')
</head>
<body>
	<div class="container-fluid g-0">
        <div class="row g-0 p-0 m-0">
            <div class="col-lg-auto pe-xl-0 pe-lg-5">
                <div class="row g-0">
					<!-- nav menu -->
	                @include('navigation-left-bar')
					<!-- nav menu END -->
					<!-- left profile - course section -->
					@if (Auth::user()->isAdmin() || Auth::user()->isLecturer())
						@include('profile.admin.left-profile.course')
						@include('profile.admin.left-profile.course-mobile')
					@else
						@include('profile.user.left-profile.course')
						@include('profile.user.left-profile.course-mobile')
					@endif
					<!-- left profile - course section END -->
					<!-- content -->
					@yield('content')
					<!-- content END -->
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JS Files -->
	<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
	<script type= "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
</body>
</html>
