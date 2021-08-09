$( '#right-menu > li > a' ).on( 'click', function ( e ) {
	e.preventDefault();

	$( 'html, body' ).animate( {
		scrollTop: $( $( this ).attr( 'href' ) ).offset().top
	}, 500, 'linear' );
} );

$( document ).on( "scroll", onScroll );

function onScroll( event ) {
	var scrollPos = $( document ).scrollTop();
	$( '#right-menu > li > a' ).each( function () {
		var currLink = $( this );
		var refElement = $( currLink.attr( "href" ) );
		if ( ( refElement.position().top - 100 ) <= scrollPos && refElement.position().top + refElement.height() > scrollPos ) {
			$( '#right-menu > li > a > img' ).attr( 'src', './images/oval.png' )
			$( '#right-menu > li > a' ).removeClass( "active_right" );
			currLink.parents( 'li' ).addClass( "active_right" );
			$( '.active_right > a > img ' ).attr( 'src', './images/oval_active.png' );
		} else {
			currLink.parents( 'li' ).removeClass( "active_right" );
		}
	} );
}