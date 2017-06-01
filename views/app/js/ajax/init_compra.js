let _init_compra = function() {
	var data = getCreditsData();
		  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  var form = 'cantidad=' + data.credits;
  if (data.tarjeta.success && data.credits > 0 && data.date) {
    connect.onreadystatechange = () => {
      if(connect.readyState == 4 && connect.status == 200) {

      }
    }
    connect.open('POST','ajax.php?for=users&mode=credist', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form);
  }
}
