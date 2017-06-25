<?php

if (empty($_POST['pass']) && empty($_POST['name']) && empty($_POST['surname']) && empty($_POST['birthdate']) && empty($_POST['phone']))
  echo "Todos los campos deben estar llenos";
else
  (new Users())->edit();
?>
