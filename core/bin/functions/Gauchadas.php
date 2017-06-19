<?php

function gauchadasFilter() {
  $db = new Connection();
  $where = 'DATEDIFF(CURDATE(), limitDate) <= 0';
  foreach (OPTIONS['gauchadas']['filter'] as $key => $value) {
    $where .= array_key_exists($key, $_GET) && !Func::emp($_GET[$key]) ?
              ' AND ' . $value['content'] . $value['begin'] . $db->escape($_GET[$key]) . $value['end'] : '';
  }
  return $db->select('*', 'Gauchadas', $where, 'ORDER BY idGauchada DESC');
}


function Gauchadas() {
  $db = new Connection();
  $data = gauchadasFilter();
  if(!$data) return false;

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
