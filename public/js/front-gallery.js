var slideIndex = 1;
showSlides( slideIndex );

function plusSlides( n ) {
	showSlides( slideIndex += n );
}

function currentSlide( n ) {
	showSlides( slideIndex = n );
}

function showSlides( n ) {
	var i;
	var slides = document.getElementsByClassName( "mySlides" );
	var dots = document.getElementsByClassName( "dot" );
	if ( n > slides.length ) {
		slideIndex = 1
	}
	if ( n < 1 ) {
		slideIndex = slides.length
	}
	for ( i = 0; i < slides.length; i++ ) {
		slides[ i ].style.display = "none";
		slides[ i ].classList.remove( "active-slide" );
		removeImg( slides[ i ] );
	}
	for ( i = 0; i < dots.length; i++ ) {
		dots[ i ].className = dots[ i ].className.replace( " active", "" );
	}
	slides[ slideIndex - 1 ].style.display = "block";
	slides[ slideIndex - 1 ].className += " active-slide";
	dots[ slideIndex - 1 ].className += " active";
	loadImg( slides[ slideIndex - 1 ] );
}

function loadImg( element ) {
	// $( element ).find( 'img' ).attr( 'src', $( element ).attr( 'data-loader' ) );

	$( element ).find( 'img' ).attr( 'src', $( element ).attr( 'data-src' ) );
	// $( element ).find( 'img' ).removeClass( 'big-loader' );
}

function removeImg( element ) {
	$( element ).find( 'img' ).attr( 'src', ' ' );
	// $( element ).find( 'img' ).addClass( 'big-loader' );
}