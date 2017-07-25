<?php

# Secutiry
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class LogoutController extends Controller {
  public function __construct() {
    parent::__construct();
    if(DB_SESSION) {
      (new Sessions)->checkLife(true);
    } else {
      unset($_SESSION[SESS_APP_ID]);
      session_write_close();
      session_unset();
    }
    Func::redirect();
  }

}

?>
