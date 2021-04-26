$(window).scroll(function() {
    if ($(window).scrollTop() >= 200) {
        $("aside").addClass("fixedSideBar");
        $("nav").addClass("fixedHeader");
        $("nav p").addClass("fixedTitle");
    } else {
        $("aside").removeClass("fixedSideBar");
        $("nav").removeClass("fixedHeader");
        $("nav p").removeClass("fixedTitle");
    }
});