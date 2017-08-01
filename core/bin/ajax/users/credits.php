<?php

if (!empty($_POST['cantidad'])) {
    $db = new Connection();
    $id = (new Sessions())->connectedUser()['idUser'];
    $credits = intval((new Sessions())->connectedUser()['credits']) + intval($_POST['cantidad']);
    $db->update('Users', array('credits' => $credits), 'idUser=' . $id);
    (new Purchases)->add();
    echo 1;
} else {
    echo "La operación falló.";
}
