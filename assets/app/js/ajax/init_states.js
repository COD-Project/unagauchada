let _init_states = function() {
  var states = Func.$('#states'),
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

  connect.onreadystatechange = () => {
    if (connect.readyState == 4 && connect.status == 200) {
      var data = JSON.parse(connect.responseText);
      for (var i = 0; i < data.length; i++) {
        states.innerHTML += "<option value=\"" + data[i]['provincia'] + "\"></option>"
      };
    }
  }
  connect.open('POST', 'ajax.php?for=states&mode=get', true);
  connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  connect.send();
}
