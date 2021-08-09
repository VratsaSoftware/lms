$( function () {
	var slider1 = $( ".option1" );
	var output = $( "#option1-val1" );
	output.html( slider1.val() + slider1.attr('data-type') ); // Display the default slider value

	slider1.on( 'input', function () {
		output.html( this.value + slider1.attr('data-type') );
	} );

	var slider2 = $( ".option2" );
	var output2 = $( "#option2-val2" );
	output2.html( slider2.val() + slider2.attr('data-type') ); // Display the default slider value

	slider2.on( 'input', function () {
		output2.html( this.value + slider2.attr('data-type') );
	} );

	var slider3 = $( ".option3" );
	var output3 = $( "#option3-val3" );
	output3.html( slider3.val() + '%' ); // Display the default slider value

	slider3.on( 'input', function () {
		output3.html( this.value + '%' );
	} );

	var slider4 = $( ".option4" );
	var output4 = $( "#option4-val4" );
	output4.html( slider4.val() + '%' ); // Display the default slider value

	slider4.on( 'input', function () {
		output4.html( this.value + '%' );
	} );

	var slider5 = $( ".option5" );
	var output5 = $( "#option5-val5" );
	output5.html( slider5.val() + '%' ); // Display the default slider value

	slider5.on( 'input', function () {
		output5.html( this.value + '%' );
	} );

	var slider6 = $( ".option6" );
	var output6 = $( "#option6-val6" );
	output6.html( slider5.val() + '%' ); // Display the default slider value

	slider6.on( 'input', function () {
		output6.html( this.value + '%' );
	} );
} );