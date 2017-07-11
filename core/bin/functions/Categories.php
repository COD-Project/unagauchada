<?php

function Categories($id = null) {
  $db = new Connection();
  $where = $id==null ? '1=1 AND validate=0' : "idCategory=$id AND validate=0";
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

function CategoriesExist($name) {
  $db = new Connection();
  $where = 'name LIKE "'.$name.'"';
  $data = $db->select('*', 'Categories', $where);
  if(!$data) return false;

  for($i = 0; $i < count($data); $i++) {
    $categories[$i] = array(
      'idCategory' => $data[$i]['idCategory'],
      'name' => $data[$i]['name'],
      'validate' => $data[$i]['validate']
    );
  }
  return $categories;
}

?>
