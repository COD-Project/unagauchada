<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class HomeController extends Controller {
  public function __construct() {
    parent::__construct();
    $this->render('index/index');
  }

  protected function init() {
    $this->setModels(array(
      'gauchadas',
      'categories'
    ));
    
    $this->gauchadas = $this->models['gauchadas']
                            ->get();
    $this->categories = $this->models['categories']
                            ->get();
  }
}

?>
