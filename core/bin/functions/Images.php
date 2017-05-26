<?php

function Images() {
  $db = new Connection();
  $data = $db->select('*', 'Images');
  if(count($data) == 0) return false;

  for($i = 0; $i < count($data); $i++) {
    $images[$i] = array(
      'idImages' => $data[$i]['idImages'],
      'path' => $data[$i]['path'],
      'idUser' => $data[$i]['idUser']
    );
  }
  return $images;
}

function ProfilePicture($idImage) {
  $db = new Connection();
  $data = $db->select('*', 'Images', "idImages=$idImage");
  $images = array(
      'idImages' => $data[0]['idImages'],
      'path' => $data[0]['path'],
      'idUser' => $data[0]['idUser']
    );
  return $images? $images : false;
}

?>
