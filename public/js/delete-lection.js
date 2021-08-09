$( '.delete-lection-btn' ).on( 'click', function () {
	var element = $( this ).parent().parent().parent().parent();
	var done = false;
	var x = confirm( "Сигурни ли сте че искате да изтриете ?" );
	var count = $( '#lection-count' ).attr( 'data-count' );
	if ( x ) {
		var url = $(this).attr( 'data-url' );
		$.ajax( {
			headers: {
				'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
			},
			type: "POST",
			url: url,
			data: { _method: 'delete' },
			success: function ( data, textStatus, xhr ) {
				if ( xhr.status == 200 ) {
					deleted( true );
				}
			}
		} );

	} else {
		return false;
	}

	function deleted( done ) {
		if ( done ) {
			element.fadeOut().remove();
			$( '#lection-count' ).html( ( count - 1 ) );
		}
	}
} );