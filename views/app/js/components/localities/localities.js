document.addEventListener('DOMContentLoaded', () => {
	if (Func.$('#locality')) {

		let query = e => {
			if (Func.$('#state').value.length == 0) {
				Func.$('#locality').value = "";
				Func.$('#locality').placeholder = "Debe elegir una provincia";
			}
		};

		Func.$('#locality').addEventListener('keyup', query);

		Func.$('#locality').addEventListener('focus', query);

		Func.$('#locality').addEventListener('blur', e => {
			Func.$('#locality').placeholder = "";
		});

		Func.$('#state').addEventListener('change', e => {
			_init_localities();
		});
	}
});
