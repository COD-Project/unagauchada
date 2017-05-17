<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class homeController extends Controller {
  public function __construct() {
    parent::__construct();
    $this->render('index/index');
  }
}

?>
