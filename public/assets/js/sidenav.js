function openNav() {
    document.getElementById("sidenav").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
    document.getElementById("pageContent").style.marginLeft = "0px";
}

function closeNav() {
    document.getElementById("sidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.getElementById("pageContent").style.marginLeft = "0";
}