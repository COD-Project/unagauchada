<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class homeController extends Controller {
  public function __construct() {
    parent::__construct();
    $this->model = new Gauchadas();
    $this->gauchadas = $this->model->get();
    $this->render('index/index');
  }
}

?>
