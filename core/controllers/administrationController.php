<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class administrationController extends Controller {

  public function __construct() {
    parent::__construct(true);
    if ($this->sessions->is_granted()) {
      $this->render('_admin/_admin');
    } else {
      Func::redirect();
    }
  }

}

?>
