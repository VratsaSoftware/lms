$( document ).ready( function () {
	if($('.navbar-nav').attr('id') == 'user-nav'){
		$( '.navbar-nav > li:nth-child(1) > i' ).removeClass( 'fas fa-chevron-down' );
		$( '.navbar-nav > li:nth-child(1) > i' ).addClass( 'fas fa-chevron-up' );
		// $('.content-wrap').css('margin-left', '20vw');
		$( '.content-wrap' ).addClass( 'move-left' );
		$( '.sidenav' ).css( {
			background: '#FFF',
			height: '100%',
		} );
		$( '.sidenav > li:not(:first-child)' ).each(function( index ) {
			$(this).show().css('display','list-item');
		});
		$( '.title-icons' ).css( 'margin-left', '4vw' )
		var menuOpened = true;
	}else{
		menuOpened = false;
	}
	var nestedOpened = false;
	$( '.navbar-nav > li:nth-child(1)' ).on( 'click', function () {
		if ( !menuOpened ) {
			$( '.navbar-nav > li:nth-child(1) > i' ).removeClass( 'fas fa-chevron-down' );
			$( '.navbar-nav > li:nth-child(1) > i' ).addClass( 'fas fa-chevron-up' );
			// $('.content-wrap').css('margin-left', '20vw');
			$( '.content-wrap' ).addClass( 'move-left' );
			$( '.sidenav' ).css( {
				background: '#FFF',
				height: '100%',
			} );
			$( '.sidenav > li:not(:first-child)' ).show();
			$( '.title-icons' ).css( 'margin-left', '4vw' )
			menuOpened = true;
		} else {
			// $('.content-wrap').css('margin-left', '0');
			$( '.content-wrap' ).removeClass( 'move-left' );
			$( '.sidenav' ).css( {
				height: '5vw',
			} );
			$( '.content-wrap' ).css( 'z-index', '-999' );
			$( '.sidenav > li:not(:first-child)' ).hide();
			$( '.navbar-nav > li:nth-child(1) > i' ).removeClass( 'fas fa-chevron-up' );
			$( '.navbar-nav > li:nth-child(1) > i' ).addClass( 'fas fa-chevron-down' );
			$( '.title-icons' ).css( 'margin-left', '10vw' )
			menuOpened = false;
		}
	} );

	$( '#my-courses' ).on( 'click', function ( e ) {
		e.preventDefault();
		if ( !nestedOpened ) {
			$( '.nested-nav > ul > li' ).show();

			$( '#my-courses > i' ).removeClass( 'fas fa-chevron-down' );
			$( '#my-courses > i' ).addClass( 'fas fa-chevron-up' );
			nestedOpened = true;
		} else {
			$( '.nested-nav > ul > li' ).hide();

			$( '#my-courses > i' ).removeClass( 'fas fa-chevron-up' );
			$( '#my-courses > i' ).addClass( 'fas fa-chevron-down' );
			nestedOpened = false;
		}
	} );

} );