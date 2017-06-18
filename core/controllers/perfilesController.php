<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class perfilesController extends Controller {
  public function __construct() {
    parent::__construct(true);
    if ($this->sessions->isLoggedIn()) {
      $this->render('profile/profile');
    } else {
      Func::redirect();
    }
  }
}

?>
