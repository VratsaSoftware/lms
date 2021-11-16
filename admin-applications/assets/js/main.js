$(document).ready(function () {

    $("#toggleNav").click(function () {
        $("#mySidenav").toggleClass("toggled");
    });

    $("#toggleTEST").click(function () {
        $("#mySidetest").toggleClass("toggled-test-msg");
        $("#test-msg").toggleClass("test-msg");
        $(".pill-test").toggleClass("pill-test-2");
        $('#test-time').toggle();
    });

    $('.btn-green').on('click', function () {
        $('.btn-green.active').toggleClass("active");
    });

    $('#tab_selector').on('change', function () {
        $('.nav-tabs a').eq($(this).val()).tab('show');
    });

    $(".date-input").datepicker("dd-mm-yy");

    $('#right-side .tab-pane .close').on('click', function () {
        $("#right-side .tab-pane.active").removeClass("active");
    });
    $('.comment-toggler').on('click', function () {
        var toggler = $(this).parent();
        toggler.prev().children().toggleClass("active");
        $(this).toggleClass("active");
    });
    if ($(window).width() < 992) {
        $("#right-side .tab-pane.active").removeClass("active");
        $('.btn-green.active').removeClass("active");
    }
});
