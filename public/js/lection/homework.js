$(document).ready(function() {
    /* search */
    $('#search-homework-user-btn').click(function(){
        $('#search-homework-user-input').toggle();
    });
});

/* filter function */
function myFunction() {
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
