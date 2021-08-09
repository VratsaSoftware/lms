$(document).ready(function() {
    /* module edit */
    $('.module-edit-btn').click(function() {
        $(".right-part").addClass("module-right");
        $('.add-lection').hide();
        $('.edit-lection').hide();
        $('.show-lection').hide();
        $('.module-edit').show();
        $('.module-create').hide();
    });

    /* module create */
    $('.module-create-btn').click(function() {
        $(".right-part").addClass("module-right");
        $('.add-lection').hide();
        $('.edit-lection').hide();
        $('.show-lection').hide();
        $('.module-edit').hide();
        $('.module-create').show();
    });

    $('.module-close-btn').click(function() {
        $(".right-part.module-right").removeClass("module-right");
        $('.add-lection').hide();
        $('.edit-lection').hide();
        $('.show-lection').show();
        $('.module-edit').hide();
    });

    $('#delete-module-btn').click(function() {
        return confirm("Найстина ли искате да изтриете този Модул?");
    });
});
