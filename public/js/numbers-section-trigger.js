$( document ).ready( function () {
	var trigger = false;
	$( window ).scroll( function () {
		function isScrolledIntoView( elem ) {
			var docViewTop = $( window ).scrollTop();
			var docViewBottom = docViewTop + $( window ).height();

			var elemTop = $( elem ).offset().top;
			var elemBottom = elemTop + $( elem ).height();

			if ( ( elemBottom <= docViewBottom ) && ( elemTop >= docViewTop ) && trigger == false ) {
				trigger = true;
				triggerNumbers( trigger );
			}
		}
		isScrolledIntoView( $( '#numbers' ) );

		function triggerNumbers() {
			if ( trigger ) {
				$( '.count' ).each( function () {
					$( this ).prop( 'Counter', 0 ).animate( {
						Counter: $( this ).text()
					}, {
						duration: 3500,
						easing: 'swing',
						step: function ( now ) {
							$( this ).text( Math.ceil( now ) );
						}
					} );
				} );
			}
		}
	} );
} );