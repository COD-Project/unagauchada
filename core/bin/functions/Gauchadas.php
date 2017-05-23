<?php

function Gauchadas() {
  $db = new Connection();
  $data = $db->select('*', 'Gauchadas', '1=1', 'LIMIT 5');
  return $data ? $data : false;
}

?>
