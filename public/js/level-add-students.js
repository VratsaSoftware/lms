 $( '.all-students-pool > div' ).mouseenter( function () {
 	showOptions( $( this ) );
 } );

 $( '.all-students-pool > div' ).mouseleave( function () {
 	$( this ).find( '.student-options' ).hide();
 } );

 var percentAdd = 0;
 var numStudents = $( '.added-student' ).length
 $( '.add-student > img' ).on( 'click', function () {
 	$( this ).parent().find( '.add-student' ).css( 'visibility', 'hidden' );
 	$( this ).parent().parent().parent().removeClass( 'removed-student' ).addClass( 'added-student' );
 	if ( numStudents > -1 ) {
 		numStudents = parseInt( $( '.added-student' ).length );
 		percentAdd = ( percentAdd + 3 );
 		$( '.progress-bar' ).css( 'width', percentAdd + '%' );
 		$( '.num-students-now' ).html( numStudents );
 	}
 	var userId = $( this ).attr( 'data' );
 	if($('#create_test').length){
		$('#create_test').append('<input type="hidden" id="user-' + userId + '" name="users[]" value="' + $(this).attr('data') + '">');
	}else {
		$('#create_module').append('<input type="hidden" id="user-' + userId + '" name="students[]" value="' + $(this).attr('data') + '">');
	}
 	showOptions( $( this ).parent().parent().parent() );
 } );

 $( '.remove-student' ).on( 'click', function () {
	 var userId = $( this ).attr( 'data' );

	 if($('#create_test').length) {
		 $('#create_test').find('#user-'+userId).remove();
	 }
 	if ( numStudents > -1 && numStudents !== 0 ) {
 		if ( $( this ).parent().parent().parent().hasClass( 'added-student' ) ) {
 			$( this ).parent().parent().parent().removeClass( 'added-student' ).addClass( 'removed-student' );
 			numStudents = parseInt( $( '.added-student' ).length );
 			percentAdd = ( percentAdd - 3 );
 			$( '.progress-bar' ).css( 'width', percentAdd + '%' );
 			$( '.num-students-now' ).html( numStudents );
 		}
 	}
 	$( this ).parent().parent().parent().removeClass( 'added-student' ).addClass( 'removed-student' );
 	var userId = $( this ).attr( 'data' );
 	$( '#create_module' ).find( '#user-' + userId ).remove();
 	showOptions( $( this ).parent().parent().parent() );
 	if ( $( this ).hasClass( 'ajax' ) ) {
 		if($('#create_test').length){
			removeStudentT($(this).parent().attr('data-url'), $(this).parent().attr('data-test'), $(this).attr('data'));
			location.reload();
 		}else {
			removeStudent($(this).parent().attr('data-url'), $(this).parent().attr('data-module'), $(this).attr('data'));
		}
 		numStudents = parseInt( $( '.one-student-holder' ).length );
 		percentAdd = ( numStudents * 3 );
 		$( '.progress-bar' ).css( 'width', percentAdd + '%' );
 		$( '.num-students-now' ).html( numStudents );
 	}
 } );

 function removeStudent( url, onModule, user ) {
 	$.ajax( {
 		headers: {
 			'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
 		},
 		type: "POST",
 		url: url,
 		data: {
 			module: onModule,
 			user: user,
 		},
 		success: function ( data, textStatus, xhr ) {
 			if ( xhr.status == 200 ) {
 				console.log( data );
 			}
 		}
 	} );
 }

 function removeStudentT( url, test, user ) {
	 $.ajax( {
		 headers: {
			 'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
		 },
		 type: "POST",
		 url: url,
		 data: {
			 test: test,
			 user: user,
		 },
		 success: function ( data, textStatus, xhr ) {
			 if ( xhr.status == 200 ) {
				 console.log( data );
			 }
		 }
	 } );
 }

 function showOptions( element ) {
 	$( element ).children( 'img' ).css( 'box-shadow', '0px 5px 20px rgba(7, 42, 68, 0.5)' );

 	if ( $( element ).hasClass( 'removed-student' ) && $( element ).hasClass( 'ajax' ) ) {
 		$( element ).fadeOut().remove();
 	}


 	if ( $( element ).hasClass( 'added-student' ) ) {
 		$( element ).find( '.add-student' ).css( 'visibility', 'hidden' );
 		$( element ).find( '.remove-student' ).css( 'visibility', 'visible' ).show();
 		$( element ).find( '.student-options' ).css( 'display', 'flex' ).show();
 		$( element ).find( '.student-options > .remove-student' ).css( 'visibility', 'visible' ).show();
 	}
 	if ( $( element ).hasClass( 'removed-student' ) ) {
 		$( element ).find( '.remove-student' ).css( 'visibility', 'hidden' );
 		$( element ).find( '.add-student' ).css( 'visibility', 'visible' ).show();
 		$( element ).find( '.student-options' ).css( 'display', 'flex' ).show();
 		$( element ).find( '.student-options > .add-student' ).css( 'visibility', 'visible' ).show();
 	} else {
 		$( element ).find( '.student-options' ).css( 'display', 'flex' ).show();
 	}
 }
