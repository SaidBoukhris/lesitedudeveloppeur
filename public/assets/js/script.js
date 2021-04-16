$(window).scroll(function() {
    if ($(window).scrollTop() >= 150) {
        $("nav").addClass("fixedHeader");
        $("nav p").addClass("fixedTitle");
    } else {
        $("nav").removeClass("fixedHeader");
        $("nav p").removeClass("fixedTitle");
    }
});