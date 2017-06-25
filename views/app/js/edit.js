if(Func.$('#edit_user_button')) {
  Func.$('#edit_user_button').onclick = (e) => {
    e.preventDefault();
    _init_edit();
  };
}

if(Func.$('#edit_user_form')) {
  Func.$('#edit_user_form').onkeypress = (e) => {
      if (!e) e = window.event;
      var keyCode = e.keyCode || e.which;
      if (keyCode == '13'){
        _init_edit();

        return false;
      }
  };
}
