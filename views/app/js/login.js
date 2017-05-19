
let login_query = ({ email, password }) => ({
  email: (email == null || email.length == 0 || !email_expr.test(email)),
    password: (password == null || password.length == 0 || !pass_expr.test(password))
});

let goLogin = () => {
  var connect, 
      form, 
      response, 
      result;

  let email = __('email').value,
      password = __('pass').value,
      session = __('session_login').checked,
      query = login_query({ 
        email: email, 
        password: password 
      });
  
  if(!query.email && !query.password) {
    form = 'email=' + email + '&pass=' + password + '&session=' + session;

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
    connect.open('POST','ajax.php?mode=login', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form);
  } else {
    result = '<div class="alert alert-dismissible alert-danger">';
    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
    if(password == null || password.length == 0 || email == null || email.length == 0){
      result += '<strong>ERROR:</strong> All data must be full.';
    } else {
      result += '<strong>ERROR:</strong> Email or Password contain invalid characters';
    }
    result += '</div>';
    __('_AJAX_LOGIN_').innerHTML = result;
  }
};

function runScriptLogin(e) {
  if(e.keyCode == 13) {
    goLogin();
  }
}
