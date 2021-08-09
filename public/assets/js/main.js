$(document).ready(function() {
    $("#toggleNav").click(function() {
        $("#mySidenav").toggleClass("toggled");
    });

    $('.btn-green').on('click', function () {
        $('.btn-green.active').toggleClass("active");
    });

    $('.add-lection-button').on('click', function () {
        $('.add-lection-button.active').toggleClass("active");
    });

    $('.module-edit-btn').click('click', function () {
        $('.module-edit-btn.active').toggleClass("active");
    });

    $('.module-create-btn').click('click', function () {
        $('.module-create-btn.active').toggleClass("active");
    });

    $('#tab_selector').on('change', function () {
        $('.nav-tabs a').eq($(this).val()).tab('show');
    });

    /* datepicker */
    $(".date-input").datepicker("dd-mm-yy");

    /* datetimepicker */
    // $(".datetimepicker-input").datetimepicker({
    //     format: 'MM/DD/YYYY HH:mm'
    // });

    $('#right-side .tab-pane .close').on('click', function () {
        $("#right-side .tab-pane.active").removeClass("active");
    });

    $('.comment-toggler').on('click', function () {
        var toggler =  $(this).parent();
        toggler.prev().children().toggleClass("active");
        $(this).toggleClass("active");
    });

    if ($(window).width() < 992) {
        $("#right-side .tab-pane.active").removeClass("active");
        $('.btn-green.active').removeClass("active");
        $('.btn-green.active').removeClass("active");
        $('.module-create-btn.active').removeClass("active");
        $('.module-edit-btn.active').removeClass("active");
        $('.add-lection-button.active').removeClass("active");
    }
});
