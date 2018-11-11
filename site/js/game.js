setTimeout(update, 100);

let num = 1;
let size = $('.typing-text').length + 1;
let stage = 0;
let count = 0;

$('.typing-text h1').each(function () {
    const text = $(this).text();
    console.log($(this));
    console.log(text);
    $(this).text('');
    for (let i = 0; i < text.length; i++) {
        let $e = $("<i></i>").text(text.charAt(i)).addClass('tout');
        if (text.charAt(i) === ' ') {
            $e.html('&nbsp;');
        }
        $(this).append($e);
    }
});

function update() {
    //  console.log(num + " " + stage + " " + count);
    let $h1 = $('.typing-text-wrapper div:nth-child(' + num + ') h1');
    let $h1_div = $('.typing-text-wrapper div:nth-child(' + num + ')');
    switch (stage) {
        case (0):
            if (count < $h1.children().length) {
                $h1.children().eq(count).removeClass('tout');
                $h1.children().eq(count).addClass('tin');
                count++;
            } else {
                count = 0;
                stage++;
            }
            break;
        case (1):
            if (count < 20) {
                count++;
            } else {
                $h1.addClass('selection');
                count = 0;
                stage++;
            }
            break;
        case (2):
            if (count < 1) {
                count++;
            } else {
                $h1.removeClass('selection');
                $h1_div.removeClass('in');
                $h1_div.addClass('out');
                $h1.children().addClass('tout');
                stage = 0;
                num++;
                count = 0;
                if (num === size) num = 1;
                $h1_div.addClass('in');
                $h1_div.removeClass('out');
            }
            break;
    }
    setTimeout(update, 100 + (Math.random() * 60 - 30));
}
