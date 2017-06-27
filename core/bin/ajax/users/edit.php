<?php

if (empty($_POST['pass']) && empty($_POST['name']) && empty($_POST['surname']) && empty($_POST['phone']))
  echo "Todos están vacios";
else
echo json_encode($_POST);
  // (new Users())->edit();
?>
