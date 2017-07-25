if (Func.$('#description')) {
  Func.limitate([
    { hash: 'description', value: 155 }
  ]);
}

if (Func.$('#body')) {
  Func.limitate([
    { hash: 'body', value: 155 }
  ]);
}

let postulantconfirm = (elem) => {
  Func.$('#postulant_confirm').href = elem;
}

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
    exprSuccess: Expresion.phone.test(Func.$('#tel_signup').value),
    empty: (
      Func.$('#tel_signup').value == null ||
      Func.$('#tel_signup').value.length == 0
    ),
    success: Expresion.phone.test(Func.$('#tel_signup').value) && !(
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

let getEditData = () => ({
  name: {
    value: Func.$('#name').value,
    empty: Func.$('#name').value.length == 0
  },
  surname: {
    value: Func.$('#surname').value,
    empty: Func.$('#surname').value.length == 0
  },
  password: {
    value: [
      Func.$('#pass').value,
      Func.$('#new_pass').value
    ],
    exprSuccess: (
      Expresion.password.test(Func.$('#pass').value) &&
  		Expresion.password.test(Func.$('#new_pass').value)
    ),
    empty: (
      Func.$('#pass').value == null ||
      Func.$('#new_pass').value == null ||
      Func.$('#pass').value.length == 0 ||
      Func.$('#new_pass').value.length == 0
    ),
    success: (
      Expresion.password.test(Func.$('#pass').value) &&
  		Expresion.password.test(Func.$('#new_pass').value)
    )
  },
  phone: {
    value: Func.$('#phone').value,
    exprSuccess: Expresion.phone.test(Func.$('#phone').value),
    empty: (
      Func.$('#phone').value == null ||
      Func.$('#phone').value.length == 0
    ),
    success: Expresion.phone.test(Func.$('#phone').value)
  },
  state: {
    value: Func.$('#state').value
  },
  locality: {
    value: Func.$('#locality').value
  }
})

let validateTarjeta = function() {
  return Func.$('#tipoTarjeta').value == 'Visa' ? Expresion.tarjeta.visa.test(Func.$('#numeroTarjeta').value) : Expresion.tarjeta.mastercard.test(Func.$('#numeroTarjeta').value)
}

let getCreditsData = () => ({
  tarjeta: {
    type: Func.$('#tipoTarjeta').value,
    number: Func.$('#numeroTarjeta').value,
    success: validateTarjeta()
  },
  creditos: {
    value: Func.$('#creditos').value
  },
  date: new Date() <= new Date(Func.$('#fechaVencimiento').value)
})
