<<<<<<< HEAD
<?php

function Gauchadas() {
  $db = new Connection();
  $data = $db->select('*', 'Gauchadas');
  for($i = 0; $i < count($data); $i++) {
    $gauchadas[$data[$i][$idGauchada]] = array(
      'idGauchada' => $data[$i]['idGauchada'],
      'title' => $data[$i]['title'],
      'body' => $data[$i]['body'],
      'location' => $data[$i]['location'],
      'limitDate' => $data[$i]['limitDate'],
      'createdAt' => $data[$i]['createdAt'],
      'evaluation' => $data[$i]['evaluation'],
      'idUser' => $data[$i]['idUser'],
      'idCategory' => $data[$i]['idCategory']
    );
  }
  return $guachadas ? $gauchadas : false;
}

?>
=======
<?php

function Gauchadas() {
  $db = new Connection();
  $data = $db->select('*', 'Gauchadas');
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
      'comments' => Comments($data[$i]['idUser'])
    );
  }
  return $gauchadas ? $gauchadas : false;
}

?>
>>>>>>> 665a2b26fbc719452c6af9b0cb0cda371295634d
