<?php

function GauchadasDebit($idUser) {
  $db = new Connection();
  $from = 'Gauchadas g INNER JOIN Postulants p ON (g.idGauchada=p.idGauchada)';
  $subquery = '(SELECT idGauchada FROM Ratings)';
  $where = 'g.idUser='.$idUser.' AND p.selected=1 AND g.validate IS NULL AND g.idGauchada NOT IN '. $subquery;
  $data = $db->select('*', $from, $where);
  if(!$data) return false;
  return true;
}

?>
