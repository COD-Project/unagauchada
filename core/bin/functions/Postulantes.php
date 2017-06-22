<?php

function Postulantes($idGauchada) {
  $db = new Connection();
  $data = $db->select('*', 'Postulantes p INNER JOIN Users u ON(p.idUser = u.idUser)', 'idGauchada='.$idGauchada);
  if(!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $postulantes[$i] = array(
      'idUser' => $data[$i]['idUser'],
      'completeName' => $data[$i]['name'] . ' ' . $data[$i]['surname'],
      'email' => $data[$i]['email'],
      'profilePicture' => Images()[$data[$i]['idImage']]['path']
    );
  }
  return $postulantes ?? false;
}

?>
