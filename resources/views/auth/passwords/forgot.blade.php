@extends('layouts.auth')

@section('title', 'Забравена парола')

@section('content')
	<div class="row g-0">
		<div class="col-auto pe-3">
			<a href="{{ config('consts.PUBLIC_PLATFORM_URL') }}">
                @include('auth.partials.logo')
            </a>
		</div>
	</div>

	<form method="POST" action="{{ route('password.email') }}" id="reset-password">
		@csrf

		<div class="login text-uppercase">
			Забравена парола
		</div>
		<div class="create d-none d-lg-block"></div>
		<div class="mb-4 input-user">
			@if (session('status'))
				<div class="mb-4 font-medium text-sm text-green-600">
					{{ session('status') }}
				</div>
			@endif
			<input id="email" type="email" class="w-100 btn-edit" placeholder="E-mail" aria-label="Username" aria-describedby="addon-wrapping" name="email" value="{{ old('email') }}" placeholder="e-mail" required>
		</div>

		<input type="submit" class="w-100 btn-green btn-edit d-none d-lg-block btn-margin" value="Нова парола">
		<div class="d-flex justify-content-center d-lg-none">
			<button class="btn-4 btn-program btn-green row g-0 align-items-center w-100 btn-margin">
				<div class="col text-start text-5"><b>Нова парола</b></div>
				<div class="col-auto">
					<img src="{{ asset('assets/img/action_icon.svg') }}">
				</div>
			</button>
		</div>
	</form>
@endsection
