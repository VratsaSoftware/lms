$(document).ready(function() {
    if ($(window).width() < 992) {
        $(".mobile-courses-edit-profile").show();
        $('.mobile-profile-edit').css('left', '0');
    }

    /* edit work experience */
    $('.work-experience-btn').click(function() {
        var companyName = $(this).attr('data-work-experience-company');
        var y_from = $(this).attr('data-work-y_from');
        var y_to = $(this).attr('data-work-y_to');
        var position = $(this).attr('data-work-position');
        var id = $(this).attr('data-work-id');

        $('#work-company').attr('value', companyName);
        $('#y_from').attr('value', y_from);
        $('#y_to').attr('value', y_to);
        $('#work-position').attr('value', position);
        $('#work-id').attr('value', id);
    });

    /* edit education */
    $('.education-btn').click(function() {
        var education = $(this).attr('data-education');
        education = JSON.parse(education);

        var eduName = $(this).attr('data-edu-name');
        var specialty = $(this).attr('data-specialty');

        $('#edu-name').attr('value', eduName);
        $('#edu-y_from').attr('value', education.y_from);
        $('#edu-y_to').attr('value', education.y_to);
        $('#specialty').attr('value', specialty);
        $('#education-id').attr('value', education.id);
    });
});
