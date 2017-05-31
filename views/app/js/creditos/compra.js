document.addEventListener('DOMContentLoaded', () => {
	if (Func.$('compra_creditos')) {
		cmdForm.render({
			elem: Func.$('#compra_creditos'),
			inputs: [
				{ name: 'creditos', inner: 'Créditos', type: 'number' }
			],
			submit: 'Comprar',
			action: 'creditos/comprar'
		});

		let onchange = e => {
			
		};

		Func.$('#creditos').addEventListener('change', onchange);

		Func.$('#creditos').addEventListener('keyup', onchange);

	};
});