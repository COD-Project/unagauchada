<?php

function Postulants($idGauchada=null) {
  $db = new Connection();
  $where = $idGauchada != null ? 'idGauchada='.$idGauchada.' AND validate IS NULL' : 'validate IS NULL';
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
  $where = 'p.idGauchada='.$idGauchada.' AND selected=1 AND validate IS NULL';
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
  $data = $db->select('*', 'Postulants', "idUser=$idUser AND selected=1 AND validate IS NULL");
  if (!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $postulantes[$i] = array(
      'idGauchada' => $data[$i]['idGauchada'],
      'description' => $data[$i]['description'],
      'validate' => $data[$i]['validate'],
      'description' => $data[$i]['description']
    );
  }
  return $postulantes;
}

function PostulantIn($idUser, $idOwner) {
  $db = new Connection();
  $data = $db->select('u.idUser, g.idGauchada, u.name, u.surname',
                            '((Users u INNER JOIN Postulants p ON(u.idUser=p.idUser))INNER JOIN Gauchadas g ON(p.idGauchada=g.idGauchada))
                            LEFT JOIN Ratings r ON(p.idGauchada=r.idGauchada)',
                            'p.validate IS NULL AND r.idRating IS NULL AND p.idUser='.$idUser.' AND g.idUser='.$idOwner);
  if(!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $postulantes[$i] = array(
      'idUser' => $data[$i]['idUser'],
      'idGauchada' => $data[$i]['idGauchada'],
      'completeName' => $data[$i]['name'] . ' ' . $data[$i]['surname']
    );
  }
  return $postulantes;
}

function SelectedAndNotFinished($idOwner, $idUser) {
  $db = new Connection();
  $data = $db->select('p.idUser',
                      '(Gauchadas g INNER JOIN Postulants p ON (g.idGauchada=p.idGauchada))
                      LEFT JOIN Ratings r ON(p.idGauchada=r.idGauchada)',
                      "idRating IS NULL AND p.selected=1 AND g.idUser=$idOwner AND p.idUser=$idUser AND p.validate IS NULL");
  return $data? $data[0]['idUser'] : false;
}

?>
