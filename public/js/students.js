$( document ).ready( function () {
	var hiddenstudents = $( '.hidden-students' ).children().length;
	var time = 1000;
	var student = 4;
	var oldRand;

	setInterval( function () {
		randStudents()
	}, 10000 );

	function randStudents() {
		var randid = randomNum( 1, 3 );
		if ( randid !== oldRand ) {
			if ( hiddenstudents != 0 && student < ( hiddenstudents + 4 ) ) {
				var hiddenimg = $( '.student-' + student + ' > img' ).attr( 'src' );
				var hiddencomm = $( '.student-' + student + ' .student-comment' ).text();
				var hiddenname = $( '.student-' + student + ' .student-name' ).text();

				$( '.student-' + randid ).fadeOut().fadeIn();

				var oldimg = $( '.student-' + randid + ' > img' ).attr( 'src' );
				$( '.student-' + randid + ' > img' ).attr( 'src', hiddenimg );

				var oldcomm = $( '.student-' + randid + ' .student-comment' ).text();
				$( '.student-' + randid + ' .student-comment' ).text( hiddencomm );

				var oldname = $( '.student-' + randid + ' .student-name' ).text();
				$( '.student-' + randid + ' .student-name' ).text( hiddenname );

				$( '.student-' + student + ' > img' ).attr( 'src', oldimg );
				$( '.student-' + student + ' .student-comment' ).text( oldcomm );
				$( '.student-' + student + ' .student-name' ).text( oldname );
				oldRand = randid;
				student++;
			} else {
				student = 4;
			}
		} else {
			randStudents();
		}
	}

	function randomNum( min, max ) {
		return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
	}

	$( '.first-student , .second-student, .third-student' ).dblclick( function () {
		randStudents();
	} )
} );