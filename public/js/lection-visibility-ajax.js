$( '.visibility' ).on( 'change', function () {
	var vis = this.value;
	var url = $( this ).find( ':selected' ).attr( 'data-url' );
	var element = $( this ).parent().parent().parent().parent();
	var done = false;
	$.ajax( {
		headers: {
			'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
		},
		type: "POST",
		url: url,
		data: {
			visibility: vis
		},
		success: function ( data, textStatus, xhr ) {
			if ( xhr.status == 200 ) {
				finished( true )
			}
		}
	} );

	function finished( done ) {
		if ( done ) {
			element.fadeOut().fadeIn();
		}
	}
} );