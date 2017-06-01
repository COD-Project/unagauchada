document.addEventListener('DOMContentLoaded', () => {
	if (Func.$('#locate')) {

		let query = e => {
			if (Func.$('#state').value.length == 0) {
				Func.$('#locate').value = "";
				Func.$('#locate').placeholder = "Debe elegir una provincia";
			}
		};

		Func.$('#locate').addEventListener('keyup', query);

		Func.$('#locate').addEventListener('focus', query);

		Func.$('#locate').addEventListener('blur', e => {
			Func.$('#locate').placeholder = "";
		});

		Func.$('#state').addEventListener('change', e => {
			_init_locates();
		});
	}
});