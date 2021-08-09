$( function () {

	$( "#tabs" ).tabs();
	$( '#ui-id-1' ).on( 'click', function () {
		$( '.info-php-first' ).fadeOut().fadeIn();
		// $('.first-lvl').css('display','flex').fadeOut().fadeIn();
		// $('.second-lvl').css('display','flex').fadeOut().fadeIn();
		// $('.third-lvl').css('display','flex').fadeOut().fadeIn();
		// $('.fourth-lvl').css('display','flex').fadeOut().fadeIn();
		$( '.rocket-holder-java' ).css( 'display', 'none' );
		$( '.rocket-holder' ).fadeIn();
		$( '.rocket-text' ).fadeIn();
	} );

	$( '#ui-id-2' ).on( 'click', function () {
		$( '.info-java-first' ).fadeOut().fadeIn();
		// $('.java-first-lvl').css('display','flex').fadeOut().fadeIn();
		// $('.java-second-lvl').css('display','flex').fadeOut().fadeIn();
		// $('.java-third-lvl').css('display','flex').fadeOut().fadeIn();
		// $('.java-fourth-lvl').css('display','flex').fadeOut().fadeIn();
		$( '.rocket-holder' ).css( 'display', 'none' );
		$( '.rocket-holder-java' ).fadeIn();
		$( '.rocket-text' ).fadeIn();
	} );


	var moving = -10;
	var movingJava = -10;
	var clicked = 0;
	var clickedJava = 0;
	var fly = 0;
	var flyJava = 0;
	$( '.rocket-holder' ).mousedown( function ( event ) {
		clicked = 1;
		event.preventDefault()

	} )

	$( document ).mouseup( function () {
		clicked = 0;
		// alert('up')
	} )

	//php
	$( '.rocket-holder' ).mousemove( function ( event ) {
		// console.log(clicked);
		var rocketOff = $( '.rocket' ).offset();
		// console.log((event.pageY-100)+'/'+rocketOff.top);
		if ( clicked == 1 ) {
			if ( ( event.pageY - 50 ) > rocketOff.top ) {
				moving += 0.6;
				$( '.program-info' ).css( 'color', '#1B8500;' );
			} else if ( ( event.pageY - 25 ) < rocketOff.top ) {
				moving -= 0.6;
				$( '.program-info' ).css( 'color', '#ff4c4c' );
			}

			if ( moving < -10 ) {
				moving = -10;
			}

			if ( moving < -2 && moving < 4 ) {
				$( '.first-lvl' ).removeClass( 'hide-lvl' );
				$( '.first-lvl' ).addClass( 'show-lvl' );

				$( '.rocket-text' ).css( 'display', 'none' );

				$( 'body , html' ).stop( true, false ).animate( {
					scrollTop: ( $( "#details" ).offset().top - 1500 )
				}, 2000 );
			}

			if ( moving > 4 && moving < 15 ) {
				$( '.second-lvl' ).removeClass( 'hide-lvl' );
				$( '.second-lvl' ).addClass( 'show-lvl' );
				if ( fly < 1 ) {
					$( '.first-lvl > div > img' ).css( 'min-width', '4vw' );
				}

				$( 'body , html' ).stop( true, false ).animate( {
					scrollTop: ( $( "#details" ).offset().top - 1300 )
				}, 2000 );

			}

			if ( moving > 18 && moving < 30 ) {
				$( '.third-lvl' ).removeClass( 'hide-lvl' );
				$( '.third-lvl' ).addClass( 'show-lvl' );
				if ( fly < 1 ) {
					$( '.first-lvl > div > img' ).css( 'min-width', '5vw' );
					$( '.second-lvl > div > img' ).css( 'min-width', '9vw' );
				}
				$( 'body , html' ).stop( true, false ).animate( {
					scrollTop: ( $( "#details" ).offset().top - 1100 )
				}, 2000 );

			}

			if ( moving > 33 && moving < 53 ) {
				$( '.fourth-lvl' ).removeClass( 'hide-lvl' );
				$( '.fourth-lvl' ).addClass( 'show-lvl' );
				if ( fly < 1 ) {
					$( '.first-lvl > div > img' ).css( 'min-width', '6vw' );
					$( '.second-lvl > div > img' ).css( 'min-width', '10vw' );
					$( '.third-lvl > div > img' ).css( 'min-width', '11vw' );
				}

				$( 'body , html' ).stop( true, false ).animate( {
					scrollTop: ( $( "#details" ).offset().top - 900 )
				}, 2000 );

			}

			if ( moving > 53 ) {
				moving = 53;
				fly = 1;
				$( this ).css( 'margin-top', '' + moving + 'vw' );
				$( '.first-lvl > div > img' ).attr( 'class', 'finished-border' );
				$( '.second-lvl > div > img' ).attr( 'class', 'finished-border' );
				$( '.third-lvl > div > img' ).attr( 'class', 'finished-border' );
				$( '.fourth-lvl > div > img' ).attr( 'class', 'finished-border' );
			} else {
				$( this ).css( 'margin-top', '' + moving + 'vw' );
				$( this ).css( 'transition', 'margin 50ms' );
				// $('.rocket-holder').css('margin-top', moving+'vw');
			}
			console.log( moving );
		}

	} );


	$( '.rocket-holder-java' ).mousedown( function ( event ) {
		clickedJava = 1;
		event.preventDefault()
	} )

	$( document ).mouseup( function () {
		clicked = 0;
		clickedJava = 0;
		// alert('up')
	} )

	//java
	$( '.rocket-holder-java' ).mousemove( function ( event ) {
		// console.log(clicked);
		var rocketOff = $( '.rocket-java' ).offset();
		// console.log((event.pageY-100)+'/'+rocketOff.top);
		if ( clickedJava == 1 ) {
			if ( ( event.pageY - 50 ) > rocketOff.top ) {
				movingJava += 0.6;
				$( '.program-info' ).css( 'color', '#1B8500;' );
			} else if ( ( event.pageY - 25 ) < rocketOff.top ) {
				movingJava -= 0.6;
				$( '.program-info' ).css( 'color', '#ff4c4c' );
			}

			if ( movingJava < -10 ) {
				movingJava = -10;
			}

			if ( movingJava < -2 && movingJava < 4 ) {
				$( '.java-first-lvl' ).removeClass( 'hide-lvl' );
				$( '.java-first-lvl' ).addClass( 'show-lvl' );

				$( '.rocket-text' ).css( 'display', 'none' );

				$( 'body , html' ).stop( true, false ).animate( {
					scrollTop: ( $( "#details" ).offset().top - 1500 )
				}, 2000 );
			}

			if ( movingJava > 4 && movingJava < 15 ) {
				$( '.java-second-lvl' ).removeClass( 'hide-lvl' );
				$( '.java-second-lvl' ).addClass( 'show-lvl' );
				if ( flyJava < 1 ) {
					$( '.java-first-lvl > div > img' ).css( 'min-width', '4vw' );
				}

				$( 'body , html' ).stop( true, false ).animate( {
					scrollTop: ( $( "#details" ).offset().top - 1300 )
				}, 2000 );

			}

			if ( movingJava > 18 && movingJava < 30 ) {
				$( '.java-third-lvl' ).removeClass( 'hide-lvl' );
				$( '.java-third-lvl' ).addClass( 'show-lvl' );
				if ( flyJava < 1 ) {
					$( '.java-first-lvl > div > img' ).css( 'min-width', '5vw' );
					$( '.java-second-lvl > div > img' ).css( 'min-width', '9vw' );
				}

				$( 'body , html' ).stop( true, false ).animate( {
					scrollTop: ( $( "#details" ).offset().top - 1100 )
				}, 2000 );
			}

			if ( movingJava > 33 && movingJava < 53 ) {
				$( '.java-fourth-lvl' ).removeClass( 'hide-lvl' );
				$( '.java-fourth-lvl' ).addClass( 'show-lvl' );
				if ( flyJava < 1 ) {
					$( '.java-first-lvl > div > img' ).css( 'min-width', '6vw' );
					$( '.java-second-lvl > div > img' ).css( 'min-width', '10vw' );
					$( '.java-third-lvl > div > img' ).css( 'min-width', '11vw' );
				}

				$( 'body , html' ).stop( true, false ).animate( {
					scrollTop: ( $( "#details" ).offset().top - 900 )
				}, 2000 );
			}

			if ( movingJava > 53 ) {
				movingJava = 53;
				flyJava = 1;
				$( this ).css( 'margin-top', '' + movingJava + 'vw' );
				$( '.java-first-lvl > div > img' ).attr( 'class', 'finished-border' );
				$( '.java-second-lvl > div > img' ).attr( 'class', 'finished-border' );
				$( '.java-third-lvl > div > img' ).attr( 'class', 'finished-border' );
				$( '.java-fourth-lvl > div > img' ).attr( 'class', 'finished-border' );
			} else {
				$( this ).css( 'margin-top', '' + movingJava + 'vw' );
				$( this ).css( 'transition', 'margin 50ms' );
				// $('.rocket-holder').css('margin-top', moving+'vw');
			}
			// console.log(moving);
		}
	} );

} );