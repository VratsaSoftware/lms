<link rel= "stylesheet" href= "{{ asset('css/flash-message.css') }}"/>

@if ($errors->has('name') || $errors->has('last_name') || $errors->has('email') || $errors->has('password') || $errors->has('sex'))
    <div class="alert alert-danger mt-1" role="alert">
        <ul style="list-style-type: none; margin: 0; padding: 0;">
            @if ($errors->has('name'))
                <li>{{ $errors->first('name') }}</li>
            @endif
            @if ($errors->has('last_name'))
                <li>{{ $errors->first('last_name') }}</li>
            @endif
            @if ($errors->has('email'))
                <li>{{ $errors->first('email') }}</li>
            @endif
            @if ($errors->has('password'))
                <li>{{ $errors->first('password') }}</li>
            @endif
            @if ($errors->has('sex'))
                <li>{{ $errors->first('sex') }}</li>
            @endif
        </ul>
    </div>
@endif

<script>
	$(document).ready( function () {
        $('.alert').show().fadeOut(8000);
    });

    $('.alert').click(function () {
        $(this).hide();
    });
</script>
