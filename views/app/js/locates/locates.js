document.addEventListener('DOMContentLoaded', () => {
	if (Func.$('#locate')) {
		Func.$('#state').addEventListener('change', e => {
			_init_locates();
		});
	}
});