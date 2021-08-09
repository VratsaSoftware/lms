<link rel= "stylesheet" href="{{ asset('css/flash-message.css') }}"/>

@if ($errors->any())
	<div class="alert alert-danger" role="alert">
		Проверете формата по-долу за грешки!
	</div>
@endif

@if ($success = Session::get('success'))
	<div class="alert alert-success" role="alert">
		{{ $success }}
	</div>
@endif

@if ($error = Session::get('error'))
	<div class="alert alert-danger" role="alert">
		{{ $error }}
	</div>
@endif

@if ($warning = Session::get('warning'))
	<div class="alert alert-warning" role="alert">
		{{ $warning }}
	</div>
@endif

@if ($info = Session::get('info'))
	<div class="alert alert-info" role="alert">
		{{ $info }}
	</div>
@endif

<script>
	$(document).ready(function () {
        $('.alert').show().fadeOut(5000);

		$('.alert').click(function () {
			$(this).hide();
		});
    });
</script>
