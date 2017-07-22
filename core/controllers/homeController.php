<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class homeController extends Controller {
  public function __construct() {
    parent::__construct();
    $this->initialize();
    $this->render('index/index');
  }

  private function initialize() {
    $this->models = array(
      'gauchadas' => new Gauchadas,
      'categories' => new Categories
    );
    $this->gauchadas = $this->models['gauchadas']->get();
  }
}

?>
