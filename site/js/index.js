$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    var difference = new Date() - Date.parse("26 Aug 2019 00:00:00 -0400");
    $('.title p span').text(Math.floor(difference / 1000 / 60 / 60 / 24 / 7) + 1);
    // rocket floating animation
    setTimeout(animation, 3000);
});

// nav-item animation
$("li").mouseover(function () {
    $(this).find(".drop-down").slideDown(300);
    $(this).find(".accent").addClass("animate");
    $(this).find(".nav-item").css("color", "#FFF");
}).mouseleave(function () {
    $(this).find(".drop-down").slideUp(300);
    $(this).find(".accent").removeClass("animate");
    $(this).find(".nav-item").css("color", "#000");
});


function animation() {
    document.getElementById("rocket").style.animation = "rocket-float 1.6s ease-in-out alternate infinite";
}
