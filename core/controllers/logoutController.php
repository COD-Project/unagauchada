<?php

# Secutiry
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class logoutController extends Controller {
  public function __construct() {
    parent::__construct();
    if(DB_SESSION) {
      (new Sessions)->check_life(true);
    } else {
      unset($_SESSION[SESS_APP_ID]);
      session_write_close();
      session_unset();
    }
    Func::redirect();
  }

}

?>
