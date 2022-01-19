@extends('layouts.auth')

@section('title', 'Нова парола')

@section('content')
	<div class="row g-0">
		<div class="col-auto pe-3">
			<a href="{{ config('consts.PUBLIC_PLATFORM_URL') }}">
                @include('auth.partials.logo')
            </a>
		</div>
	</div>

	<div class="login text-uppercase">
		Парола-Промяна
	</div>

	<form method="POST" action="{{ route('password.update') }}" id="register-form">
		@csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-3 input-user">
                <input id="email" type="email" class="w-100 btn-edit" name="email" value="{{ $email ?? old('email') }}" placeholder="E-Mail" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>

        <div class="mb-3">
                <input id="password" type="password" class="w-100 btn-edit" name="password" placeholder="Нова Парола" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>

        <div class="mb-3">
                <input id="password-confirm" type="password" class="w-100 btn-edit" name="password_confirmation" placeholder="Потвърди Парола" required>
        </div>


		<input type="submit" id="register-btn-send" class="w-100 btn-green btn-edit d-none d-lg-block btn-margin" value="Промени">
		<div class="d-flex justify-content-center d-lg-none">
			<button class="btn-4 btn-program btn-green row g-0 align-items-center w-100 btn-margin">
				<div class="col text-start text-5"><b>Промени</b></div>
				<div class="col-auto">
					<img src="{{ asset('assets/img/action_icon.svg') }}">
				</div>
			</button>
		</div>
	</form>
@endsection
