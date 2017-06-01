var Func = new Functions();
var cmdForm = new CMDForm();

var Expresion = {
	email: /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
	password: /^\w+$/,
	number: /^[0-9]$/,
	tarjeta: /^(?:4\d([\- ])?\d{6}\1\d{5}|(?:4\d{3}|5[1-5]\d{2}|6011)([\- ])?\d{4}\2\d{4}\2\d{4})$/
};
