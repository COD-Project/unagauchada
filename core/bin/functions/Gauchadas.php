<?php

function Gauchadas() {
  $db = new Connection();
  $data = $db->select('*', 'Gauchadas');
  if(count($data) == 0) return false;

  for($i = 0; $i < count($data); $i++) {
    $gauchadas[$data[$i]['idGauchada']] = array(
      'idGauchada' => $data[$i]['idGauchada'],
      'title' => $data[$i]['title'],
      'body' => $data[$i]['body'],
      'location' => $data[$i]['location'],
      'limitDate' => $data[$i]['limitDate'],
      'creationDate' => $data[$i]['createdAt'],
      'evaluation' => $data[$i]['evaluation'],
      'idUser' => $data[$i]['idUser'],
      'idCategory' => $data[$i]['idCategory'],
      'comments' => Comments($data[$i]['idGauchada'])
    );
  }
  return $gauchadas;
}

?>