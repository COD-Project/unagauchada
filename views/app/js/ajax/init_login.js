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
          result = '<div class="card card-success z-depth-2" style="border-radius: 0px;"><div class="card-block">';
          result += '<h4>¡Conexión exitosa!</h4>';
          result += '<p><strong> Estás siendo redirigido...</strong></p>';
          result += '</div></div>';
          Func.$('#_AJAX_LOGIN_').innerHTML = result;
          location.reload();
        } else {
          result = '<div class="card card-danger z-depth-2" style="border-radius: 0px;"><div class="card-block">';
          result += '<p><strong>ERROR: </strong>' + connect.responseText + '</p>';
          result += '</div></div>';
          Func.$('#_AJAX_LOGIN_').innerHTML = result;
        }
      } else if(connect.readyState != 4) {
        result = '<div class="card card-warning z-depth-2" style="border-radius: 0px;"><div class="card-block">';
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
    result = '<div class="card card-danger z-depth-2" style="border-radius: 0px;"><div class="card-block">';
    if(password == null || password.length == 0 || email == null || email.length == 0){
      result += '<strong>ERROR:</strong> Todos los campos deben ser completados.';
    } else {
      result += '<strong>ERROR:</strong> Email o contraseñas incorrectas';
    }
    result += '</div></div>';
    Func.$('#_AJAX_LOGIN_').innerHTML = result;
  }
};
