let _init_locates = function() {
	var locates = Func.$('#locates'),
		  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
      
	  connect.onreadystatechange = () => {
      if(connect.readyState == 4 && connect.status == 200) {
        var data = JSON.parse(connect.responseText);
        locates.innerHTML = "";
      	for (var i = 0; i < data.length; i++) {
      		locates.innerHTML += "<option value=\"" + data[i]['localidad'] + "\"></option>"
      	};
      }
    }
    connect.open('POST','ajax.php?for=locates&mode=get&state=' + Func.$('#state').value, true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send();
}