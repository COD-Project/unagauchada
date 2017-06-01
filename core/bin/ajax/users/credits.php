<?php

if (!empty($_POST['credist'])) {
  $db = new Connection();
  $id = (new Sessions())->connectedUser()['idUser'];
  $credist = (new Sessions())->connectedUser()['credits'] + $_POST['credist'];
  $db->update('Users', array('credits' => $credits), 'idUser=' . $id);
}

?>
