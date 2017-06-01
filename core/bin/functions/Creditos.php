<?php

function Creditos() {
  $db = new Connection();
  $data = $db->select('*', 'Creditos', '1=1', 'ORDER BY idCredito DESC');
  return $data;
}

?>