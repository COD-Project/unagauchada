<?php

function Postulants($idGauchada=null) {
  $db = new Connection();
  $where = $idGauchada != null ? 'idGauchada='.$idGauchada : '1=1';
  $data = $db->select('*', 'Postulants p INNER JOIN Users u ON(p.idUser = u.idUser)', $where);

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

function Postulant($idGauchada, $idUser) {
  $postulantes = Postulants($idGauchada);
  if($postulantes) {
    foreach ($postulantes as $key => $value) {
      if($idUser == $value['idUser'])
        return true;
    }
  }
  return false;
}

function SelectedPostulant($idGauchada) {
  $db = new Connection();
  $where = 'p.idGauchada='.$idGauchada.' AND selected=1';
  $data = $db->select('*', 'Postulants p INNER JOIN Users u ON(p.idUser = u.idUser) LEFT JOIN Ratings r ON(p.idGauchada=r.idGauchada)', $where);

  if (!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $postulantes[$i] = array(
      'idUser' => $data[$i]['idUser'],
      'idGauchada' => $data[$i]['idGauchada'],
      'completeName' => $data[$i]['name'] . ' ' . $data[$i]['surname'],
      'email' => $data[$i]['email'],
      'profilePicture' => Images()[$data[$i]['idImage']]['path'],
      'idRating' => $data[$i]['idRating']
    );
  }
  return $postulantes;
}

function UserPostulants($idUser) {
  $db = new Connection();
  $data = $db->select('*', 'Postulants', "idUser=$idUser AND selected=1");
  if (!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $postulantes[$i] = $data[$i]['idGauchada'];
  }
  return $postulantes;
}

function PostulantAndNotSelected($idOwner, $idUser) {
  $db = new Connection();
  $data = $db->select('p.idUser',
                      '(Gauchadas g INNER JOIN Postulants p ON (g.idGauchada=p.idGauchada))
                      LEFT JOIN Ratings r ON(p.idGauchada=r.idGauchada)',
                      "idRating IS NULL AND p.selected=1 AND g.idUser=$idOwner AND p.idUser=$idUser");
  return $data? true : false;
}

?>
