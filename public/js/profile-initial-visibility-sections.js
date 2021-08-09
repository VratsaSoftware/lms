$( function () {
	var eduVis = $( '.edu-visibility' ).is( ":checked" );
	var workVis = $( '.work-visibility' ).is( ":checked" );
	var interestVis = $( '.interest-visibility' ).is( ":checked" );
	visibilityIcons( 'образование', eduVis );
	visibilityIcons( 'работен опит', workVis )
	visibilityIcons( 'интереси', interestVis );
} );

function visibilityIcons( tag, isChecked ) {
	switch ( tag ) {
		case 'образование':
			$( '.edu-wrapper' ).stop().fadeTo( 100, 0.3, function () {
				$( this ).fadeTo( 500, 1.0 );
			} );
			if ( isChecked ) {
				$( '.edu-wrapper > .stats-title > span:first-child' ).find( 'i' ).remove();
				$( '.edu-wrapper > .stats-title > span:first-child' ).append( '<i class="fas fa-eye"></i>' );
			} else {
				$( '.edu-wrapper > .stats-title > span:first-child' ).find( 'i' ).remove();
				$( '.edu-wrapper > .stats-title > span:first-child' ).append( '<i class="fas fa-eye-slash"></i>' );
			}
			break;
		case 'работен опит':
			$( '.work-wrapper' ).stop().fadeTo( 100, 0.3, function () {
				$( this ).fadeTo( 500, 1.0 );
			} );
			if ( isChecked ) {
				$( '.work-wrapper > .stats-title > span:first-child' ).find( 'i' ).remove();
				$( '.work-wrapper > .stats-title > span:first-child' ).append( '<i class="fas fa-eye"></i>' );
			} else {
				$( '.work-wrapper > .stats-title > span:first-child' ).find( 'i' ).remove();
				$( '.work-wrapper > .stats-title > span:first-child' ).append( '<i class="fas fa-eye-slash"></i>' );
			}
			break;
		case 'интереси':
			$( '.interest-wrapper' ).stop().fadeTo( 100, 0.3, function () {
				$( this ).fadeTo( 500, 1.0 );
			} );
			if ( isChecked ) {
				$( '.interest-wrapper > .stats-title > span:first-child' ).find( 'i' ).remove();
				$( '.interest-wrapper > .stats-title > span:first-child' ).append( '<i class="fas fa-eye"></i>' );
			} else {
				$( '.interest-wrapper > .stats-title > span:first-child' ).find( 'i' ).remove();
				$( '.interest-wrapper > .stats-title > span:first-child' ).append( '<i class="fas fa-eye-slash"></i>' );
			}
			break;
		default:
	}
}