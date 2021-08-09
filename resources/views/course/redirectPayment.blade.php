@extends('layouts.template')
@section('title', 'Обработка на плащане')
@section('content')
	<div class="content-wrap" style="background-image: url({{asset('/images/loaders/load-13.gif')}});background-repeat: no-repeat;background-size: cover;min-height: 99vh;background-position:center;">
		<div class="section">
			<div class="col-md-12 d-flex flex-row flex-wrap">
				<div class="col-md-12 text-center picture-title">
					Заявката се обработва
				</div>
				<div id="response" style="display:none;">
					{!! $response !!}
				</div>
				<script>
					$(function(){
					    console.log($('#response').length);
                        console.log($('#response > p > a').html());
                        window.location.href = $('#response > p > a').attr('href');
					});
				</script>
			</div>
		</div>
	</div>
@endsection
