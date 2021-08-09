@extends('layouts.template')
@section('title', 'Admin Кандидаствания')

@section('head')
    <link href="{{ asset('css/lection/lection.css') }}" rel="stylesheet" />
@endsection

@section('content')
	<link rel="stylesheet" href="{{asset('css/applications.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

	<div class="col-md-12 d-flex flex-row flex-wrap text-center justify-content-center lvl-title filter-apps">
		<div class="col-md-12 text-center">Филтър Кандидадставния</div>
		<div id="app-router" style="display: none;" data-url="{{route('admin.ajax.applications')}}"></div>
		@foreach($types as $type)
			<div class="col-md-3 text-center filter-holder">
				<a href="#" data-type="{{$type->id}}" class="filter-courses-link">
					@if(request()->type == $type->id)
						<div class="col-md-12 course-wrap-filter selected-filter">
							@else
								<div class="col-md-12 course-wrap-filter">
									@endif
									{{$type->type}}
								</div>
				</a>
			</div>
		@endforeach
		<div class="col-md-3 text-center filter-holder">
			<a href="#" data-type="0" class="filter-courses-link">
				<div class="col-md-12 course-wrap-filter">
					всички
				</div>
			</a>
		</div>
	</div>
	<div id="apps-content" class="col-md-12">

	</div>
	<script>
		$('.filter-holder > a').on('click', function(){
            $('.filter-holder > a').each(function( index, elval ) {
                $( this ).find('div').removeClass('selected-filter');
            });
		   if($(this).find('div').hasClass('selected-filter')){
		       $(this).find('div').removeClass('selected-filter');
		   }else{
		       $(this).find('div').addClass('selected-filter');
		   }
		   loadApplicaitons($(this).attr('data-type'));
		});
        function loadApplicaitons(type) {
			var url = $('#app-router').attr('data-url');
            $.ajax( {
                headers: {
                    'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                },
                type: "POST",
                url: url,
                data: {
                    type: type,
                },
                success: function ( data, textStatus, xhr ) {
                    if ( xhr.status == 200 ) {
                        $('#apps-content').html('');
                        $('#apps-content').html(data);
                        $('#forms').DataTable().destroy();
                        $('#forms').DataTable({
                            responsive: true,
                            order: [[0, "desc"]],
                        });
                    }
                }
            } );
        }
	</script>
@endsection
