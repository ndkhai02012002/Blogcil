
function dropdownInfor() {
    var tab = document.getElementById("dropdown-infor");
    var button = document.getElementById("nav-infor");
    window.onclick = function (event) {
        if (!event.target.matches(".nav-infor")) {
            if (tab.style.display === "block") {
                tab.style.display = "none";
                button.style.backgroundColor = "#dddddd";
            }
        }
    };

    if (tab.style.display === "none") {
        tab.style.display = "block";
        button.style.backgroundColor = "#616161";
    } else {
        tab.style.display = "none";
        button.style.backgroundColor = "#dddddd";
    }
}

