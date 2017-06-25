<?php

function AllPostulantes() {
  $db = new Connection();
  $data = $db->select('*', 'Postulantes');
  if(!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $postulantes[$i] = array(
      'idUser' => $data[$i]['idUser'],
      'idGauchada' => $data[$i]['idGauchada']
    );
  }
  return $postulantes;
}

function Postulantes($idGauchada) {
  $db = new Connection();
  $data = $db->select('*', 'Postulantes p INNER JOIN Users u ON(p.idUser = u.idUser)', 'idGauchada='.$idGauchada);
  if(!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $postulantes[$i] = array(
      'idUser' => $data[$i]['idUser'],
      'idGauchada' => $data[$i]['idGauchada'],
      'completeName' => $data[$i]['name'] . ' ' . $data[$i]['surname'],
      'email' => $data[$i]['email'],
      'profilePicture' => Images()[$data[$i]['idImage']]['path']
    );
  }
  return $postulantes;
}

function Postulante($idGauchada, $idUser) {
  $postulantes = Postulantes($idGauchada);
  if($postulantes) {
    foreach ($postulantes as $key) {
      if($idUser == $key['idUser'])
        return true;
    }
  }
  return false;
}

?>
