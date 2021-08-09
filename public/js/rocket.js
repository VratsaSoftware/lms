$( function () {
	$( "#tabs" ).tabs();
	$( '#ui-id-2' ).on( 'click', function () {
		$( '.top-lvls-php' ).fadeOut();
		$( '.top-lvls-java' ).fadeIn();
		$( '.program-info' ).fadeOut();
		$( '.program-info-java' ).fadeIn();
		$( '.rocket-holder-java' ).fadeIn();
		$( '.rocket-holder' ).fadeOut();
		$( '.first-lvl-java > div > img' ).css( 'opacity', '1' );
	} );

	$( '#ui-id-1' ).on( 'click', function () {
		$( '.top-lvls-php' ).fadeIn();
		$( '.top-lvls-java' ).fadeOut();
		$( '.program-info-java' ).fadeOut();
		$( '.program-info' ).fadeIn();
		$( '.rocket-holder-java' ).fadeOut();
		$( '.rocket-holder' ).fadeIn();
		$( '.first-lvl-java > div > img' ).css( 'opacity', '0' );
	} );

	var scrolCounter = 0;
	var move = -7;
	var moveJava = -7;
	var finished = false;
	var lastScrollTop = 0;
	var end = ( $( '.rocket-target' ).offset().top ).toFixed( 0 );

	$( '.php-lvl' ).bind( "mousewheel", function ( event ) {
		var y = ( $( '.rocket-holder' ).offset().top ).toFixed( 0 );
		var st = $( this ).scrollTop();

		if ( move < 30 ) {
			if ( st > lastScrollTop ) {
				move += 5;
				switch ( move ) {
					case 3:
						$( '.first-lvl-php > div > img' ).css( { 'opacity': '1', 'width': '6vw' } ).fadeIn();
						$( '.second-lvl-php > div > img' ).css( { 'opacity': '1', 'width': '7vw' } ).fadeIn();
						$( '.program-info' ).text( $( '#second-info-php' ).text() ).fadeOut().fadeIn().css( 'color', '#1B8500' );
						break;
					case 13:
						$( '.first-lvl-php > div > img' ).css( 'width', '7vw' )
						$( '.second-lvl-php > div > img' ).css( 'width', '8vw' )
						$( '.third-lvl-php > div > img' ).css( { 'opacity': '1', 'width': '9vw' } ).fadeIn();
						$( '.program-info' ).text( $( '#third-info-php' ).text() ).fadeOut().fadeIn().css( 'color', '#1B8500' );
						break;
					case 28:
						$( '.first-lvl-php > div > img' ).css( 'width', '8vw' )
						$( '.second-lvl-php > div > img' ).css( 'width', '9vw' )
						$( '.third-lvl-php > div > img' ).css( 'width', '10vw' )
						$( '.fourth-lvl-php > div > img' ).css( { 'opacity': '1', 'width': '11vw' } ).fadeIn();
						$( '.program-info' ).text( $( '#fourth-info-php' ).text() ).fadeOut().fadeIn().css( 'color', '#1B8500' );
						move = 30;

						break;
					default:

				}
			}
		} else {
			if ( st < lastScrollTop ) {
				if ( move == 5 ) {
					move = -7;
				} else {
					// move -= 5;

					if ( move < 0 ) {
						move = -7;
					}
				}


			}
		}
		// console.log(move);
		lastScrollTop = st;


		//rocket mover
		$( '.rocket-holder' ).css( 'margin-top', move + 'vw' );
		$( '.rocket-holder' ).css( 'transition', 'margin 1200ms' );

	} )

	//java
	$( '.java-lvl' ).bind( "mousewheel", function ( event ) {
		var y = ( $( '.rocket-holder-java' ).offset().top ).toFixed( 0 );
		var st = $( this ).scrollTop();

		if ( moveJava < 30 ) {
			if ( st > lastScrollTop ) {
				moveJava += 5;
				switch ( moveJava ) {
					case 3:
						$( '.first-lvl-java > div > img' ).css( { 'opacity': '1', 'width': '6vw' } ).fadeIn();
						$( '.second-lvl-java > div > img' ).css( { 'opacity': '1', 'width': '7vw' } ).fadeIn();
						$( '.program-info-java' ).text( $( '#second-info-java' ).text() ).fadeOut().fadeIn().css( 'color', '#1B8500' );
						break;
					case 13:
						$( '.first-lvl-java > div > img' ).css( 'width', '7vw' )
						$( '.second-lvl-java > div > img' ).css( 'width', '8vw' )
						$( '.third-lvl-java > div > img' ).css( { 'opacity': '1', 'width': '9vw' } ).fadeIn();
						$( '.program-info-java' ).text( $( '#third-info-java' ).text() ).fadeOut().fadeIn().css( 'color', '#1B8500' );
						break;
					case 28:
						$( '.first-lvl-java > div > img' ).css( 'width', '8vw' )
						$( '.second-lvl-java > div > img' ).css( 'width', '9vw' )
						$( '.third-lvl-java > div > img' ).css( 'width', '10vw' )
						$( '.fourth-lvl-java > div > img' ).css( { 'opacity': '1', 'width': '11vw' } ).fadeIn();
						$( '.program-info-java' ).text( $( '#fourth-info-java' ).text() ).fadeOut().fadeIn().css( 'color', '#1B8500' );
						moveJava = 26;

						break;
					default:

				}
			}
		} else {
			if ( st < lastScrollTop ) {
				if ( moveJava == 5 ) {
					moveJava = -7;
				} else {
					// move -= 5;

					if ( moveJava < 0 ) {
						moveJava = -7;
					}
				}


			}
		}
		console.log( moveJava );
		lastScrollTop = st;


		//rocket mover
		$( '.rocket-holder-java' ).css( 'margin-top', moveJava + 'vw' );
		$( '.rocket-holder-java' ).css( 'transition', 'margin 1200ms' );

	} )

} );