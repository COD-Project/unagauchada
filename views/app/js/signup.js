
let email_query = (email) => {  
  return email_expr.test(email);
}

let pass_query = ({ pass, rep_pass }) => {
  return (!pass_expr.test(pass) && !pass_expr.test(rep_pass)) && pass == rep_pass;
}

let goSignup = () => {
  var connect, 
      form, 
      result, 
      name, 
      surname, 
      pass, 
      email, 
      tyc, 
      rep_pass;

  let name = __('name_signup').value,
      surname = __('surname_signup').value,
      email = __('email_signup').value,
      pass = __('pass_signup').value,
      rep_pass = __('pass_signup_dos').value,
      tyc = __('tyc_signup').checked;

  if(tyc) {
    if(name != '' && surname != '' && pass != '' && rep_pass != '' && email != '') {
      if(pass_query({ pass: pass, rep_pass: rep_pass }) && email_query(email)) {
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
        if (!email_query(email)) {
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
}

function runScriptReg(e) {
  if(e.keyCode == 13) {
    goSignup();
  }
}
