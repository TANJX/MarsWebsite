update();

function update() {
  const selection = Array.from(
    $('input.type-select').map(function () {
      return this.checked ? this.value : '';
    })
  );
  $('.journals a').each(function () {
    selection.includes(this.classList[0]) ? $(this).show() : $(this).hide();
  });
  $('input.type-select:checked').length === 0 ? $('.yes').show() : $('.yes').hide();
}