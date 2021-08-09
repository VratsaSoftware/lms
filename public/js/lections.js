$(function () {
    $('#modal').css('display', 'none');

    $('.video-lecture > a').on('click', function () {
        var videoUrl = $(this).next('.video-holder').find('.video-url').html();
        var arrayUrls = videoUrl.split(/\s+/);
        $.each(arrayUrls, function( index, value ) {
            var parsedVideo =  arrayUrls[index].split("=");
            if(parsedVideo[1] !== undefined){
                var noList = parsedVideo[1].split('&')[0];
            }else {
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
        $('.modal-header').find('h2').html($(this).next('.video-holder').find('.video-title').html());
        $('#modal').show();
        var userId = $(this).attr('data-user');
        if (userId < 1) {
            userId = null;
        }
        var videoId = $(this).attr('data-video-id');
        var url = $(this).attr('data-url');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data: {
                user: userId,
                videoId: videoId
            },
            success: function (data, textStatus, xhr) {
                console.log(data);
                if (xhr.status == 200) {
                    //success
                }
            }
        });
    });

    $('.comment > a').on('click', function () {
        $('.copy > p').html($(this).next('.comment-holder').html());
        $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" id="send_comment" value="Изпрати">');
        $('#modal').show();
        $('#send_comment').on('click', function () {
            $('#comment_form').submit();
        });
    });

    $('.read-more').on('click', function () {
        $('.modal-header').find('h2').html($(this).parent().parent().find('.lection-title').html());
        $('.copy > p').html($(this).attr('data'));
        $('#modal').show();
    });

    $('.upload-homework').on('click', function () {
        var action = $(this).attr('data-url');
        var lection = $(this).attr('data-lection');
        var loader = $(this).attr('data-loader');
        $('#modal').show();
        $('.modal-header > h2').text('');
        $('.modal-header > h2').text('Изпрати Домашно');
        $('.copy > p').html('');
        $('.copy > p').html('<form action="' + action + '" method="POST" id="homework-form" enctype="multipart/form-data" files="true"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><input type="hidden" name="lection" id="lection" value="' + lection + '"><label>Файл:</label><br><input type="file" name="homework" id="homework">(max:50mb,extension:zip,rar,txt)</form>');
        $('.modal-content > .cf > div').html('<input class="btn close-modal send-homework-form" type="submit" name="submit" value="Изпрати">');

        $('.send-homework-form').on('click', function () {
            var fileInput = $('#homework-form > #homework').val();
            if(fileInput.length){
                if(!$('#homework-form').hasClass('submited')){
                    $('#homework-form').addClass('submited');
                    $('#homework-form').fadeOut();
                    $('#homework-form').after('<p>Моля изчакайте файла се качва...</p><img src="'+loader+'">');
                    $('#homework-form').submit();
                }
            }
            $('#homework-form > #homework').css('border','1px solid #f00')
        });
    });

    $('.eval_homeworks').on('click', function () {
        var url = $(this).attr('data-url');
        var lection = $(this).attr('data-lection');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data: {
                lection: lection
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status == 200) {
                    $('.modal-header > h2').text('');
                    $('.modal-header > h2').text('Оцени Домашно');
                    $('.copy > p').html(data);
                    $('#modal').show();
                    console.log(data);
                }
            }
        });
    });

    $('.homework-comments').on('click', function () {
        $('#modal').show();
        $('.copy > p').html($(this).next('.comments-homework').html());
        $('.copy > p').find('.comments-homework').css('display', 'block');
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

});