$(document).ready(function() {
    $('.show-lection').show();

    if ($('#null-lections').val()) {
        $('.module-edit-btn').click(function() {
            $('.right-part').addClass('active');
        });

        $('.module-create-btn').click(function() {
            $('.right-part').addClass('active');
        });

        $('.add-lection-button').click(function() {
            $('.right-part').addClass('active');
        });
    }

    /* toggle video url input */
    $('.edit-btn-video-url').click(function() {
        $('.video-url-edit').toggle().stop();
        $('.video-edit-upload-message').toggle().stop();
    });

    $('.video-edit-url-input').click(function() {
        $('.video-url-edit').toggle();
        $('.video-edit-upload-message').toggle();
    });

    /* close create lection section */
    $('.btn-form-close').click(function() {
        $('.edit-lection').hide();
        $('.show-lection').show();
        $('.add-lection').hide();
        $('.module-edit').hide();
        $('.module-create').hide();
    });

    /* open create lection section */
    $('.add-lection-button').click(function() {
        $('.show-lection').hide();
        $('.add-lection').show();
        $('.edit-lection').hide();
        $('.module-edit').hide();
        $('.module-create').hide();
    });

    /* open edit lection section */
    $('.edit-lection-btn').click(function() {
        $('.show-lection').hide();
        $('.edit-lection').show();
        $('.add-lection').hide();
        $('.module-edit').hide();
        $('.module-create').hide();
    });

    $('.nav-lection').click(function() {
        $(".right-part.module-right").removeClass("module-right");
        $('.add-lection').hide();
        $('.edit-lection').hide();
        $('.show-lection').show();
        $('.module-edit').hide();
    });

    $('#tab_selector').change(function() {
        window.location.href = $("#tab_selector").val();
    });

    /* count lections */
    $('#right-side').mouseup(function() {
        var count = $(this).attr('data-countLections');

        for (var i = 1; i <= count; i++) {
            countFiles(i);
        }
    });

    /* delete lection file */
    $('.btn-delete-file').click(function() {
        var lectionId = $(this).attr('data-lection-file-id');
        var lectionType = $(this).attr('data-lection-file-type');

        var conf = confirm("???????????????? ???? ???????????? ???? ???????????????? ???????? ????????-" + lectionType + "?");
        if (conf == true) {
            if (lectionType == '??????????????????????') {
                var input = '<input type="hidden" name="slides_delete" value="delete" required>';
            } else if (lectionType == '????????') {
                var input = '<input type="hidden" name="demo_file_delete" value="delete" required>';
            } else if (lectionType == '??????????????') {
                var input = '<input type="hidden" name="homework_delete" value="delete" required>';
            }

            $('.file-delete-input').after().html(input);
            var formId = '#lection-delete-file-form-' + lectionId;

            $(formId).submit();
        } else {
            return false;
        }
    });

    /* delete lection */
    $('.delete-lection').click(function() {
        var lectionTitle = $(this).attr('data-lection-title');

        return confirm("???????????????? ???? ???????????? ???? ???????????????? ???????? ???????????? - " + lectionTitle + '?');
    });

    /* lection add files */
    $('.lection-files-btn').click(function() {
        var lectionId = $(this).attr('data-lection-id');
        var lectionFiles = '#lection-files' + lectionId;
        var fileType = '#file-type-' + lectionId;

        $(lectionFiles).hide();
        $(fileType).show();

        $('.file-type').change(function() {
            var fileType = '#file-type-' + lectionId;
            var slides = '#slides-' + lectionId;
            var homework = '#homework-' + lectionId;

            if ($(fileType).val() == '??????????????????????') {
                $('.demo-edit-url').hide();
                $('.available-files').show();
                $(slides).trigger('click');
            } else if ($(fileType).val() == '????????') {
                $('.demo-edit-url').show();
                $('.available-files').hide();
            } else if ($(fileType).val() == '??????????????') {
                $('.demo-edit-url').hide();
                $('.available-files').show();
                $(homework).trigger('click');

                $('#homework-end-edit-' + lectionId).attr('required', true);
            }
        });
    });

    /* Messages for what type of files are selected for upload */
    $('.lection-slides').change(function() {
        if ($(this).val() != null && !$('.lection-select-element').text().includes('??????????????????????')) {
            $('.lection-select-element').append(' ??????????????????????');
        }
    });

    $('.demo-edit-url-input').change(function() {
        if ($(this).val() != null && !$('.lection-select-element').text().includes('????????')) {
            $('.lection-select-element').append(' ????????');
        }
    });

    $('.lection-homework').change(function() {
        if ($(this).val() != null && !$('.lection-select-element').text().includes('??????????????')) {
            $('.lection-select-element').append(' ??????????????');
        }
    });

    /* lection files */
    function lectionFiles(i) {
        var fileType = '#file-type-' + i;
        var slides = '#slides-' + i;
        var demo = '#demo-' + i;
        var homework = '#homework-' + i;

        if ($(fileType).val() == '??????????????????????') {
            $(slides).trigger('click');
        } else if ($(fileType).val() == '????????') {
            $(demo).trigger('click');
        } else if ($(fileType).val() == '??????????????') {
            $(homework).trigger('click');
        }
    }

    /* count files */
    function countFiles(i) {
        var lectionFilesParse = "#lection-files" + i;
        var lectionFilesCountParse = "#lection-files-count" + i;
        $(lectionFilesParse).change(function() {
            var count = $(lectionFilesParse).get(0).files.length;
            $(lectionFilesCountParse).after().html('??????????????:' + count);
        });

        var videoFile = "#video-file" + i;
        var videoCountFile = "#video-file-count" + i;
        $(videoFile).change(function() {
            $(videoCountFile).after().html('<br>??????????????: 1');
        });
    }
});
