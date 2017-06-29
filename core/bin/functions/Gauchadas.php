<?php

function gauchadasFilter() {
  $db = new Connection();
  $select = '*';
  $table = 'Gauchadas g';
  $criteria = 'ORDER BY g.idGauchada DESC';
  $where = 'DATEDIFF(CURDATE(), limitDate) <= 0 AND g.validate IS NULL';
  foreach (OPTIONS['gauchadas']['filter'] as $key => $value) {
    $where .= array_key_exists($key, $_GET) && !Func::emp($_GET[$key]) ?
              ' AND ' . $value['content'] . $value['begin'] . $db->escape($_GET[$key]) . $value['end'] : '';
  }
  if (isset($_GET['mode'])) {
    $select = 'g.idGauchada, g.idUser, g.title, g.body, g.location, g.limitDate, g.createdAt, g.evaluation, g.idCategory, COUNT(idPostulante) as "postulantes"';
    $table .= ' LEFT JOIN Postulants p ON (g.idGauchada=p.idGauchada)';
    $criteria = 'GROUP BY g.idGauchada ORDER BY postulantes ' . $_GET['mode'] . ', g.idGauchada DESC';
  }
  return $db->select($select, $table, $where, $criteria);
}


function Gauchadas($all = false) {
  $db = new Connection();
  $data = !$all ? gauchadasFilter() : $db->select('*', 'Gauchadas', '1=1', 'ORDER BY idGauchada DESC');
  if(!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $gauchadas[$data[$i]['idGauchada']] = array(
      'idGauchada' => $data[$i]['idGauchada'],
      'idUser' => $data[$i]['idUser'],
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

function GauchadasDebit($idUser) {
  $db = new Connection();
  $data = $db->select('*', 'Gauchadas g INNER JOIN Postulants p ON (g.idGauchada=p.idGauchada)', 'g.idUser='.$idUser.' AND p.selected=1 AND g.validate IS NULL');
  if(!$data) return false;
  return true;
}

?>
