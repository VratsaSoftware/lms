$( document ).ready( function () {
	//3 dots showing options
	$( '.edit-right-menu' ).on( 'click', function () {
		var oldText = $( this ).parent().parent().find( '.stats-text' ).html();
		if ( !$( this ).next( '.edit-items-wrap' ).hasClass( 'box-opened' ) ) {
			$( this ).next( '.edit-items-wrap' ).css( 'display', 'flex' );
			$( this ).next( '.edit-items-wrap' ).addClass( 'box-opened' )
			$( this ).css( 'color', '#f00' );
			$( this ).find( 'i' ).removeClass( 'fas fa-ellipsis-v' );
			$( this ).find( 'i' ).addClass( 'fas fa-times' );
			// $(this).parent().parent().css('box-shadow', '0px 10px 50px rgba(7, 42, 68, 0.25)');
		} else {
			$( this ).find( 'i' ).removeClass( 'fas fa-times' );
			$( this ).find( 'i' ).addClass( 'fas fa-ellipsis-v' );
			$( this ).parent().parent().parent().find( '.create-form' ).fadeOut();
			$( this ).parent().parent().parent().find( '.create-form-work' ).fadeOut();
			$( this ).parent().parent().parent().find( '.create-form-hobbies' ).fadeOut();
			$( this ).parent().parent().parent().find( '.edit-edu' ).fadeOut();
			$( this ).parent().parent().parent().find( '.edit-work' ).fadeOut();
			$( this ).parent().parent().parent().find( '.live-edu' ).fadeIn();
			$( this ).parent().parent().parent().find( '.live-work' ).fadeIn();
			$( this ).parent().parent().parent().find( '.suggestion-ins-name' ).html( '' );
			$( this ).parent().parent().parent().find( '.auto-ins-name' ).html( '' );
			$( this ).next( '.edit-items-wrap' ).removeClass( 'box-opened' );
			$( this ).next( '.edit-items-wrap' ).css( 'display', 'none' );
			$( this ).css( 'color', '#000' );
			$( this ).parent().parent().find( '.edu-boxes' ).remove();
			$( this ).parent().parent().find( '.add-text' ).parent().remove();
			$( this ).parent().parent().find( '.save-edit-box' ).parent().remove();
			$( this ).next( '.edit-items-wrap' ).find( '.edit-items' ).find( '.pencil' ).find( 'a' ).removeClass( 'edit-opened' );

			if ( $( this ).hasClass( 'edu-edit-options' ) && !$( this ).parent().parent().parent().find( '.edu-no-info' ).is( ":visible" ) ) {
				$( this ).parent().parent().parent().find( '.edu-no-info' ).fadeIn();
				$( this ).parent().parent().parent().find( '.create-btn' ).fadeIn();
			}

			if ( $( this ).hasClass( 'work-edit-options' ) && !$( this ).parent().parent().parent().find( '.work-no-info' ).is( ":visible" ) ) {
				$( this ).parent().parent().parent().find( '.work-no-info' ).fadeIn();
				$( this ).parent().parent().parent().find( '.create-btn-work' ).fadeIn();
			}

			if ( $( this ).hasClass( 'interests-edit-options' ) && !$( this ).parent().parent().parent().find( '.hobbies-no-info' ).is( ":visible" ) ) {
				$( this ).parent().parent().parent().find( '.hobbies-no-info' ).fadeIn();
				$( this ).parent().parent().parent().find( '.create-btn-hobbie' ).fadeIn();
			}
		}
	} );

	//adding inputs
	$( '.edit-btn' ).on( 'click', function ( e ) {

		var oldText = $( this ).prev( 'span' ).text();

		if ( $( this ).parent().find( 'img' ).hasClass( 'profile-pic' ) && !$( this ).parent().find( 'img' ).hasClass( 'edit-img' ) ) {
			$( this ).parent().find( 'img' ).addClass( 'edit-img' );
			var oldSrc = $( this ).parent().find( 'img' ).attr( 'src' );
			$( this ).parent().find( 'img' ).after( '<p class="input-img"><input type="file" id="picture" name="picture" onChange="imagePreview(this);"></p>' );
			$( this ).find( 'i' ).removeClass( 'fa-pencil-alt' ).addClass( 'fa-save' );
			$( this ).removeClass( 'edit-btn' );
			e.preventDefault();
			$( this ).find( 'i' ).parent().after( '<button class="btn btn-danger btn-close-top-edit-img"><i class="fas fa-times"></i></button>' );
			$( '.btn-close-top-edit-img' ).on( 'click', function ( e ) {
				e.preventDefault();
				$( this ).prev( 'button' ).prev( '.input-img' ).remove();
				$( this ).fadeOut( 'fast' );
				$( this ).prev( 'button' ).find( 'i' ).removeClass( 'fa-save' ).addClass( 'fa-pencil-alt' );
				$( this ).parent().find( 'img' ).removeClass( 'edit-img' );
				$( this ).parent().find( 'img' ).attr( 'src', oldSrc );
				$( '.profile-pic' ).each( function ( index ) {
					$( this ).attr( 'src', oldSrc );
				} );
			} );
		}
		$( '.loader-wrapper' ).css( 'display', 'flex' ).fadeOut( 'slow' );
		if ( $( this ).hasClass( 'edit-btn' ) ) {
			e.preventDefault();
			$( this ).removeClass( 'edit-btn' );
			if ( $( this ).prev( 'span' ).hasClass( 'location' ) && $( '#location' ).not( ':visible' ) ) {
				$( this ).prev( 'span' ).html( $( this ).prev( 'span' ).html() + '<p class="edit-input"><input type="text" class="edit-user-items" id="location" name="location" value="' + oldText + '"></p>' );
				$( '#location' ).keypress( function ( e ) {
					if ( e.keyCode == 13 ) {
						e.preventDefault();
						$( '#submit-location' ).click();
					}
				} );

			}
			if ( $( this ).prev( 'span' ).hasClass( 'birthday' ) && $( '#dob' ).not( ':visible' ) ) {
				$( this ).prev( 'span' ).html( $( this ).prev( 'span' ).html() + '<p class="edit-input"><input type="date" class="edit-user-items" id="dob" name="dob" value="' + oldText + '"></p>' );
				$( '#dob' ).keypress( function ( e ) {
					if ( e.keyCode == 13 ) {
						e.preventDefault();
						$( '#submit-dob' ).click();
					}
				} );
				var datefield = document.createElement( "input" )

				datefield.setAttribute( "type", "date" )

				if ( datefield.type != "date" ) { //if browser doesn't support input type="date", load files for jQuery UI Date Picker
					var datePicker = document.createElement( "script" );
					datePicker.src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js";
					$( 'head' ).append( datePicker );
					$( 'head' ).append( '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css" as="style">' );
					$( this ).prev( 'span' ).find( '.edit-input' ).remove();
					$( this ).prev( 'span' ).html( $( this ).prev( 'span' ).html() + '<p class="edit-input"><input type="text" class="edit-user-items" id="dob" name="dob" value=""></p>' );
					setTimeout( function () {
						$( '#dob' ).datepicker( {
							format: 'yyyy-mm-dd'
						} );
					}, 200 );
				}
			}
			if ( $( this ).prev( 'span' ).hasClass( 'mail-txt' ) && $( '#email' ).not( ':visible' ) ) {
				$( this ).prev( 'span' ).html( $( this ).prev( 'span' ).html() + '<p class="edit-input"><input type="text" class="edit-user-items" id="email" name="email" value="' + oldText + '"></p>' );
				$( '#email' ).keypress( function ( e ) {
					if ( e.keyCode == 13 ) {
						e.preventDefault();
						$( '#submit-email' ).click();
					}
				} );

			}
			if ( $( this ).prev( 'span' ).hasClass( 'name' ) && $( '#name' ).not( ':visible' ) ) {
				$( this ).prev( 'span' ).html( $( this ).prev( 'span' ).html() + '<p class="edit-input"><input type="text" class="edit-user-items" id="name" name="name" value="' + oldText + '"></p>' );
				$( '#name' ).keypress( function ( e ) {
					if ( e.keyCode == 13 ) {
						e.preventDefault();
						$( '#submit-name' ).click();
					}
				} );
			}
			$( this ).find( 'i' ).removeClass( 'fa-pencil-alt' ).addClass( 'fa-save' );
			$( this ).find( 'i' ).parent().after( '<button class="btn btn-danger btn-close-top-edit"><i class="fas fa-times"></i></button>' );

			$( '.btn-close-top-edit' ).on( 'click', function ( e ) {
				e.preventDefault();
				$( this ).prev( 'button' ).prev( 'span' ).find( '.edit-input' ).remove();
				$( this ).fadeOut( 'fast' );
				$( this ).prev( 'button' ).find( 'i' ).removeClass( 'fa-save' ).addClass( 'fa-pencil-alt' );
				$( this ).prev( 'button' ).addClass( 'edit-btn' );
			} );
		}
	} );


	function updateUser() {
		$( '#update_user' ).submit();
	}

	//social networks adding fields
	$( '.social-edit' ).on( 'click', function ( e ) {
		if ( !$( this ).hasClass( 'editing' ) ) {
			e.preventDefault();
			$( this ).addClass( 'editing' );
			$( '.edit-social' ).show();
			$( '.edit-social' ).keypress( function ( e ) {
				if ( e.keyCode == 13 ) {
					e.preventDefault();
					$( '#submit-social' ).click();
				}
			} );
			$( this ).find( 'i' ).removeClass( 'fa-pencil-alt' ).addClass( 'fa-save' );
			$( '.loader-wrapper' ).css( 'display', 'flex' ).fadeOut();
		}
		$( '.btn-close-top-edit' ).on( 'click', function ( e ) {
			e.preventDefault();
			$( '.edit-social' ).fadeOut();
			$( '.social-edit' ).removeClass( 'editing' );
		} );
	} );

	//adding textareas to the boxes with options
	$( '.edit-bio' ).on( 'click', function ( e ) {
		e.preventDefault();
		var oldText = $( this ).parent().parent().find( '.bio-text' ).text();
		if ( !$( this ).hasClass( 'editing' ) ) {
			$( this ).addClass( 'editing' );
			if ( !$.trim( $( this ).parent().parent().find( '.bio-text' ).html() ) == '' ) {
				$( this ).parent().parent().find( '.bio-text' ).html( '<p class="edit-box"><textarea rows="10" cols="60" id="bio" name="bio" style="text-align:left">' + $( this ).parent().parent().find( '.bio-text' ).html() + '</textarea></p>' );
			} else {
				$( this ).parent().parent().find( '.bio-text' ).html( '<p class="edit-box"><textarea rows="10" cols="60" id="bio" name="bio" style="text-align:left"></textarea></p>' );
			}

			$( this ).find( 'i' ).removeClass( 'fa-pencil-alt' ).addClass( 'fa-save' );
		} else {
			$( '#lecturer-bio' ).submit();
			$( this ).find( 'i' ).removeClass( 'fa-save' ).addClass( 'fa-pencil-alt' );
			$( this ).parent().parent().find( '.bio-text' ).html( oldText );
			$( '.loader-wrapper' ).css( 'display', 'flex' ).fadeOut();
		}
	} );

	$( '.education-edit' ).on( 'click', function ( e ) {
		e.preventDefault();
		// $(this).parent().parent().parent().fadeOut().css('display', 'none');
		if ( !$( this ).hasClass( 'edit-opened' ) ) {
			$( this ).addClass( 'edit-opened' );
			$( '.live-edu' ).fadeOut();
			$( '.edit-edu' ).fadeIn();
			$( this ).parent().parent().parent().stop( true, true ).fadeOut().fadeIn();
		} else {
			$( this ).removeClass( 'edit-opened' );
		}
	} );

	$( '.create-btn' ).on( 'click', function ( e ) {
		e.preventDefault();
		$( '.edu-no-info' ).fadeOut();
		$( this ).fadeOut();
		$( '.create-form' ).fadeIn();
	} );

	var eduFormscloned = 0;
	$( '.edu-add-new' ).on( 'click', function ( e ) {
		e.preventDefault();
		$( '.edu-no-info' ).fadeOut();
		if ( $( '.create-form' ).is( ":visible" ) ) {
			$( '.create-form' ).last().after( $( '.create-form' ).last().clone( true ) );
			$( '.create-form' ).last().find( '.suggestion-ins-name' ).html( '' );
			$( '.create-form' ).last().find( '#institution_name' ).val( '' );
		}
		$( '.create-form' ).fadeIn();
		eduFormscloned++;
		if ( eduFormscloned > 5 ) {
			$( '.edu-add-new' ).fadeOut();
		}
	} );

	//work section
	$( '.work-edit' ).on( 'click', function ( e ) {
		e.preventDefault();
		$( '.live-work' ).fadeOut();
		$( '.edit-work' ).fadeIn();
		$( this ).parent().parent().parent().stop( true, true ).fadeOut().fadeIn();
	} );

	$( '.create-btn-work' ).on( 'click', function ( e ) {
		e.preventDefault();
		$( '.work-no-info' ).fadeOut();
		$( this ).fadeOut();
		$( '.create-form-work' ).fadeIn();
	} );


	var workFormsCloned = 0;
	$( '.work-add-new' ).on( 'click', function ( e ) {
		e.preventDefault();
		$( '.work-no-info' ).fadeOut();
		if ( $( '.create-form-work' ).is( ":visible" ) ) {
			$( '.create-form-work' ).last().after( $( '.create-form-work' ).last().clone( true ) );
			$( '.create-form-work' ).last().find( '.suggestion-ins-name' ).html( '' );
			$( '.create-form-work' ).last().find( '#institution_name' ).val( '' );
		}
		$( '.create-form-work' ).fadeIn();
		workFormsCloned++;
		if ( workFormsCloned > 5 ) {
			$( '.work-add-new' ).fadeOut();
		}
	} );

	// hobbies section
	$( '.int-edit' ).on( 'click', function ( e ) {
		e.preventDefault();
		$( '.live-hobbie' ).fadeOut();
		$( '.edit-hobbie' ).fadeIn();
		$( this ).parent().parent().parent().stop( true, true ).fadeOut().fadeIn();
	} );

	$( '.create-btn-hobbie' ).on( 'click', function ( e ) {
		e.preventDefault();
		$( '.hobbies-no-info' ).fadeOut();
		$( this ).fadeOut();
		$( '.create-form-hobbies' ).fadeIn();
	} );


	var hobbieFormsCloned = 0;
	$( '.hobbie-add-new' ).on( 'click', function ( e ) {
		e.preventDefault();
		$( '.int-no-info' ).fadeOut();
		if ( $( '.create-form-hobbies' ).is( ":visible" ) ) {
			$( '.create-form-hobbies' ).last().after( $( '.create-form-hobbies' ).last().clone( true ) );
			$( '.create-form-hobbies' ).last().find( '.other-interests' ).fadeOut();
			$( '.create-form-hobbies' ).last().find( '#hobbies-form-create' ).attr( 'id', 'hobbies-form-create-' + ( hobbieFormsCloned + 10 ) );
			$( '.create-form-hobbies' ).last().find( '#hobbies-form-create' ).attr( 'class', 'form-creation-cloning' );
			$( '.create-form-hobbies' ).last().find( '#hobbies-form-create-' + ( hobbieFormsCloned + 10 ) ).find( '#interests' ).fadeOut( 'fast' );
		}
		$( '.create-form-hobbies' ).fadeIn();
		hobbieFormsCloned++;
		if ( hobbieFormsCloned > 5 ) {
			$( '.hobbie-add-new' ).fadeOut();
		}
	} );
} )