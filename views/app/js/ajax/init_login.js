let _init_login = function() {
  var connect,
      form,
      response,
      result;

  let email = Func.$('#email').value,
      password = Func.$('#pass').value,
      session = Func.$('#session_login').checked,
      query = login_query({
        email: email,
        password: password
      });

  if(!query.email && !query.password) {
    form = 'email=' + email + '&pass=' + password + '&session=' + session;

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
          result += '</div></div>';
          Func.$('#_AJAX_LOGIN_').innerHTML = result;
          location.reload();
        } else {
          result = '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0;">';
          result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          result += '<p><strong>ERROR: </strong>' + connect.responseText + '</p>';
          result += '</div></div>';
          Func.$('#_AJAX_LOGIN_').innerHTML = result;
        }
      } else if(connect.readyState != 4) {
        result = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 0;">';
        result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        result += '<h4>Processing...</h4>';
        result += '<p><strong> Estás iniciando sesión...</strong></p>';
        result += '</div></div>';
        Func.$('#_AJAX_LOGIN_').innerHTML = result;
      }
    }
    connect.open('POST','ajax.php?mode=login', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form);
  } else {
    result = '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0;">';
    result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    if(password == null || password.length == 0 || email == null || email.length == 0){
      result += '<strong>ERROR:</strong> Todos los campos deben ser completados.';
    } else {
      result += '<strong>ERROR:</strong> Email o contraseñas incorrectas';
    }
    result += '</div></div>';
    Func.$('#_AJAX_LOGIN_').innerHTML = result;
  }
};
