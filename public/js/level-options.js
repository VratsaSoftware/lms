$(function () {
    $('.time-input').on('keyup', function () {
        if ($(this).val().length < 3) {
            if ($(this).val() > 24) {
                $(this).val(24);
            }
        } else {
            $(this).val(24);
        }
    });
    $('.time-minutes').on('keyup', function () {
        if ($(this).val().length < 3) {
            if ($(this).val() > 59) {
                $(this).val(59);
            }
        } else {
            $(this).val(59);
        }
    });
    var edit = false;
    $('.edit-lecture > a').on('click', function (e) {
        // e.preventDefault();
        var first_date = $(this).parent().parent().parent().parent().find('.first-date-no-show').html();
        var hours = $(this).parent().parent().parent().parent().find('.first-hours-no-show').html();
        var minutes = $(this).parent().parent().parent().parent().find('.first-minutes-no-show').html();
        var secondHours = $(this).parent().parent().parent().parent().find('.second-hours-no-show').html();
        var secondMinutes = $(this).parent().parent().parent().parent().find('.second-minutes-no-show').html();
        var second_date = $(this).parent().parent().parent().parent().find('.second-date-no-show').html();
        var homeworkEnd = $(this).parent().parent().parent().parent().find('.homework-end-no-show').html();

        if ($(this).parent().parent().parent().find('.lection-description').find('.read-more').length != 0) {
            var desc = $(this).parent().parent().parent().find('.lection-description').find('.read-more').attr('data');
        } else {
            var desc = $(this).parent().parent().parent().find('.lection-description').html();
        }
        var url = $(this).attr('data');
        var order = $(this).parent().parent().parent().parent().find('.lection-order').html();

        $('#modal').show();
        if (!edit) {
            $('.modal-header > h2').text('');
            $('.modal-header > h2').text('Редактирай');
            $('.copy > p').html('');
            $('.copy > p').append($('#edit-lection').clone(true).prop('id', 'edit-lection-now').show());
            $('#edit-lection-now').attr('action', url);

            $('#edit-lection-now').find('#title').val($(this).parent().parent().parent().find('span:nth-child(1)').html());
            $('#edit-lection-now').find('#first_date').val(first_date);
            $('#edit-lection-now').find('#first_time_hours').val(hours);
            $('#edit-lection-now').find('#first_time_minutes').val(minutes);
            $('#edit-lection-now').find('#second_time_hours').val(secondHours);
            $('#edit-lection-now').find('#second_time_minutes').val(secondMinutes);
            $('#edit-lection-now').find('#second_date').val(second_date);
            $('#edit-lection-now').find('#description').val(desc);
            $('#edit-lection-now').find('#order').val(order);
            $('#edit-lection-now').find('#homework_end').val(homeworkEnd);

            $('.modal-content > .cf > div').html('<input type="submit" name="submit" value="Изпрати" class="btn close-modal" id="send-edit-lection">');
            $('#send-edit-lection').on('click', function () {
                $('#edit-lection-now').submit();
            });
            edit = true;
        }
    });

    $('.read-more').on('click', function () {
        console.log('clicked');
        $('.modal-header').find('h2').html($(this).parent().parent().find('.lection-title').html());
        $('.copy > p').html($(this).attr('data'));
        $('#modal').show();
    });

    $('.add-video').on('click', function () {
        var action = $(this).attr('data-url');
        var lection = $(this).attr('data');
        $('#modal').show();
        $('.modal-header > h2').text('');
        $('.modal-header > h2').text('Добави Видео');
        $('.copy > p').html('');
        $('.copy > p').html('<form action="' + action + '" method="POST" id="video-form"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><input type="hidden" name="lection" id="lection" value="' + lection + '"><label>Линк:</label><br><input type="text" name="video" id="video"></form>');
        $('.modal-content > .cf > div').html('<input class="btn close-modal send-video-form" type="submit" name="submit" value="Изпрати">');
        $('.send-video-form').on('click', function () {
            $('#video-form').submit();
        });
    });

    $('.add-presentation').on('click', function () {
        var action = $(this).attr('data-url');
        var lection = $(this).attr('data');
        $('#modal').show();
        $('.modal-header > h2').text('');
        $('.modal-header > h2').text('Добави Презентация');
        $('.copy > p').html('');
        $('.copy > p').html('<form action="' + action + '" method="POST" id="slides-form" enctype="multipart/form-data" files="true"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><input type="hidden" name="lection" id="lection" value="' + lection + '"><label>Файл:</label><br><input type="file" name="slides" id="slides"></form>');
        $('.modal-content > .cf > div').html('<input class="btn close-modal send-slides-form" type="submit" name="submit" value="Изпрати">');

        $('.send-slides-form').on('click', function () {
            $('#slides-form').submit();
        });
    });

    $('.add-homework').on('click', function () {
        var action = $(this).attr('data-url');
        var lection = $(this).attr('data');
        $('#modal').show();
        $('.modal-header > h2').text('');
        $('.modal-header > h2').text('Добави Домашно');
        $('.copy > p').html('');
        $('.copy > p').html('<form action="' + action + '" method="POST" id="homework-form" enctype="multipart/form-data" files="true"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><input type="hidden" name="lection" id="lection" value="' + lection + '"><label>Файл:</label><br><input type="file" name="homework" id="homework"></form>');
        $('.modal-content > .cf > div').html('<input class="btn close-modal send-homework-form" type="submit" name="submit" value="Изпрати">');

        $('.send-homework-form').on('click', function () {
            $('#homework-form').submit();
        });
    });

    $('.add-demo').on('click', function () {
        var action = $(this).attr('data-url');
        var lection = $(this).attr('data');
        $('#modal').show();
        $('.modal-header > h2').text('');
        $('.modal-header > h2').text('Добави Демо');
        $('.copy > p').html('');
        $('.copy > p').html('<form action="' + action + '" method="POST" id="demo-form"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><input type="hidden" name="lection" id="lection" value="' + lection + '"><label>Линк:</label><br><input type="text" name="demo" id="demo"></form>');
        $('.modal-content > .cf > div').html('<input class="btn close-modal send-demo-form" type="submit" name="submit" value="Изпрати">');

        $('.send-demo-form').on('click', function () {
            $('#demo-form').submit();
        });
    });

    $('.add-lecture > div > a').on('click', function () {
        var action = $(this).attr('data-url');
        var order = $(this).attr('data-order');
        var module_id = $(this).attr('data-module');
        var oldTitle = $(this).attr('data-old-title');
        var oldFirst = $(this).attr('data-old-first');
        var oldSecond = $(this).attr('data-old-second');
        var oldDesc = $(this).attr('data-old-desc');
        var oldOrder = $(this).attr('data-old-order');
        var oldVideo = $(this).attr('data-old-video');
        var oldDemo = $(this).attr('data-old-demo');
        var oldFirstTime = $(this).attr('data-old-first-time');
        var oldSecondTime = $(this).attr('data-old-second-time');
        if (oldOrder.length > 0) {
            order = oldOrder;
        }
        var visibility = $('.course-visibility').first().clone(true).find(':selected').removeAttr('selected').end().html();
        $('#modal').show();
        $('.modal-header > h2').text('');
        $('.modal-header > h2').text('Добави Лекция');
        $('.copy > p').html('');
        $('.copy > p').html('<form id="create-lection" action="' + action + '" method="POST" enctype="multipart/form-data" files="true"><input type="hidden" name="module" id="module" value="' + module_id + '"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><p><label>Заглавие:<i class="fas fa-star-of-life req-star"></i></label><br><input type="text" name="title" id="title" value="' + oldTitle + '"></p><br><p><label>дата 1:<i class="fas fa-star-of-life req-star"></i></label><br><input type="date" id="first_date_create" value="' + oldFirst + '" name="first_date_create"><input type="tel" id="first_time_hours" name="first_time_hours" class="time-input" min="1" max="24" title="01 - 24">:<input type="tel" id="first_time_minutes" name="first_time_minutes" class="time-minutes" min="1" max="59" title="01-59"></p><br><p><label>дата 2:</label><br><input type="date" id="second_time" value="' + oldSecondTime + '" name="second_date_create"><input type="tel" id="second_time_hours" name="second_time_hours" class="time-input" min="1" max="24" title="01 - 24">:<input type="tel" id="second_time_minutes" name="second_time_minutes" class="time-minutes" min="1" max="59" title="01-59"></p><br><p><label>Описание:<i class="fas fa-star-of-life req-star"></i></label><br><textarea style="margin-top:1%" name="description" id="description">' + oldDesc + '</textarea></p><br><p><label for="order">Поредност:</label><input type="tel" name="order" id="order" value="' + order + '"></p><br><p><label>Презентация</label><br><input type="file" name="slides" id="slides"></p><br><p><label>Видео:</label><br><input type="text" name="video" id="video" value="' + oldVideo + '"></p><br><p><label>Критерии за домашно</label><br><input type="file" name="homework" id="homework"></p><br><p><label for="demo">Демо</label><input type="text" name="demo" id="demo" value="' + oldDemo + '"><p><br><p><label for="homework_end">Срок за домашни</label><br/><input type="date" name="homework_end"></p><p><label for="visibility">Видимост</label><select class="section-el-bold" name="visibility" id="visibility">' + visibility + '</select></p><br><p><label>Тип:</label><select name="type" class="section-el-bold" id="type"><option value="">Лекция</option><option value="other">Тест/Друго</option></select></p></form>');
        $('.time-input').on('keyup', function () {
            if ($(this).val().length < 3) {
                if ($(this).val() > 24) {
                    $(this).val(24);
                }
            } else {
                $(this).val(24);
            }
        });
        $('.time-minutes').on('keyup', function () {
            console.log($(this).val().length);
            if ($(this).val().length < 3) {
                if ($(this).val() > 59) {
                    $(this).val(59);
                }
            } else {
                $(this).val(59);
            }
        });
        $('.modal-content > .cf > div').html('<input class="btn close-modal create-lection-btn" type="submit" name="submit" value="Добави">');
        $('.create-lection-btn').on('click', function () {
            $('#create-lection').submit();
        });
    });

    $('.comments-view > a').on('click', function () {
        $('#modal').show();
        $('.copy > p').html($(this).next('.comments').html());
    });

    // EXISTING
    $('.video-exist').on('click', function () {
        var action = $(this).attr('data-url');
        var videoUrl = $(this).attr('data');
        var arrayUrls = videoUrl.split(/\s+/);
        $.each(arrayUrls, function( index, value ) {
            var parsedVideo =  arrayUrls[index].split("=");
            if(parsedVideo[1] !== undefined){
                var noList = parsedVideo[1].split('&')[0];
            }else{
                noList = parsedVideo;
            }
            var embeddedUrl = "https://www.youtube.com/embed/"+noList;
            if($('.copy > p').find('iframe').length){
                $('.copy > p').find('iframe').after('<iframe width="auto" height="auto" src="" class="video-'+index+'"></iframe>')
                $('.copy > p').find('.video-'+index).attr('src',embeddedUrl);
            }else{
                $('.copy > p').html('<iframe width="auto" height="auto" src="" class="video-'+index+'"></iframe>');
                $('.copy > p').find('.video-'+index).attr('src',embeddedUrl);
            }
            parsedVideo = '';
            embeddedUrl = '';
        });

        $('.copy > p').append('<form action="' + action + '" id="change_video" method="POST"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><input name="_method" type="hidden" value="PUT"><label>Линк:</label><br><input type="text" name="video" id="video" value="' + $(this).attr('data') + '">');
        $('.modal-header').find('h2').html($(this).next('.video-holder').find('.video-title').html());
        $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" id="change_video_btn" value="Изпрати"></form>');
        $('#modal').show();

        $('#change_video_btn').on('click', function () {
            $('#change_video').submit();
        });
    });

    $('.slides-exist').on('click', function () {
        var action = $(this).attr('data-url');
        $('.copy > p').html('<form action="' + action + '" id="change_slides" method="POST" enctype="multipart/form-data" files="true"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><input name="_method" type="hidden" value="PUT"><label>Презентация: <a class="view-lection-presentation" href="' + $(this).attr('data') + '">виж</a></label><br><input type="file" name="slides" id="slides" value="' + $(this).attr('data') + '">');
        $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" id="change_slides_btn" value="Изпрати"></form>');
        $('#modal').show();

        $('#change_slides_btn').on('click', function () {
            $('#change_slides').submit();
        });
    });

    $('.homework-exist').on('click', function () {
        var action = $(this).attr('data-url');
        $('.copy > p').html('<form action="' + action + '" id="change_slides" method="POST" enctype="multipart/form-data" files="true"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><input name="_method" type="hidden" value="PUT"><label>Домашно: <a class="view-lection-presentation" href="' + $(this).attr('data') + '" target=" _blank">виж</a></label><br><input type="file" name="homework" id="homework" value="' + $(this).attr('data') + '">');
        $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" id="change_slides_btn" value="Изпрати"></form>');
        $('#modal').show();

        $('#change_slides_btn').on('click', function () {
            $('#change_slides').submit();
        });
    });

    $('.demo-exist').on('click', function () {
        var action = $(this).attr('data-url');
        $('.copy > p').html('<form action="' + action + '" id="change_slides" method="POST" enctype="multipart/form-data" files="true"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><input name="_method" type="hidden" value="PUT"><label>Демо: <a class="view-lection-presentation" href="' + $(this).attr('data') + '" target=" _blank">виж</a></label><br><input type="text" name="demo" id="demo" value="' + $(this).attr('data') + '">');
        $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" id="change_slides_btn" value="Изпрати"></form>');
        $('#modal').show();

        $('#change_slides_btn').on('click', function () {
            $('#change_slides').submit();
        });
    });

    $('.video-count').on('click', function () {
        var action = $(this).attr('data-url');
        $('.copy > p').html('');
        $(this).find('.watched-users').each(function (index) {
            $('.copy > p').html($('.copy > p').html() + '<p>' + $(this).text() + '</p>');
        });
        $('#modal').show();
    });

    //empty modal on close button click
    $('.close-modal').on('click', function () {
        closeModal();
    });

    $(document).keyup(function (e) {
        if (e.key === "Escape" && $('#modal').is(':visible')) {
            closeModal();
        }
    });

    function closeModal() {
        $('#modal').hide();
        $('.copy > p').html(' ');
        $('.modal-content > .cf > div').html(' ');
        edit = false;
        $('#edit-lection-now').remove();
    }

    $('.add-by-mail').on('click', function () {
        $('#addStudent').submit();
    });

});