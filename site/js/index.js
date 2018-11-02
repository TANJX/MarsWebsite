$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    var difference = new Date() - Date.parse("19 Aug 2018 00:00:00 -0400");
    $('.title p span').text(Math.floor(difference / 1000 / 60 / 60 / 24 / 7) + 1);
});

// nav-item animation
$("li").mouseover(function() {
    $(this).find(".drop-down").slideDown(300);
    $(this).find(".accent").addClass("animate");
    $(this).find(".nav-item").css("color", "#FFF");
}).mouseleave(function() {
    $(this).find(".drop-down").slideUp(300);
    $(this).find(".accent").removeClass("animate");
    $(this).find(".nav-item").css("color", "#000");
});

// calendar and bookmark hover animation
$("#calendar-view").mouseover(function() {
    $(this).css("height", "260px");
    $("#squareone-view").css("height", "60px");
    $("#squareone-view").find("p").css("opacity", "0");
}).mouseleave(function() {
    $(this).css("height", "60px");
    $("#squareone-view").css("height", "260px");
    $("#squareone-view").find("p").css("opacity", "1");
});

$("#bookmark-view").mouseover(function() {
    $(this).css("height", "260px");
    $("#squareone-view").css("height", "60px");
    $("#squareone-view").find("p").css("opacity", "0");
}).mouseleave(function() {
    $(this).css("height", "60px");
    $("#squareone-view").css("height", "260px");
    $("#squareone-view").find("p").css("opacity", "1");
});

// calendar and bookmark scroll animation
$(window).scroll(function() {
    if ($(window).width() < 830) {
        var pos = $(window).height() + $(window).scrollTop() - $("#calendar-view").offset().top;
        if (pos > 150 && pos < 450) {
            $("#calendar-view").css("height", "260px");
            $("#calendar-image").css("opacity", "1");
            $("#bookmark-view").css("height", "60px");
            $("#bookmark-image").css("opacity", "0");
        } else if (pos >= 450 && pos < 600) {
            $("#calendar-view").css("height", "60px");
            $("#calendar-image").css("opacity", "0");
            $("#bookmark-view").css("height", "260px");
            $("#bookmark-image").css("opacity", "1");
        } else {
            $("#calendar-view").css("height", "60px");
            $("#calendar-image").css("opacity", "0");
            $("#bookmark-view").css("height", "60px");
            $("#bookmark-image").css("opacity", "0");
        }
    }
});

// rocket floating animation
setTimeout(animation, 3000);

function animation() {
    document.getElementById("rocket").style.animation = "rocket-float 1.6s ease-in-out alternate infinite";
}

// project view slide show
var i = 0;
document.getElementById("project-view").style.backgroundImage = "url(../img/video/football.jpg)";
document.getElementById("project-text").innerHTML = "Football Documentary";
document.getElementById("project-text-wrapper").style.backgroundColor = "#D2D945";
setTimeout(project_animation, 6000);

function project_animation() {
    switch (i) {
        case (0):
            document.getElementById("project-view").style.backgroundImage = "url(../img/video/aplus.gif)";
            document.getElementById("project-text").innerHTML = "\"A Plus\" Concept Video";
            document.getElementById("project-text-wrapper").style.backgroundColor = "#FF594F";
            $(".project-link").attr("href", "project/aplus");
            break;
        case (1):
            document.getElementById("project-view").style.backgroundImage = "url(../works/projects/nike.jpg)";
            document.getElementById("project-text").innerHTML = "Nike Ad";
            document.getElementById("project-text-wrapper").style.backgroundColor = "#FCB13F";
            $(".project-link").attr("href", "project/nike");
            break;
        case (2):
            document.getElementById("project-view").style.backgroundImage = "url(../img/video/football.jpg)";
            document.getElementById("project-text").innerHTML = "Football Documentary";
            document.getElementById("project-text-wrapper").style.backgroundColor = "#D2D945";
            $(".project-link").attr("href", "project/soccer");
            break;
    }
    i++;
    if (i >= 3) i = 0;
    setTimeout(project_animation, 6000);
}

// japanese phases animation
setTimeout(japanese_animation, 1000);
var state = new Array(13);
var i2;
for (i2 = 0; i2 < 13; i2++) {
    if (Math.random() < 0.3) {
        var now = Math.floor(Date.now());
        var obj = $('#japanese-text').children().get(i2);
        obj.style.top = (Math.floor(Math.random() * $('.about .block-r .sub-block-2').height()) - 15) + "px";
        obj.style.fontSize = (Math.random() * 1 + 0.6) + "rem";
        obj.style.animation = "move " + (5 + Math.random() * 4) + "s -" + (Math.random() * 4) + "s";
        state[i2] = now;
    } else
        state[i2] = 0;
}

function japanese_animation() {
    var now = Math.floor(Date.now());
    var j = Math.floor(Math.random() * 13);
    var obj = $('#japanese-text').children().get(j);
    if (state[j] == 0) {
        obj.style.top = (Math.floor(Math.random() * $('.about .block-r .sub-block-2').height()) - 15) + "px";
        obj.style.fontSize = (Math.random() * 1 + 0.6) + "rem";
        obj.style.animation = "move " + (5 + Math.random() * 4) + "s linear";
        obj.style.display = "inline";
        state[j] = now;
    } else if (now - state[j] > 7000) {
        obj.style.animation = "none";
        obj.style.display = "none";
        state[j] = 0;
    }
    setTimeout(japanese_animation, 1000);
}