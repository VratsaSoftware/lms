$( function () {
	var showed = false;
    var lang = $('.b-description_readmore_button').attr('data-lang');
	$( '.b-description_readmore_button' ).on( 'click', function () {
		if ( !showed ) {
			var appear = 100;
			$( '.sponsors-logos>div:nth-child(n+5)' ).each( function ( k, v ) {
                console.log(lang);
				if ( $( this ).find( 'img' ).length ) {
					$( this ).find( 'img' ).attr( 'src', $( this ).attr( 'data-img' ) );
				}
				$( this ).stop( true, true ).delay( appear ).fadeIn( 'slow' );
				appear += 100;
			} );
			setTimeout( function () {
                if(lang !== 'en'){
				    $( '.b-description_readmore_button' ).html( 'Скрий' );
                }else{
                    $( '.b-description_readmore_button' ).html( 'hide' );
                }
				showed = true;
			}, appear );

		} else {
			var disappear = $( '.sponsors-logos>div:nth-child(n+5)' ).length * 100;
			setTimeout( function () {
                if(lang !== 'en'){
				    $( '.b-description_readmore_button' ).html( 'Покажи още' );
                }else{
                    $( '.b-description_readmore_button' ).html( 'show more' );
                }
				showed = false;
				if ( $( this ).find( 'img' ).length ) {
					$( this ).find( 'img' ).attr( 'src', ' ' );
				}
			}, disappear );
			$( '.sponsors-logos>div:nth-child(n+5)' ).each( function ( k, v ) {
				$( this ).stop( true, true ).delay( disappear ).fadeOut( 'slow' );
				disappear -= 100;
			} );
		}
	} );
} );
