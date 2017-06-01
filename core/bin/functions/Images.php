<?php

function Images() {
  $db = new Connection();
  $data = $db->select('*', 'Images');
  if(!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $images[$data[$i]['idImage']] = array(
      'idImage' => $data[$i]['idImage'],
      'path' => $data[$i]['path']
    );
  }
  return $images;
}

function ImagesGauchada($idGauchada) {
  $db = new Connection();
  $data = $db->select('*', 'Images i INNER JOIN GauchadasImages g ON (i.idImage = g.idImage)', "idGauchada=$idGauchada");
  if(!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $images[$data[$i]['idImage']] = array(
      'idGauchadaImage' => $data[$i]['idGauchadaImage'],
      'idImage' => $data[$i]['idImage'],
      'path' => $data[$i]['path']
    );
  }
  return $images;
}

?>
