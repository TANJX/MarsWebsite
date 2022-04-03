// gif, img alt
$('.img-alt--static').mouseover(function () {
    console.log(1);
    const $next = $(this).next('.img-alt--gif');
    $next.attr('src', $next.attr('src'));
});
$(document).scroll(function () {
    let scroll = $(window).scrollTop();
    let element = $('.title');
    let offset = element.offset();
    let pos = offset.top - scroll;
    if (pos < -110) {
        $('.status').addClass('show');
    } else {
        $('.status').removeClass('show');
    }
});