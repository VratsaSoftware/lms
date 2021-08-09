<div class="col-md-12 d-flex flex-row flex-wrap text-center justify-content-center lvl-title filter-apps">
<div class="col-md-12 text-center">Филтър Курсове</div>
<div id="app-router" style="display: none;" data-url="{{route('admin.ajax.applications')}}"></div>
@foreach($courses as $course)
	<div class="col-md-3 text-center course-filter-holder">
		<a href="#" data-course="{{$course->id}}" class="filter-courses-link">
			<div class="col-md-12 course-wrap-filter">
				{{$course->name}}
			</div>
		</a>
	</div>
@endforeach
</div>
<div class="loaded-content col-md-12">

</div>
<script>
	$('.course-filter-holder > a').on('click', function(e){
	    e.preventDefault();
        $('.course-filter-holder > a').each(function( index, elval ) {
            $( this ).find('div').removeClass('selected-filter');
        });
        if($(this).find('div').hasClass('selected-filter')){
            $(this).find('div').removeClass('selected-filter');
        }else{
            $(this).find('div').addClass('selected-filter');
        }
        var url = $('#app-router').attr('data-url');
        var course = $(this).attr('data-course');
        $.ajax( {
            headers: {
                'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
            },
            type: "POST",
            url: url,
            data: {
                course: course,
	            final: true,
            },
            success: function ( data, textStatus, xhr ) {
                if ( xhr.status == 200 ) {
                    $('.loaded-content').html('');
                    $('.loaded-content').html(data);
                    $('#forms').DataTable().destroy();
                    $('#forms').DataTable({
                        responsive: true,
                        order: [[0, "desc"]],
                    });
                }
            }
        } );
	});
</script>