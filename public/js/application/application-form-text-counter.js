$( 'textarea[name="suitable_candidate"]' ).on( 'keyup', function () {
	symbolCount( this, $( '#candidate-span' ) );
} );

$( 'textarea[name="suitable_training"]' ).on( 'keyup', function () {
	symbolCount( this, $( '#training-span' ) );
} );

$( 'textarea[name="accompliments"]' ).on( 'keyup', function () {
	symbolCount( this, $( '#accompliments-span' ) );
} );

$( 'textarea[name="expecatitions"]' ).on( 'keyup', function () {
	symbolCount( this, $( '#expecatitions-span' ) );
} );

function symbolCount( element, span ) {

	var len = element.value.length;
	var lbl = span;

	if ( len < 100 || len > 500 ) {
		$( lbl ).css( 'color', '#f00' );
	} else {
		$( lbl ).css( 'color', '#69b501' );
	}
	lbl.text( 'символи: ' + len );
}
