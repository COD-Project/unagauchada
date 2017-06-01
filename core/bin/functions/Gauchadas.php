<?php

function Gauchadas() {
  $db = new Connection();
  $data = $db->select('*', 'Gauchadas', '1=1', 'ORDER BY idGauchada DESC');
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
      'user' => Users()[$data[$i]['idUser']],
      'idCategory' => $data[$i]['idCategory'],
      'comments' => Comments($data[$i]['idGauchada']),
      'images' => ImagesGauchada($data[$i]['idGauchada'])
    );
  }
  return $gauchadas;
}

?>
