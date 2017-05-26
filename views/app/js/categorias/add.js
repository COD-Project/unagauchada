document.addEventListener('DOMContentLoaded', () => {
	if (Func.$('#categoriasAdd')) {
		cmdForm.render({
			elem: Func.$('#categoriasAdd'),
			inputs: [
				{ name: 'name', inner:'Nombre', type:'text'}
			],
			action: 'categorias/add'
		});
	}
});