$(document).ready(function() {
    /* Application form - Change input css messages */
    changeValidation('input[name="names"]');
    changeValidation('input[name="phone"]');
    changeValidation('input[name="userage"]');
    changeValidation('input[name="email"]');
    changeValidation('textarea[name="suitable_candidate"]');
    changeValidation('textarea[name="suitable_training"]');
    changeValidation('textarea[name="accompliments"]');
    changeValidation('textarea[name="expecatitions"]');
    changeValidation('#occupation');
    changeValidation('#course-select');

    /* Application form - Click input css messages */
    clickValidation('input[name="names"]');
    clickValidation('input[name="phone"]');
    clickValidation('input[name="userage"]');
    clickValidation('input[name="email"]');
    clickValidation('textarea[name="suitable_candidate"]');
    clickValidation('textarea[name="suitable_training"]');
    clickValidation('textarea[name="accompliments"]');
    clickValidation('textarea[name="expecatitions"]');
    clickValidation('#occupation');
    clickValidation('#course-select');

    // --- functions --- //
    /* Change input css messages - function */
    function changeValidation(inputName) {
        $(inputName).keyup(function() {
            if ($(this).val() !== '') {
                correctCss(this);
            } else {
                errorCss(this);
            }
        });
    }

    /* Click input css messages - function */
    function clickValidation(inputName) {
        $('.submit-form').click(function() {
            if ($(inputName).val() !== '') {
                correctCss(inputName);
            } else {
                errorCss(inputName);
            }
        });
    }

    /**
	 * Correct css function
	 *
	 * @param inputId
	 */
    function correctCss(inputId) {
        $(inputId).css("border-color", "");
        $(inputId).css("box-shadow", "");
    }

    /**
	 * Error css function
	 *
	 * @param inputId
	 */
    function errorCss(inputId) {
        $(inputId).css("border-color", "#f00");
        $(inputId).css("box-shadow", "0 0 8px 0 #f00");
    }
});
