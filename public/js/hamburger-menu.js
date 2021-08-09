$( document ).ready( function () {
	$( '.cross' ).fadeOut( 'fast' );
	$( '.menu' ).fadeOut( 'fast' );
	$( ".hamburger" ).click( function () {
		$( ".hamburger" ).fadeOut( 'fast' );
		$( ".menu" ).slideToggle( "slow", function () {

			$( ".cross" ).fadeIn( 'fast' );
		} );
	} );

	$( ".cross" ).click( function () {
		$( ".cross" ).fadeOut( 'fast' );
		$( ".menu" ).slideToggle( "slow", function () {

			$( ".hamburger" ).fadeIn( 'fast' );
		} );
	} );
} );