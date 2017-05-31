<?php

	if ($_GET['mode'] == 'get') {
		$db = new Connection();
		$data = $db->select('*', 'Provincias');
		echo json_encode($data);
	} else {
		echo "No hay provincias";
	}
	

?>