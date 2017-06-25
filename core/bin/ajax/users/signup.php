<?php

if (Func::all_full($_POST))
  echo "Todos los campos deben estar llenos";
else
  (new Users())->add();
?>
