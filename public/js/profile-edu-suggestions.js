$('.institution_name').bind('input keypress mouseenter', function () {
    var inputval = $(this).val();
    var input = $(this);
    inputval = inputval.length;
    var type = 'institution';
    var url = $(this).attr('data-url');
    if (inputval > 3) {
        getSuggestions(input, inputval, type, $(this).val(), url);
    }

    $('.auto-ins-name').on('click', function () {
        $(this).prev('.institution_name').val($(this).text());
    });

    $('.auto-ins-name').bind('mouseleave mouseout focusout', function () {
        $(this).parent().html('');
    });
});

$('.institution_name').keyup(function () {
    var inputval = $(this).val();
    inputval = inputval.length;
    var input = $(this);
    var type = 'institution';
    if (!$(this).val() && inputval < 1 && inputval == 0) {
        $(this).next('.suggestion-ins-name').html('');
    }
});

$('#edu_type_live').change(function () {
    if($(this).find("option:selected").text() == 'Сертификат'){
        if(!$('#course-certificate').is(':visible')) {
            $('#course-certificate').fadeIn('fast').show();
        }
        $('#edu_institution_type_live').fadeOut('fast');
    }else{
        $('#edu_institution_type_live').fadeIn('fast');
        $('#course-certificate').fadeOut('fast').hide();
    }

    if($(this).find("option:selected").text() == 'Магистърска степен' || $(this).find("option:selected").text() == 'Докторска степен' || $(this).find("option:selected").text() == 'Бакалавър') {
        $("#edu_institution_type_live").find("option:selected").attr("selected",false);
        $("#edu_institution_type_live > option[value='университет']").attr("selected", true);
    }

    if($(this).find("option:selected").text() == 'Професионално Образование' ) {
        $("#edu_institution_type_live").find("option:selected").attr("selected",false);
        $("#edu_institution_type_live > option[value='професионална гимназия']").attr("selected", true);
    }

    if($(this).find("option:selected").text() == 'Средно Образование' ) {
        $("#edu_institution_type_live").find("option:selected").attr("selected",false);
        $("#edu_institution_type_live > option[value='гимназия']").attr("selected", true);
    }
});

//specialties suggestions
$('.specialty').bind('input keypress mouseenter', function () {
    var inputval = $(this).val();
    var input = $(this);
    inputval = inputval.length;
    var type = 'specialty';
    var url = $(this).attr('data-url');
    if (inputval > 3) {
        getSuggestions(input, inputval, type, $(this).val(), url);
    }

    $('.auto-ins-name-specialty').on('click', function () {
        $(this).parent().prev('.specialty').val($(this).text());
    });

    $('.auto-ins-name-specialty').bind('mouseleave mouseout focusout', function () {
        $(this).parent().html('');
    });
});

$('.specialty').keyup(function () {
    var inputval = $(this).val();
    inputval = inputval.length;
    var input = $(this);
    var type = 'specialty';
    if (!$(this).val() && inputval < 1 && inputval == 0) {
        $(this).next('.suggestion-ins-name').html('');
    }
});

//ajax call for suggestions accepts the input who needs suggestion, length of the letters, type of information, and the string to search for
function getSuggestions(input, inputLength, type, search, url) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: url,
        data: {
            search: search,
            type: type
        },
        success: function (data, textStatus, xhr) {
            if (data.length > 0 && inputLength > 0 && inputLength !== 0) {
                input.next('.suggestion-ins-name').html('');
                $.each(data, function () {
                    $.each(this, function (k, v) {
                        if (input.is(":focus")) {
                            if (input.hasClass('institution_name')) {
                                input.next('.suggestion-ins-name').append('<p class="auto-ins-name">' + v + '</p>');
                                $('.auto-ins-name').on('click', function () {
                                    input.val($(this).text());
                                    $(this).parent().html('');
                                });
                            } else {
                                input.next('.suggestion-ins-name').append('<p class="auto-ins-name-specialty">' + v + '</p>');
                                $('.auto-ins-name-specialty').on('click', function () {
                                    input.val($(this).text());
                                    $(this).parent().html('');
                                });
                            }
                        }
                    });
                });
            } else {
                input.next('.suggestion-ins-name').html('');
            }
        }
    });
}