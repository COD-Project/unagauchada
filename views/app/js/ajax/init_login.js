let _init_login = function() {
  var connect,
      form,
      response,
      result;

  let data = getLoginData();
  
  if(data.email.success && data.password.success) {
    form = 'email=' + data.email.value + '&pass=' + data.password.value + '&session=' + data.session;

    connect = window.XMLHttpRequest ?
      new XMLHttpRequest() :
      new ActiveXObject('Microsoft.XMLHTTP');

    connect.onreadystatechange = () => {
      if(connect.readyState == 4 && connect.status == 200) {
        if(connect.responseText == 1) {
          result = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 0;">';
          result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          result += '<h5>¡Conexión exitosa!</h5>';
          result += '<p><strong> Estás siendo redirigido...</strong></p>';
          result += '</div>';
          Func.$('#_AJAX_LOGIN_').innerHTML = result;
          location.reload();
        } else {
          result = '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0;">';
          result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          result += '<p><strong>ERROR: </strong>' + connect.responseText + '</p>';
          result += '</div>';
          Func.$('#_AJAX_LOGIN_').innerHTML = result;
        }
      } else if(connect.readyState != 4) {
        result = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 0;">';
        result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        result += '<h4>Processing...</h4>';
        result += '<p><strong> Estás iniciando sesión...</strong></p>';
        result += '</div>';
        Func.$('#_AJAX_LOGIN_').innerHTML = result;
      }
    }
    connect.open('POST','ajax.php?for=users&mode=login', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form);
  } else {
    result = '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0;">';
    result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    if(data.email.empty || data.password.empty){
      result += '<strong>ERROR:</strong> Todos los campos deben ser completados.';
    } else {
      result += '<strong>ERROR:</strong> Email o contraseñas incorrectas';
    }
    result += '</div>';
    Func.$('#_AJAX_LOGIN_').innerHTML = result;
  }
};
