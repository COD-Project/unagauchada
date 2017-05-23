<?php

  function Comments($id) {
    $db = new Connection();
    $data = $db->select('*', 'Comments', 'idGauchada='.$id);
    return $data ? $data : false;
  }
?>
