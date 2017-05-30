<?php
  define('INDEX_DIR', true);
  require('core/core.php');
  
  if($_POST && isset($_GET['for']) && isset($_GET['mode'])) {
    if (array_key_exists($_GET['for'], AJAX)) {
      if (in_array($_GET['mode'], AJAX[$_GET['for']])) {
        require('core/bin/ajax/' . $_GET['mode'] . '.php');
      } else {
        echo "El modo seleccionado no corresponde a una operación válida.";
      }
    } else {
      echo "La solicitud realizada no es válida";
    }  
  } else {
    Func::redirect();
  }
?>
