<?php

function News()
{
    $db = new Connection();
    $data = $db->select('g.idGauchada, g.idUser, g.title, g.body', 'Gauchadas g INNER JOIN Postulants p ON (g.idGauchada=p.idGauchada)', 'g.validate=1 AND p.idUser=' . (Sessions::getInstance())->connectedUser()['idUser']);
    if(!$data) return false;

    for($i = 0; $i < count($data); $i++) {
      $news[$data[$i]['idGauchada']] = array(
        'idGauchada' => $data[$i]['idGauchada'],
        'idUser' => $data[$i]['idUser'],
        'title' => $data[$i]['title'],
        'body' => $data[$i]['body'],
        'user' => Users()[$data[$i]['idUser']],
      );
    }
    return $news;
}

?>
