document.addEventListener('DOMContentLoaded', () => {
	if (Func.$('#compra_creditos')) {
		cmdForm.render({
			elem: Func.$('#compra_creditos'),
			inputs: [
				{ name: 'tipoTarjeta', inner: 'Tipo de Tarjeta', type: 'text' },
				{ name: 'numeroTarjeta', inner: 'Número de Tarjeta', type: 'number' },
				{ name: 'fechaVencimiento', inner: 'Fecha de Vencimiento', type: 'date' },
				{ name: 'creditos', inner: 'Créditos', type: 'number' }
			],
			submit: 'Comprar',
			action: 'javascript: _init_compra()'
		});

		var div = document.createElement('div');
				div.style = 'color: black; margin-bottom: 25px;';
				div.innerHTML = '	<div>';
				div.innerHTML += '	<span><i class="fa fa-credit-card-alt"></i> Precio a pagar:  $</span><span id="precio_pagar">0</span>';
				div.innerHTML += '</div>';

		Func.$('#cmd_form').insertBefore(div, Func.$('#btn-submit'));


		let onchange = e => {
			Func.$('#creditos').value = Math.abs(Func.$('#creditos').value);
			Func.$('#precio_pagar').innerHTML = Func.$('#precio').innerHTML * Func.$('#creditos').value;
		};

		Func.$('#creditos').addEventListener('change', onchange);
		Func.$('#creditos').addEventListener('click', onchange);
		Func.$('#creditos').addEventListener('keyup', onchange);

	};
});
