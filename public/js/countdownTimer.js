function timer( countDownDate, timerClass ) {
	// Get todays date and time
	var now = new Date().getTime();
	// Find the distance between now and the count down date
	var distance = countDownDate - now;
	// Time calculations for days, hours, minutes and seconds
	var days = Math.floor( distance / ( 1000 * 60 * 60 * 24 ) );
	var hours = Math.floor( ( distance % ( 1000 * 60 * 60 * 24 ) ) / ( 1000 * 60 * 60 ) );
	var minutes = Math.floor( ( distance % ( 1000 * 60 * 60 ) ) / ( 1000 * 60 ) );
	var seconds = Math.floor( ( distance % ( 1000 * 60 ) ) / 1000 );
	var timerClose = '';
	var daysText = 'дни';
	if ( days < 3 ) {
		timerClose = 'timer-close';
	}
	if ( days < 2 && days > 0 ) {
		daysText = 'ден';
	}
	var hoursText = 'часa';
	if ( hours < 2 && hours > 0 ) {
		hoursText = 'час';
	}
	var monuteText = 'минути';
	if ( minutes < 2 && minutes > 0 ) {
		monuteText = 'минута';
	}
	var secondsText = 'секунди';
	if ( seconds < 2 && seconds > 0 ) {
		secondsText = 'секунда';
	}
	// Output the result in an element with id="demo"
	$( timerClass ).html( "<span class='" + timerClose + "'>" + days + "<span class='timer-text'>" + daysText + " </span>" + hours + "<span class='timer-text'>" + hoursText + " </span>" + minutes + "<span class='timer-text'>" + monuteText + " </span>" + seconds + "<span class='timer-text'>" + secondsText + " </span></span>" );
	// If the count down is over, write some text
	if ( distance < 0 ) {
		clearInterval( start );
		$( timerClass ).html( " " );
		// $( timerClass ).parent().find( 'span' ).hide();
		$( timerClass ).parent().next( '.header-button' ).removeClass( 'no-show' ).show().fadeIn();
		$( timerClass ).html( "<span>Курсът е започнал</span>" );
	}
}