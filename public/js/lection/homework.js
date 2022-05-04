const token = $('meta[name="csrf-token"]').attr('content');

$(function() {
    /* search */
    $('#search-homework-user-btn').click(function(){
        $('#search-homework-user-input').toggle();
    });

    /* toggle homework comment section */
    $('.edit-comment').click(function() {
        var commentId = $(this).attr('data-comment-id');
        var commentTextarea = '#comment-edit-textarea-' + commentId;
        var btnSaveComment = '#btn-edit-comment-' + commentId;
        $(commentTextarea).toggle();
        $(btnSaveComment).toggle();
    });
});

/* filter function */
function search() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByClassName("filter");

    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("span")[1];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function saveEvolutionPoint(el, homeworkId)
{
    if ($(el).val() >= 0 && $(el).val() <= 10)
    {
        $.ajax({
            url: "/homework/change-evolution-points/" + homeworkId,
            type: 'POST',
            dataType: "JSON",
            data: {
                evaluation_points: $(el).val(),
            },
            headers: {
                'X-CSRF-TOKEN': token,
            },
            success: function () {
                $(el).css('background-color', '#69b501')

                setTimeout(function() {
                    $(el).css("background", 'white');
                }, 500);
            },
            error: function () {
                alert('Грешка!')
            },
        });
    } else {
        $(el).css('background-color', 'red')

        setTimeout(function() {
            alert('Точките трябва да са от 0 до 10!');
            $(el).css("background", 'white');
        }, 500);
    }
}
