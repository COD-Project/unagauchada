const Expresion = {
	email: /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
	password: /^\w+$/
};


let login_query = ({ email, password }) => ({
  email: (
  	email == null || 
  	email.length == 0 || 
  	!Expresion.email.test(email)
  ),
  password: (
  	password == null || 
  	password.length == 0 || 
  	!Expresion.password.test(password)
  )
})

let signup_query = ({email, pass, rep_pass}) => ({
	email: Expresion.email.test(email),
	password: (
		!Expresion.password.test(pass) && 
		!Expresion.password.test(rep_pass) && 
		pass == rep_pass
	)
})