$(document).ready(function() {
    /* module edit */
    $('.module-edit-btn').click(function() {
        editModule();
    });

    /* module create */
    $('.module-create-btn').click(function() {
        createModule();
    });

    $('.module-close-btn').click(function() {
        $(".right-part.module-right").removeClass("module-right");
        $('.add-lection').hide();
        $('.edit-lection').hide();
        $('.show-lection').show();
        $('.module-edit').hide();
        $('#page-create-module').val(0);
        $('#page-edit-module').val(0);
    });

    $('#delete-module-btn').click(function() {
        return confirm("Найстина ли искате да изтриете този Модул?");
    });

    if ($('#page-create-module').val()) {
        createModule();
    }

    if ($('#page-edit-module').val()) {
        createModule();
    }
});

function createModule() {
    $(".right-part").addClass("module-right");
    $('.add-lection').hide();
    $('.edit-lection').hide();
    $('.show-lection').hide();
    $('.module-edit').hide();
    $('.module-create').show();
    $('#page-create-module').val(1);
    $('#page-edit-module').val(0);
}

function editModule() {
    $(".right-part").addClass("module-right");
    $('.add-lection').hide();
    $('.edit-lection').hide();
    $('.show-lection').hide();
    $('.module-edit').show();
    $('.module-create').hide();
    $('#page-create-module').val(0);
    $('#page-edit-module').val(1);
}
