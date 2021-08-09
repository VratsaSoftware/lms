$('.close-poll').on('click', function (e) {
    e.preventDefault();
    if ($('.poll-container').hasClass('poll-closed')) {
        $('.poll-container').removeClass('poll-closed');
        $('.poll-container').addClass('poll-opened');
        $('.poll-container').removeClass('col-md-3');
        $('.poll-container').addClass('col-md-4');

        $(this).text('x');
        $(this).removeClass('close-btn-poll');
        $(this).addClass('open-btn-poll');
    } else {
        $('.poll-container').removeClass('poll-opened');
        $('.poll-container').addClass('poll-closed');
        $('.poll-container').removeClass('col-md-4');
        $('.poll-container').addClass('col-md-3');

        $(this).text('+');
        $(this).removeClass('open-btn-poll');
        $(this).addClass('close-btn-poll');
    }
});

$('#vote-poll').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr('data-url');
    var poll_id = $(this).attr('data-poll-id');
    var oneOption = $(".poll-options-wrapper > label").find("input[type='radio']:checked").val();
    var manyOptions = $(".poll-options-wrapper > label").find("input[name='options']");
    var selectedOptions = [];
    $.each(manyOptions,function (k,v) {
        var option = $(v).is(':checked');
        if(option){
            selectedOptions.push(v.value);
        }
    });
    var data = false;
    if(oneOption){
        var data = oneOption;
    }

    if(manyOptions && selectedOptions.length > 0){
        var data = selectedOptions;
    }

    if(data) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data: {'data': data, 'poll_id': poll_id},
            success: function (response, textStatus, xhr) {
                if (xhr.status == 200) {
                    $('.poll-container').stop(true, true).fadeOut();
                    $('.poll-container').html('');
                    $('.poll-container').html(response);
                    $('.poll-container').stop(true, true).fadeIn();
                }
            }
        });
    }else{
        $('.poll-container').addClass('blink');
        setTimeout(function () {
            $('.poll-container').removeClass('blink');
        },800)
    }
});