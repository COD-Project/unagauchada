function login_query(email, pass) {
  var query = new Array(2);
  email_expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  pass_expr = /^\w+$/;
  query[0] = (email == null || email.length == 0 || !email_expr.test(email)) ? true : false;
  query[1] = (pass == null || pass.length == 0 || !pass_expr.test(pass)) ? true : false;
  return query;
}

function goLogin() {
  try{
    var connect, form, response, result,
        email = __('email').value,
        pass = __('pass').value,
        session = __('session_login').checked ? true : false,
        query = login_query(email, pass);
    if(!query[0] && !query[1]) {
      form = 'email=' + email + '&pass=' + pass + '&session=' + session;
      connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
      connect.onreadystatechange = () => {
        if(connect.readyState == 4 && connect.status == 200) {
          if(connect.responseText == 1) {
            result = '<div class="alert alert-dismissible alert-success">';
            result += '<h4>Conected!</h4>';
            result += '<p><strong> You are being redirected...</strong></p>';
            result += '</div>';
            __('_AJAX_LOGIN_').innerHTML = result;
            location.reload();
          } else {
            result = '<div class="alert alert-dismissible alert-danger">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<p><strong>ERROR: </strong>' + connect.responseText + '</p>';
            result += '</div>';
            __('_AJAX_LOGIN_').innerHTML = result;
          }
        } else if(connect.readyState != 4) {
          result = '<div class="alert alert-dismissible alert-warning">';
          result += '<button type="button" class="close" data-dismiss="alert">x</button>';
          result += '<h4>Processing...</h4>';
          result += '<p><strong> You are initiating session...</strong></p>';
          result += '</div>';
          __('_AJAX_LOGIN_').innerHTML = result;
        }
      }
      connect.open('POST','ajax.php?mode=login',true);
      connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
      connect.send(form);
      //location.reload();
    } else {
      result = '<div class="alert alert-dismissible alert-danger">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      if(pass == null || pass.length == 0 || email == null || email.length == 0){
        result += '<strong>ERROR:</strong> All data must be full.';
      } else {
        result += '<strong>ERROR:</strong> Email or Password contain invalid characters';
      }
      result += '</div>';
      __('_AJAX_LOGIN_').innerHTML = result;
    }
  } catch(error) {
      alert(error.message);
  }
}

function runScriptLogin(e) {
  if(e.keyCode == 13) {
    goLogin();
  }
}
