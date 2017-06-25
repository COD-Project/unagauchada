let _init_edit = function() {
  var connect,
      form,
      result;

  let data = getEditData();

  if(!(data.name.empty && data.surname.empty && data.password.empty && data.phone.empty)) {
    if(data.password.success && data.phone.success) {
      form = 'name=' + data.name.value + '&surname=' + data.surname.value + '&pass=' + data.password.value[0] + '&phone=' + data.phone.value;
      connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
      connect.onreadystatechange = function() {
        if(connect.readyState == 4 && connect.status == 200) {
          if(connect.responseText == 1) {
            result = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 0;">';
            result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            result += '<h4>Registration completed!</h4>';
            result += '<p><strong>Estás siendo redirigido...</strong></p>';
            result += '</div>';
            Func.$('#_AJAX_EDIT_').innerHTML = result;
            location.reload();
          } else {
            result = '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0;">';
            result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            result += '<p><strong>ERROR: </strong>' + connect.responseText + '</p>';
            result += '</div>';
            Func.$('#_AJAX_EDIT_').innerHTML = result;
          }
        } else if(connect.readyState != 4) {
          result = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 0;">';
          result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          result += '<h4>Processing...</h4>';
          result += '<p><strong>Tu registro esta siendo procesado...</strong></p>';
          result += '</div>';
          Func.$('#_AJAX_EDIT_').innerHTML = result;
        }
      }
      connect.open('POST','ajax.php?for=users&mode=edit',true);
      connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
      connect.send(form);
    } else {
      result = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 0;">';
      result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      result += '<h4>ERROR</h4>';
      if (!data.password.success) {
        result += '<p><strong>Las contraseñas no coinciden o tienen caracteres invalidos.</strong></p>';
      } else if (!data.phone.success) {
        result += '<p><strong>El teléfono tiene caracteres inválidos y debe contener mas de 10 caracteres.</strong></p>';
      }
      result += '</div>';
      Func.$('#_AJAX_EDIT_').innerHTML = result;
    }
  } else {
    result = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 0;">';
    result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    result += '<h4>ERROR</h4>';
    result += '<p><strong>Todos los campos deben ser llenados.</strong></p>';
    result += '</div>';
    Func.$('#_AJAX_EDIT_').innerHTML = result;
  }
}
