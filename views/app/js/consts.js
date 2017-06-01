var Func = new Functions();
var cmdForm = new CMDForm();

var Expresion = {
	email: /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
	password: /^\w+$/,
	number: /^[0-9]$/,
	phone: /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/,
	tarjeta: {
		visa: /^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/,
		mastercard: /^5[1-5]\d{2}-?\d{4}-?\d{4}-?\d{4}$/
	}
};
