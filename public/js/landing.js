function headerScroll() {
    var header = document.getElementById("header");
    var btnHeader = document.getElementById("button-header");
    var ypos = window.pageYOffset;
    console.log(ypos);
    if (ypos > 100) {
        header.classList.add("header-scroll");
        btnHeader.classList.remove("header-button-hide");
    } else {
        header.classList.remove("header-scroll");
        btnHeader.classList.add("header-button-hide");
    }
}

window.addEventListener("scroll", headerScroll);