@extends('layouts.auth')

@section('title', 'Вход')

@section('content')
	<div class="row g-0">
			<div class="col-auto pe-3">
				<a href="{{ config('consts.PUBLIC_PLATFORM_URL') }}">
                    @if (config('consts.LOGO') == 'vsc')
                        <img class="logo-black" src="{{ asset('assets/img/logo.png') }}">
                    @elseif (config('consts.LOGO') == 'digitalmontana')
                        <img class="logo-digitalmontana" src="{{ asset('assets/img/digital-montana-transperant.png') }}">
                    @elseif (config('consts.LOGO') == 'digitalsmoliyan')
                        <img class="logo-black" src="{{ asset('assets/img/digital-smoliyan-transparent.png') }}">
                    @endif
                </a>
			</div>
			@if(!Auth::check())
				<div class="create-account col-auto ps-5 pt-2 d-lg-none">
					<a href="{{ route('user/register') }}"><b>Създай профил</b></a>
				</div>
			@endif
	</div>

	@if(Auth::check())
		<div class="login text-uppercase d-none d-lg-block"></div>
	@endif

	@if(!Auth::check())
		<form method="POST" action="{{ route('login') }}" id="login-form">
			@csrf

			@if (Request::has('previous'))
				<input type="hidden" name="previous" value="{{ Request::get('previous') }}">
			@else
				<input type="hidden" name="previous" value="{{ URL::previous() }}">
			@endif

			<div class="login text-uppercase">
				Вход
			</div>
			<div class="create d-none d-lg-block">
				Нямаш акаунт? <span class="text-color"><a href="{{ route('user/register') }}"><b>Създай</b></a></span>
			</div>
			<div class="mb-4 input-user">
				<input type="email" name="email" class="w-100 btn-edit" placeholder="E-mail" aria-label="Username" aria-describedby="addon-wrapping">
			</div>
			<div class="mb-3">
				<input type="password" name="password" class="w-100 btn-edit" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
			</div>
			<div class="text-password">
				<a href="{{ route('auth.password.reset') }}"><b>Забравена парола?</b></a>
			</div>
			<input type="submit" class="w-100 btn-green btn-edit d-none d-lg-block btn-margin" value="Вход">
			<div class="d-flex justify-content-center d-lg-none">
				<button class="btn-4 btn-program btn-green row g-0 align-items-center w-100 btn-margin">
					<div class="col text-start text-5"><b>Вход</b></div>
					<div class="col-auto">
						<img src="{{ asset('assets/img/action_icon.svg') }}">
					</div>
				</button>
			</div>
		</form>
		<div class="form-check mt-4 d-none d-lg-block">
			<div class="block mt-4">
				<label for="remember_me" class="flex items-center">
					<input name="remember_me" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
					<label class="form-check-label text-navy-blue" for="flexCheckDefault">
						<b>Запомни ме</b>
					</label>
				</label>
			</div>
		</div>
	@else
		<div class="mb-4 input-user mt-5">
			<a href="{{ asset('myProfile') }}"><button type="button" class="w-100 btn-green btn-edit btn-margin">Продължи към моя Профил</button></a>
			<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button type="button" class="w-100 btn-green btn-edit btn-margin">Изход</button></a>
		</div>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
		</form>
	@endif
@endsection
