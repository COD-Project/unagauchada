<?php

function Users() {
  $db = new Connection();
  $sql = $db->query("SELECT * FROM Users ORDER BY role, registration_date;");
  if($db->rows($sql) > 0) {
    //make Users matrix to return
    $d = $db->fetch_array($sql);
    for($i = 0; $i < $db->rows($sql); $i++) {
      $users[$d[$i]['idUser']] = array(
        'idUser' => $d[$i]['idUser'],
        'name' => $d[$i]['name'],
        'surname' => $d[$i]['surname'],
        'email' => $d[$i]['email'],
        'state' => ($d[$i]['state'] == 1),
        'reg_date' => $d[$i]['registration_date'],
        'role' => ($d[$i]['role'] == 1) ? 'admin' : 'user'
        //put user's info here if there is more in the db
      );
    }
  } else {
    $users = false; //if can not generate the matrix, return false
  }
  return $users;
}

?>
