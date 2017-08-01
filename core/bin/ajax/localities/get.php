<?php

    if ($_GET['mode'] == 'get' && isset($_GET['state'])) {
        $db = new Connection();
        $data = $db->select('*', 'Provincias', 'provincia="' . $_GET['state'] . '"');
        $id = $data[0]['id'];
        $data = $db->select('*', 'Localidades', 'idProvincia=' . $id);
        echo json_encode($data);
    } elseif ($_GET['mode'] == 'get') {
        $db = new Connection();
        $data = $db->select('*', 'Localidades');
        echo json_encode($data);
    } else {
        echo "No hay localidades";
    }
