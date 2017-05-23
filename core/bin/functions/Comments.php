<?php

function Answer($idGauchada, $idQuestion) {
  $db = new Connection();
  $data = $db->select('*', 'Comments', '(idGauchada='.$idGauchada.' AND idQuestion IS NULL)');
  return $data ? $data[0] : false;
}

function Comments($idGauchada) {
  $db = new Connection();
  $data = $db->select('*', 'Comments', '(idGauchada='.$idGauchada.' AND idQuestion IS NULL)');
  for($i = 0; $i < count($data); $i++) {
    $comments[$i] = array(
      'idComment' => $data[$i]['idComment'],
      'body' => $data[$i]['body'],
      'createdAt' => $data[$i]['createdAt'],
      'lastModify' => $data[$i]['lastModify'],
      'idUser' => $data[$i]['idUser']
      //'answer' => Answer($idGauchada, $data[$i]['idComment'])
    );
  }
  return $data ? $data : false;
}

?>
