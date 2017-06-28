<?php

function Ratings($idGauchada){
  $db = new Connection();
  $where = 'idGauchada='.$idGauchada;
  $data = $db->select('*', 'Ratings', $where);

  return (!$data) ? true : false;
}

?>