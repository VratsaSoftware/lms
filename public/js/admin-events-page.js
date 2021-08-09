$( '#add-event' ).on( 'click', function () {
	$( '.close-modal' ).attr( 'data-scroll', $( this ).offset().top - 100 );
	$( '#modal' ).show();
} );

$( '.create-course-btn' ).on( 'click', function () {
	$( '#create_event' ).submit();
} );

$( '.show-more-event' ).on( 'click', function () {
	$( '.close-modal' ).attr( 'data-scroll', ( $( this ).offset().top - 700 ) );
	var newModal = $( '#modal' ).clone( true ).attr( 'id', 'modal-view' );
	var newId = Math.random().toString( 36 ).substr( 2, 9 );
	var desc = $( this ).prev( '.desc-no-show' ).html();
	$( '#modal' ).after( newModal );
	$( '#modal-view > .modal-content > .copy' ).html( '' );
	$( '#modal-view > .modal-content > .copy' ).html( '<p>' + desc + '</p>' );
	$( '#modal-view > .modal-content > .copy > #teams-table' ).attr( 'id', 'new-table-' + newId ).DataTable( {
		"pageLength": 1,
		"lengthMenu": [ 1, 5, 10, 15, 50, 100 ]
	} );
	newModal.show();
} );

$( '.invites-modal-btn' ).on( 'click', function () {
	$( '.close-modal' ).attr( 'data-scroll', ( $( this ).offset().top - 700 ) );
	var newModal = $( '#modal' ).clone( true ).attr( 'id', 'invites-modal' );
	var desc = $( this ).find( '.invites-no-show' ).html();
	$( '#modal' ).after( newModal );
	$( '#invites-modal > .modal-content > .copy' ).html( '' );
	$( '#invites-modal > .modal-content > .copy' ).html( '<p>' + desc + '</p>' );
	$( '#invites-modal > .modal-content > .copy > #teams-table' ).attr( 'id', 'invites-table' )
	newModal.show();
} );

$( 'input:radio[name="type"]' ).change(
	function () {
		console.log( $( this ).val() );
		if ( $( this ).is( ':checked' ) && $( this ).val() == 'is_team' ) {
			$( '.team-capacity' ).fadeIn();
		} else {
			$( '.team-capacity' ).fadeOut();
		}
	} );