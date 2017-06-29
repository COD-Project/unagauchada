<?php

function Categories($id = null) {
  $db = new Connection();
  $where = $id==null ? '1=1' : "idCategory=$id";
  $data = $db->select('*', 'Categories', $where);
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
