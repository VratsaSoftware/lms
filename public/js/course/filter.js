/* filter function */
function search() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    ul = document.getElementById("elements-container");
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
