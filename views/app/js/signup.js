if(Func.$('#signup_button')) {
  Func.$('#signup_button').onclick = (e) => {
    e.preventDefault();
    _init_signup();
  };
}

if(Func.$('#signup_form')) {
  Func.$('#signup_form').onkeypress = (e) => {
      if (!e) e = window.event;
      var keyCode = e.keyCode || e.which;
      if (keyCode == '13'){
        _init_signup();

        return false;
      }
  };

  Func.limitate([
    { hash: 'email_signup', value: 35 },
    { hash: 'name_signup', value: 25 },
    { hash: 'surname_signup', value: 25 }
  ]);
}
