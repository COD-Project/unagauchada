if (Func.$('#login_button')) {
  Func.$('#login_button').onclick = (e) => {
    e.preventDefault();
    _init_login();
  };
}

if (Func.$('#login_form')) {
  Func.$('#login_form').onkeypress = (e) => {
    if (!e) e = window.event;
    var keyCode = e.keyCode || e.which;
    if (keyCode == '13') {
      _init_login();

      return false;
    }
  };

  Func.limitate([{
    hash: 'email',
    value: 35
  }, ]);
}
