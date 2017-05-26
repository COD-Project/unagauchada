let getLoginData = () => ({
  email : {
    value: Func.$('#email').value,
    exprSuccess: Expresion.email.test(Func.$('#email').value),
    empty: (
      Func.$('#email').value == null ||
      Func.$('#email').value.length == 0
    ),
    success: Expresion.email.test(Func.$('#email').value) && !(
      Func.$('#email').value == null ||
      Func.$('#email').value.length == 0
    )
  },
  password: {
    value: Func.$('#pass').value,
    exprSuccess: (
      Expresion.password.test(Func.$('#pass').value)
    ),
    empty: (
      Func.$('#pass').value == null ||
      Func.$('#pass').value.length == 0
    ),
    success: Expresion.password.test(Func.$('#pass').value) && !(
      Func.$('#pass').value == null ||
      Func.$('#pass').value.length == 0
    )
  },
  session: Func.$('#session_login').checked
})


let getSignupData = () => ({
  name: {
    value: Func.$('#name_signup').value,
    empty: Func.$('#name_signup').value.length == 0
  },
  surname: {
    value: Func.$('#surname_signup').value,
    empty: Func.$('#surname_signup').value.length == 0
  },
  email : {
    value: Func.$('#email_signup').value,
    exprSuccess: Expresion.email.test(Func.$('#email_signup').value),
    empty: (
      Func.$('#email_signup').value == null ||
      Func.$('#email_signup').value.length == 0
    ),
    success: Expresion.email.test(Func.$('#email_signup').value) && !(
      Func.$('#email_signup').value == null ||
      Func.$('#email_signup').value.length == 0
    )
  },
  password: {
    value: [
      Func.$('#pass_signup').value,
      Func.$('#pass_signup_dos').value
    ],
    exprSuccess: (
      Expresion.password.test(Func.$('#pass_signup').value) &&
  		Expresion.password.test(Func.$('#pass_signup_dos').value)
    ),
    empty: (
      Func.$('#pass_signup').value == null ||
      Func.$('#pass_signup_dos').value == null ||
      Func.$('#pass_signup').value.length == 0 ||
      Func.$('#pass_signup_dos').value.length == 0
    ),
    success: (
      Expresion.password.test(Func.$('#pass_signup').value) &&
  		Expresion.password.test(Func.$('#pass_signup_dos').value)
    ) && !(
      Func.$('#pass_signup').value == null ||
      Func.$('#pass_signup_dos').value == null ||
      Func.$('#pass_signup').value.length == 0 ||
      Func.$('#pass_signup_dos').value.length == 0
    )
  },
  phone: {
    value: Func.$('#tel_signup').value,
    exprSuccess: Expresion.number.test(Func.$('#tel_signup').value),
    empty: (
      Func.$('#tel_signup').value == null ||
      Func.$('#tel_signup').value.length == 0
    ),
    success: Expresion.number.test(Func.$('#tel_signup').value) && !(
      Func.$('#tel_signup').value == null ||
      Func.$('#tel_signup').value.length == 0
    )
  },
  date: {
    value: Func.$('#date_signup').value,
    age: (new Date()).getFullYear() - (new Date(Func.$('#date_signup').value)).getFullYear(),
    success: ((new Date()).getFullYear() - (new Date(Func.$('#date_signup').value)).getFullYear()) >= 16
  },
  tyc: Func.$('#tyc_signup').checked
})
