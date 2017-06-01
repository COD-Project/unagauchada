let _init_compra = function() {
	var data = getCreditsData(),
      result,
		  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

  var form = 'cantidad=' + data.creditos.value;
  if (data.tarjeta.success && data.creditos.value > 0 && data.date) {
    connect.onreadystatechange = () => {
      if(connect.readyState == 4 && connect.status == 200) {
        if (connect.responseText == 1) {
          result = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 0;">';
          result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          result += '<h5>¡Compra exitosa!</h5>';
          result += '<p><strong> Estás siendo redirigido...</strong></p>';
          result += '</div>';
          Func.$('#_AJAX_CREDITS_').innerHTML = result;
          location.href += '?success=true';
        } else {
          result = '<div class="alert alert-error alert-dismissible fade show" role="alert" style="border-radius: 0;">';
          result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          result += '<h5>ERROR: </h5>';
          result += '<p><strong>' + connect.responseText + '</strong></p>';
          result += '</div>';
          Func.$('#_AJAX_CREDITS_').innerHTML = result;
        }
      }
    }
    connect.open('POST','ajax.php?for=users&mode=credits', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form);
  } else if (!data.tarjeta.success) {
    result = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 0;">';
    result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    result += '<h5>Cuidado:</h5>';
    result += '<p><strong> El número de tarjeta es incorrecto.</strong></p>';
    result += '</div>';
    Func.$('#_AJAX_CREDITS_').innerHTML = result;
  } else if (!date.date) {
    result = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 0;">';
    result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    result += '<h5>Cuidado:</h5>';
    result += '<p><strong> La tarjeta de crédito está vencida.</strong></p>';
    result += '</div>';
    Func.$('#_AJAX_CREDITS_').innerHTML = result;
  } else if (data.creditos.value < 0) {
    result = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 0;">';
    result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    result += '<h5>Cuidado:</h5>';
    result += '<p><strong> La tarjeta de crédito está vencida.</strong></p>';
    result += '</div>';
    Func.$('#_AJAX_CREDITS_').innerHTML = result;
  }
}
