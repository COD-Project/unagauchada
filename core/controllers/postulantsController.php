<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class postulantsController extends Controller {
  public function __construct() {
    parent::__construct(true);
    $postulants = new Postulants();
    switch ($this->router->getMethod()) {
      case 'add':
      if (array_key_exists($this->router->getId(), Gauchadas())) {
        $postulants->add();
      } else {
        Func::redirect();
      }
      case 'edit':
      if (array_key_exists($this->router->elements()[0], Gauchadas())) {
        $postulants->edit();
      } else {
        Func::redirect();
      }
    }
  }
}

?>
