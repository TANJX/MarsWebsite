setTimeout(update, 100);

var num = 1;
var size = $('.typing-text').length + 1;
var stage = 0;
var count = 0;

function update() {
  console.log(num + " " + stage + " " + count);
  switch (stage) {
    case (0):
      if (count < $('.typing-text-wrapper div:nth-child(' + num + ') h1').children().length) {
        $('.typing-text-wrapper div:nth-child(' + num + ') h1').children().eq(count).removeClass('tout');
        $('.typing-text-wrapper div:nth-child(' + num + ') h1').children().eq(count).addClass('tin');
        count++;
      } else {
        count = 0;
        stage++;
      }
      break;
    case (1):
      if (count < 15) {
        count++;
      } else {
        $('.typing-text-wrapper div:nth-child(' + num + ') h1').addClass('selection');
        count = 0;
        stage++;
      }
      break;
    case (2):
      if (count < 1) {
        count++;
      } else {
        $('.typing-text-wrapper div:nth-child(' + num + ') h1').removeClass('selection');
        $('.typing-text-wrapper div:nth-child(' + num + ')').removeClass('in');
        $('.typing-text-wrapper div:nth-child(' + num + ')').addClass('out');
        $('.typing-text-wrapper div:nth-child(' + num + ') h1').children().addClass('tout');
        stage = 0;
        num++;
        count = 0;
        if (num == size) num = 1;
        $('.typing-text-wrapper div:nth-child(' + num + ')').addClass('in');
        $('.typing-text-wrapper div:nth-child(' + num + ')').removeClass('out');
      }
      break;
  }
  setTimeout(update, 100);
}
