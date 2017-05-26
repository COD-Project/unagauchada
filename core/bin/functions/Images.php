<?php

function Images() {
  $db = new Connection();
  $data = $db->select('*', 'Images');
  if(count($data) == 0) return false;

  for($i = 0; $i < count($data); $i++) {
    $images[$data[$i]['idImage']] = array(
      'idImage' => $data[$i]['idImage'],
      'path' => $data[$i]['path']
    );
  }
  return $images ? $images : false;
}

?>
