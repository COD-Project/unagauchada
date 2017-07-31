$(document).ready(function() {

  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });

  if (Func.$('#purchases_date_list')) {
    cmdForm.render({
      elem: Func.$('#purchases_date_list'),
      inputs: [{
        name: 'min_date',
        inner: 'Desde',
        type: 'date'
      },
      {
        name: 'max_date',
        inner: 'Hasta',
        type: 'date'
      }],
      submit: 'Buscar',
      action: 'administration/analytics',
      method: 'get'
    });
  }


});
