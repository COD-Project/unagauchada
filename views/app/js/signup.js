function signup_query(email) {
  email_expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  query = (email_expr.test(email)) ? true : false;
  return query;
}

function pass_query(pass, pass_dos) {
  var query = new Array(3);
  pass_expr = /^\w+$/;
  query[0] = (!pass_expr.test(pass) && !pass_expr.test(pass_dos)) ? true : false;
  query[1] = (pass == pass_dos) ? true : false;
  query[2] = (!query[0] && query[1]) ? true : false;
  return query[2];
}

function goSignup() {
  try {
    var connect, form, result, name, surname, pass, email, tyc, pass_dos,
        name = __('name_signup').value,
        surname = __('surname_signup').value,
        email = __('email_signup').value,
        pass = __('pass_signup').value,
        pass_dos = __('pass_signup_dos').value,
        tyc = __('tyc_signup').checked ? true : false;

    if(tyc) {
      if(name != '' && surname != '' && pass != '' && pass_dos != '' && email != '') {
        if(pass_query(pass, pass_dos) && signup_query(email)) {
          form = 'name=' + name + '&surname=' + surname + '&pass=' + pass + '&email=' + email;
          connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
          connect.onreadystatechange = function() {
            if(connect.readyState == 4 && connect.status == 200) {
              if(connect.responseText == 1) {
                result = '<div class="alert alert-dismissible alert-success">';
                result += '<h4>Registration completed!</h4>';
                result += '<p><strong>You are being redirected...</strong></p>';
                result += '</div>';
                __('_AJAX_SIGNUP_').innerHTML = result;
                location.reload();
              } else {
                __('_AJAX_SIGNUP_').innerHTML = connect.responseText;
              }
            } else if(connect.readyState != 4) {
              result = '<div class="alert alert-dismissible alert-warning">';
              result += '<button type="button" class="close" data-dismiss="alert">x</button>';
              result += '<h4>Processing...</h4>';
              result += '<p><strong>Your registration is being processed...</strong></p>';
              result += '</div>';
              __('_AJAX_SIGNUP_').innerHTML = result;
            }
          }
          connect.open('POST','ajax.php?mode=signup',true);
          connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
          connect.send(form);
        } else {
          result = '<div class="alert alert-dismissible alert-warning">';
          result += '<button type="button" class="close" data-dismiss="alert">x</button>';
          result += '<h4>ERROR</h4>';
          if (!signup_query(email)) {
            result += '<p><strong>Email has invalid characters.</strong></p>';
          } else {
            result += '<p><strong>Passwords do not match or have invalid characters.</strong></p>';
          }
          result += '</div>';
          __('_AJAX_SIGNUP_').innerHTML = result;
        }
      } else {
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>ERROR</h4>';
        result += '<p><strong>All fields must be filled.</strong></p>';
        result += '</div>';
        __('_AJAX_SIGNUP_').innerHTML = result;
      }
    } else {
      result = '<div class="alert alert-dismissible alert-danger">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>ERROR</h4>';
      result += '<p><strong>The terms and conditions must be accepted.</strong></p>';
      result += '</div>';
      __('_AJAX_SIGNUP_').innerHTML = result;
    }
  } catch (e) {
    alert(error.message);
  }

}

function runScriptReg(e) {
  if(e.keyCode == 13) {
    goSignup();
  }
}
