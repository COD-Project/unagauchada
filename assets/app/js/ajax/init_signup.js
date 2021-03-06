let _init_signup = function() {
  var connect,
    form,
    result;

  let data = getSignupData();
  if (data.tyc) {
    if (!data.name.empty && !data.surname.empty && !data.password.empty && !data.phone.empty) {
      if (data.email.success && data.password.success && data.date.success && data.phone.success) {
        form = 'name=' + data.name.value + '&surname=' + data.surname.value + '&pass=' + data.password.value[0] + '&email=' + data.email.value + '&birthdate=' + data.date.value + '&phone=' + data.phone.value;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function() {
          if (connect.readyState == 4 && connect.status == 200) {
            if (connect.responseText == 1) {
              result = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 0;">';
              result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
              result += '<h4>Registration completed!</h4>';
              result += '<p><strong>Estás siendo redirigido...</strong></p>';
              result += '</div>';
              Func.$('#_AJAX_SIGNUP_').innerHTML = result;
              location.reload();
            } else {
              result = '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0;">';
              result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
              result += '<p><strong>ERROR: </strong>' + connect.responseText + '</p>';
              result += '</div>';
              Func.$('#_AJAX_SIGNUP_').innerHTML = result;
            }
          } else if (connect.readyState != 4) {
            result = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 0;">';
            result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            result += '<h4>Processing...</h4>';
            result += '<p><strong>Tu registro esta siendo procesado...</strong></p>';
            result += '</div>';
            Func.$('#_AJAX_SIGNUP_').innerHTML = result;
          }
        }
        connect.open('POST', 'ajax.php?for=users&mode=signup', true);
        connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        connect.send(form);
      } else {
        result = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 0;">';
        result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        result += '<h4>ERROR</h4>';
        if (!data.email.success) {
          result += '<p><strong>El Email debe ser de la forma example@domain.com</strong></p>';
        } else if (!data.password.success) {
          result += '<p><strong>Las contraseñas no coinciden o tienen caracteres invalidos.</strong></p>';
        } else if (!data.date.success) {
          result += '<p><strong>Debes ser mayor de 16 años de edad para registrate.</strong></p>';
        } else if (!data.phone.success) {
          result += '<p><strong>El teléfono tiene caracteres inválidos y debe contener mas de 10 caracteres.</strong></p>';
        }
        result += '</div>';
        Func.$('#_AJAX_SIGNUP_').innerHTML = result;
      }
    } else {
      result = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 0;">';
      result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      result += '<h4>ERROR</h4>';
      result += '<p><strong>Todos los campos deben ser llenados.</strong></p>';
      result += '</div>';
      Func.$('#_AJAX_SIGNUP_').innerHTML = result;
    }
  } else {
    result = '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0;">';
    result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    result += '<h4>ERROR</h4>';
    result += '<p><strong>Los terminos y condiciones deben ser aceptados.</strong></p>';
    result += '</div>';
    Func.$('#_AJAX_SIGNUP_').innerHTML = result;
  }
}
