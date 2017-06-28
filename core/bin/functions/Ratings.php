<?php

function Ratings($idGauchada) {
  $db = new Connection();
  $where = 'idGauchada='.$idGauchada;
  $data = $db->select('*', 'Ratings', $where);

  return (!$data) ? true : false;
}

function Rating($idGauchada) {
  $db = new Connection();
  $data = $db->select('r.body, g.title, r.rating', 'Ratings r INNER JOIN Gauchadas g ON(r.idGauchada=g.idGauchada)', "r.idGauchada=$idGauchada");
  if (!$data) return false;

  $rating = array(
    'body' => $data[0]['body'],
    'title' => $data[0]['title']
  );
  switch ($data[0]['rating']) {
    case '1':
      $rating['rating'] = 'Mal';
      $rating['color'] = '-danger';
      break;
    case '2':
      $rating['rating'] = 'Neutral';
      $rating['color'] = '-info';
      break;
    case '3':
      $rating['rating'] = 'Bien';
      $rating['color'] = '-success';
      break;
  }
  return $rating;
}

?>
