$( document ).ready( function () {
	var change;
	changeSlides( 1 );
	var time = 7500;

	$( "body" ).keydown( function ( e ) {
		if ( e.keyCode == 37 ) { // left
			plusSlides( -1 )
		} else if ( e.keyCode == 39 ) { // right
			plusSlides( 1 )
		}
	} );

	if ( $( ".mySlides" ).hasClass( "active-slide" ) ) {
		$( ".mySlides > img" ).fadeIn( 100 );
	}

	$( '.dot' ).mouseover( function () {
		var child = $( '.dot' ).index( this ) + 1;
		current = child;

		clearInterval( change );
		change = 0;
	} );

	$( '.dot' ).mouseleave( function () {
		var child = $( '.dot' ).index( this ) + 1;
		current = child;
		setTimeout( changeSlides( current ), 1000 );
	} );

	function changeSlides( start ) {
		var numItems = $( '.dot' ).length;
		change = setTimeout( function () {
			// console.log(start);
			if ( start != numItems ) {
				// console.log('not equal');
				currentSlide( start );
				start++;
			} else {
				// console.log('equal');
				currentSlide( start );
				start = 1;
			}
			changeSlides( start );
		}, time );
	}

} );