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

  protected function initialize() {
    $this->setModels(array(
      'gauchadas',
      'categories'
    ));
    $this->gauchadas = $this->models['gauchadas']->get();
  }
}

?>
