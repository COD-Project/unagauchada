<?php

function Categories() {
  $db = new Connection();
  $data = $db->select('*', 'Categories');
  if(!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $categories[$i] = array(
      'idCategory' => $data[$i]['idCategory'],
      'name' => $data[$i]['name']
    );
  }
  return $categories;
}

?>