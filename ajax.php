<?php
  if($_POST) {
    define('INDEX_DIR', true);
    require('core/core.php');

    switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
      case 'login':
        require('core/bin/ajax/goLogin.php');
      break;
      case 'signup':
        require('core/bin/ajax/goSignup.php');
      break;
      case 'lostpass':
        require('core/bin/ajax/goLostpass.php');
      break;
      default:
        Func::redirect();
      break;
    }
  } else {
    Func::redirect();
  }
?>
