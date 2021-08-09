$(document).ready(function(){
    $('.btn-green').on('click', function () {
        $('.btn-green.active').toggleClass("active");
    });

    $('#tab_selector').on('change', function () {
        $('.nav-tabs a').eq($(this).val()).tab('show');
    });

    $('#right-side .tab-pane .close').on('click', function () {
        $("#right-side .tab-pane.active").removeClass("active");
    });

    $('.filter').click(function () {
        $("#filter-section").toggle();
        $(".courses-section-title").toggleClass("active");

        $("#activ-courses").click(function () {
            $(".active-course-section").toggle();
        });

        $("#past-courses").click(function () {
            $(".past-course-section").toggle();
        });
    });

    /* course mobile */
    $(document).ready(function () {
        $('#tab_selector').change(function () {
            if ($('#tab_selector').val() == 'Активни') {
                $('#status').empty().prepend("Активни курсове");

                $('.section-active-courses.d-none').removeClass("d-none");
                $('.section-past-courses').addClass("d-none");
                $('.section-my-courses').addClass("d-none");
            } else if ($('#tab_selector').val() == 'Отминали') {
                $('#status').empty().prepend("Отминали курсове");

                $('.section-past-courses.d-none').removeClass("d-none");
                $('.section-active-courses').addClass("d-none");
                $('.section-my-courses').addClass("d-none");
            } else if ($('#tab_selector').val() == 'Записани') {
                $('#status').empty().prepend("Записани курсове");

                $('.section-my-courses.d-none').removeClass("d-none");
                $('.section-active-courses').addClass("d-none");
                $('.section-past-courses').addClass("d-none");
            }
        });
    });
});
