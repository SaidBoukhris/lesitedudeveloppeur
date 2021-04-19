$(window).scroll(function() {
    if ($(window).scrollTop() >= 150) {
        $("aside").addClass("yt");
        $("nav").addClass("fixedHeader");
        $("nav p").addClass("fixedTitle");
    } else {
        $("aside").removeClass("yt");
        $("nav").removeClass("fixedHeader");
        $("nav p").removeClass("fixedTitle");
    }
});