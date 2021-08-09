$( '.edu-visibility' ).on( 'change', function () {
	var isChecked = $( this ).is( ":checked" );
	visibilityIcons( 'образование', isChecked );
	var url = $( this ).attr( 'data-url' );
	ajaxVisibility( 'образование', isChecked, url );
} );

$( '.work-visibility' ).on( 'change', function () {
	var isChecked = $( this ).is( ":checked" );
	visibilityIcons( 'работен опит', isChecked );
	var url = $( this ).attr( 'data-url' );
	ajaxVisibility( 'работен опит', isChecked, url );
} );

$( '.interest-visibility' ).on( 'change', function () {
	var isChecked = $( this ).is( ":checked" );
	visibilityIcons( 'интереси', isChecked );
	var url = $( this ).attr( 'data-url' );
	ajaxVisibility( 'интереси', isChecked, url );
} );

function ajaxVisibility( type, visibility, url ) {
	$.ajax( {
		headers: {
			'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
		},
		type: "POST",
		url: url,
		data: {
			type: type,
			visibility: visibility
		},
		success: function ( data, textStatus, xhr ) {
			if ( xhr.status == 200 ) {
				// console.log('success');
			}
		}
	} );
}