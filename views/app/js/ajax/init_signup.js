let _init_signup = function() {
  var connect,
      form,
      result;

  let name = Func.$('#name_signup').value,
      surname = Func.$('#surname_signup').value,
      email = Func.$('#email_signup').value,
      pass = Func.$('#pass_signup').value,
      rep_pass = Func.$('#pass_signup_dos').value,
      tyc = Func.$('#tyc_signup').checked;
      query = signup_query({
        email: email,
        pass: pass,
        rep_pass: rep_pass
      });

  if(tyc) {
    if(name != '' && surname != '' && pass != '' && rep_pass != '' && email != '') {
      if(!query.email && !query.password) {
        form = 'name=' + name + '&surname=' + surname + '&pass=' + pass + '&email=' + email;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function() {
          if(connect.readyState == 4 && connect.status == 200) {
            if(connect.responseText == 1) {
              result = '<div class="card card-success z-depth-2" style="border-radius: 0px;"><div class="card-block">';
              result += '<h4>Registration completed!</h4>';
              result += '<p><strong>Estás siendo redirigido...</strong></p>';
              result += '</div></div>';
              Func.$('#_AJAX_SIGNUP_').innerHTML = result;
              location.reload();
            } else {
              Func.$('#_AJAX_SIGNUP_').innerHTML = connect.responseText;
            }
          } else if(connect.readyState != 4) {
            result = '<div class="card card-warning z-depth-2" style="border-radius: 0px;"><div class="card-block">';
            result += '<h4>Processing...</h4>';
            result += '<p><strong>Tu registro esta siendo procesado...</strong></p>';
            result += '</div></div>';
            Func.$('#_AJAX_SIGNUP_').innerHTML = result;
          }
        }
        connect.open('POST','ajax.php?mode=signup',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
      } else {
        result = '<div class="card card-warning z-depth-2" style="border-radius: 0px;"><div class="card-block">';
        result += '<h4>ERROR</h4>';
        if (query.email) {
          result += '<p><strong>El Email debe ser de la forma example@domain.com</strong></p>';
        } else {
          result += '<p><strong>Las contraseñas no coinciden o tienen caracteres invalidos.</strong></p>';
        }
        result += '</div></div>';
        Func.$('#_AJAX_SIGNUP_').innerHTML = result;
      }
    } else {
      result = '<div class="card card-warning z-depth-2" style="border-radius: 0px;"><div class="card-block">';
      result += '<h4>ERROR</h4>';
      result += '<p><strong>Todos los campos deben ser llenados.</strong></p>';
      result += '</div></div>';
      Func.$('#_AJAX_SIGNUP_').innerHTML = result;
    }
  } else {
    result = '<div class="card card-danger z-depth-2" style="border-radius: 0px;"><div class="card-block">';
    result += '<h4>ERROR</h4>';
    result += '<p><strong>Los terminos y condiciones deben ser aceptados.</strong></p>';
    result += '</div></div>';
    Func.$('#_AJAX_SIGNUP_').innerHTML = result;
  }
}
