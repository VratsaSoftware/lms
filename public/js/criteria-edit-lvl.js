 $( '.criteria-edit' ).on( 'click', function ( e ) {
 	e.preventDefault();
 	var oldVal = $( this ).text();
 	if ( !$( this ).parent().hasClass( 'opened' ) ) {
 		$( this ).parent().addClass( 'opened' );
 		$( this ).parent().append( '<p><input type="text" value="' + oldVal + '"></p><button class="btn btn-success">запази</button>' );
 	} else {
 		$( this ).parent().removeClass( 'opened' );
 		$( this ).parent().find( 'p' ).remove();
 		$( this ).parent().find( 'button' ).remove();
 	}
 } );

 var addOption = false;
 $( '.add-option' ).on( 'click', function () {
 	if ( !addOption ) {
 		$( this ).prev( '.hide-option' ).prev( '.hide-option' ).css( 'display', 'block' ).removeClass( 'hide-option' )
 		$( this ).prev( '.hide-option' ).css( 'display', 'flex' ).removeClass( 'hide-option' );
 		addOption = true;
 	} else {
 		$( this ).prev( 'div' ).prev( 'div' ).prev( 'div' ).prev( 'div' ).css( 'display', 'block' ).removeClass( 'hide-option' )
 		$( this ).prev( 'div' ).prev( 'div' ).prev( 'div' ).css( 'display', 'flex' ).removeClass( 'hide-option' );
 		$( this ).fadeOut();
 	}

 } );