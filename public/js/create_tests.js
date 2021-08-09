$(function () {
    var maxBanks = $('.test-nav > div').length + 25;
    $('.test-nav').css('min-height', '' + maxBanks + 'vw');
    $('.test-nav').css('max-height', '' + maxBanks + 'vw');
});


<!-- clicked effect on left navigation -->

$('.test-nav > .bank-holder').on('click', function () {
    $(this).prevAll().removeClass('test-clicked');
    $(this).nextAll().removeClass('test-clicked');
    $(this).addClass('test-clicked');
    $('#hidden-bank-id').remove();
    $('#create-question').append('<input id="hidden-bank-id" type="hidden" name="bank" value="' + $(this).attr('data-bank-id') + '">');
});


<!-- modal closing button to point the tests wrapper -->

$('.cf > a').mouseenter(function () {
    $(this).attr('href', '#dif-wrapper');
});

$('.cf > a').on('click', function(){
    location.reload();
});


$('.add-bank').on('click', function () {
    $('.copy > p').html($('.create-bank').html());
    $('.modal-content > .cf > div').html('<input class="btn send-bank" type="submit" value="Добави">');
    $('#modal').show();
    $('.send-bank').on('click', function () {
        $('.modal-content').find('.copy > p').find('form').submit();
    });
});

<!-- create questions modal -->

$('.add-question > a').on('click', function () {
    $('.copy > p').html($('.create-question').html());
    $('#modal').show();
});


// $('.edit-question').on('click', function (e) {
//     e.preventDefault();
//     var route = $(this).attr('data-route');
//     $('#editing_form').attr('action',route);
//     if (!$(this).parent().parent().parent().find('.question').hasClass('editing')) {
//         var bonusP = parseInt($(this).parent().parent().parent().find('.trophy-bonus').html());
//         $(this).parent().parent().parent().find('.question').find('span').append('<p class="edit-field"><input type="file" name="open_a_image"></p>');
//         $(this).parent().parent().parent().find('.question').append('<p class="edit-field"><textarea cols="40" id="question" name="question">' + $(this).parent().parent().parent().find('.question').text() + '</textarea></p><p class="q-options-diff"><select name="difficulty"><option disabled selected value="0">Трудност</option><option value="1">лесен</option><option value="2">нормален </option><option value="3">труден </option></select>&nbsp;&nbsp;бонус:&nbsp;<input type="number" class="bonus-points" name="bonus" min="0" value="' + bonusP + '"></p>').addClass('editing');
//
//         $('.bonus-points').bind("keyup change", function () {
//
//             if (parseInt($(this).val()) > 0) {
//                 $(this).parent().parent().parent().find('.answers-list').next('div').html('+' + $(this).val() + '&nbsp;<i class="fas fa-trophy"></i>');
//                 $(this).parent().parent().parent().find('.answers-list').next('div').fadeIn();
//             } else {
//                 $(this).parent().parent().parent().find('.answers-list').next('div').fadeOut();
//             }
//         });
//
//         $(this).parent().parent().parent().find('.answers-list').find('li').each(function (index) {
//             if ($(this).hasClass('corect-answer')) {
//                 $(this).append('<p class="edit-field"><a href="" class="icon-edit"><i class="fas fa-check-circle"></i></a><textarea class="edit-answers-list corect-answer-one" cols="40">' + $(this).html() + '</textarea><a href="" class="remove-q"><i class="fas fa-times"></i></a></p>');
//             } else {
//                 $(this).append('<p class="edit-field"><a href="" class="icon-edit"><i class="fas fa-check-circle"></i></a><textarea class="edit-answers-list" cols="40">' + $(this).html() + '</textarea><a href="" class="remove-q"><i class="fas fa-times"></i></a></p>');
//             }
//
//             $(this).find('.remove-q').on('click', function (e) {
//                 e.preventDefault();
//                 if ($(this).prev('.edit-answers-list').hasClass('corect-answer-one')) {
//                     var answersNum = parseInt($(this).parent().parent().parent().parent().parent().parent().find('.num-correct').html());
//                     if (answersNum >= 0) {
//                         answersNum = answersNum - 1;
//                         $(this).parent().parent().parent().parent().parent().parent().find('.num-correct').html(answersNum);
//                     }
//                 }
//                 $(this).parent().parent().remove();
//             });
//
//         });
//
//         $(this).parent().parent().parent().find('.answers-list').find('li').last().after('<div class="col-md-12 add-more-options-q"><a href=""><img src="./images/profile/add-icon.png" alt="add"></a></div>');
//         $('.add-more-options-q > a').on('click', function (e) {
//             e.preventDefault();
//             var newAnswer = $(this).parent().prev('li').clone(true);
//
//             newAnswer.find('.edit-answers-list').removeClass('corect-answer-one');
//             $(this).parent().prev('li').after(newAnswer);
//             $(this).parent().parent().find('li:last').removeClass('corect-answer');
//         });
//
//         $(this).parent().parent().parent().find('.correct-open').append('<p class="edit-field"><textarea cols="40">' + $(this).parent().parent().parent().find('.correct-open').html() + '</textarea></p>').addClass('editing');
//
//         $(this).parent().parent().parent().append('<div class="col-md-12 text-center send-edit"><button class="btn btn-success"><i class="fas fa-save"></i> Запази</button></div>');
//     } else {
//         $(this).parent().parent().parent().find('.answers-list').find('li').last().next('.add-more-options-q').remove();
//         $(this).parent().parent().parent().find('.question').find('.q-options-diff').remove();
//         $(this).parent().parent().parent().find('.question').find('.edit-field').remove();
//         $(this).parent().parent().parent().find('.correct-open').find('.edit-field').remove();
//         $(this).parent().parent().parent().find('.send-edit').remove();
//         $(this).parent().parent().parent().find('.answers-list').find('li').each(function (index) {
//             $(this).find('.edit-field').remove();
//         });
//         $(this).parent().parent().parent().find('.question').removeClass('editing');
//     }
//
//     $('.icon-edit').on('click', function (e) {
//         e.preventDefault();
//         var answersNum = parseInt($(this).parent().parent().parent().parent().parent().parent().find('.num-correct').html());
//         if (!$(this).next('.edit-answers-list').hasClass('corect-answer-one')) {
//             $(this).next('.edit-answers-list').addClass('corect-answer-one');
//             $(this).parent().parent().addClass('corect-answer');
//
//             if ($(this).parent().parent().parent().parent().parent().parent().find('span:nth-child(1)').find('i').hasClass('far fa-dot-circle')) {
//                 $(this).parent().parent().parent().find('.corect-answer').find('.edit-field').find('edit-answers-list').removeClass('corect-answer-one');
//                 $(this).parent().parent().parent().find('.corect-answer').removeClass('.corect-answer');
//                 $(this).parent().parent().prevAll('li').removeClass('corect-answer');
//                 $(this).parent().parent().prevAll('li').find('.edit-answers-list').removeClass('corect-answer-one');
//
//                 $(this).parent().parent().nextAll('li').removeClass('corect-answer');
//                 $(this).parent().parent().nextAll('li').find('.edit-answers-list').removeClass('corect-answer-one');
//                 $(this).parent().parent().addClass('corect-answer');
//
//                 answersNum = 1;
//                 $(this).parent().parent().parent().parent().parent().parent().find('.num-correct').html(answersNum);
//             } else {
//                 answersNum = answersNum + 1;
//
//                 $(this).parent().parent().parent().parent().parent().parent().find('.num-correct').html(answersNum);
//             }
//         } else {
//             if (answersNum !== 0) {
//                 answersNum = answersNum - 1;
//             }
//             $(this).next('.edit-answers-list').removeClass('corect-answer-one');
//             $(this).parent().parent().parent().parent().parent().parent().find('.num-correct').html(answersNum);
//             $(this).parent().parent().removeClass('corect-answer');
//         }
//     });
// });


$('.bank-holder').on("click", function () {
    var cloning = $(this).next('.data-container').clone(true);
    cloning.removeClass('no-show');
    $('#tests-content').html(cloning);
});


function frontEndValidation(form) {
    var validated = true;
    $('#'+form).find('.required').each(function( k,data ) {
        if ($(this).is('input:text') || $(this).attr('type') == 'number') {
            if ($(this).val().length == 0 || $(this).val() == '' || $(this).val() == ' ') {
                $(this).addClass('missed-field');
                validated = false;
            }
        } else {
            if ($(this).val() === "" || $(this).val() === "0" || $(this).val() === 0 || $(this).val() === null) {
                validated = false;
                $(this).addClass('missed-field');
            }
            if ($(this).length > 0) {
                if ($(this).val() === "" || $(this).val() === "0" || $(this).val() === 0 || $(this).val() === null) {
                    validated = false;
                    $(this).addClass('missed-field');
                }
            }
        }
    });
    return validated;
}