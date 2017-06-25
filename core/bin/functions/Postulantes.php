<?php

function Postulantes($idGauchada=null) {
  $db = new Connection();
  $where = $idGauchada != null ? 'idGauchada='.$idGauchada : '1=1';
  $data = $db->select('*', 'Postulantes p INNER JOIN Users u ON(p.idUser = u.idUser)', $where);

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
    foreach ($postulantes as $key => $value) {
      if($idUser == $value['idUser'])
        return true;
    }
  }
  return false;
}

?>
