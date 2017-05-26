<?php

function Users() {
  $db = new Connection();
  $sql = $db->query("SELECT * FROM Users ORDER BY role, registrationDate;");
  if($db->rows($sql) > 0) {
    //make Users matrix to return
    $d = $db->fetch_array($sql);
    for($i = 0; $i < $db->rows($sql); $i++) {
      $users[$d[$i]['idUser']] = array(
        'idUser' => $d[$i]['idUser'],
        'name' => $d[$i]['name'],
        'surname' => $d[$i]['surname'],
        'completeName' => $d[$i]['name'] . ' ' . $d[$i]['surname'],
        'birthdate' => $d[$i]['birthdate'],
        'location' => $d[$i]['location'],
        'phone' => $d[$i]['phone'],
        'email' => $d[$i]['email'],
        'state' => ($d[$i]['state'] == 1),
        'credits' => $d[$i]['credits'],
        'points' => $d[$i]['points'],
        'registrationDate' => $d[$i]['registrationDate'],
        'role' => ($d[$i]['role'] == 1) ? 'admin' : 'user',
        'profilePicture' => Images()[$d[$i]['idImage']]['path']
        //put user's info here if there is more in the db
      );
    }
  } else {
    $users = false; //if can not generate the matrix, return false
  }
  return $users;
}

?>
