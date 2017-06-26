<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class postulantController extends Controller {
  public function __construct() {
    parent::__construct(true);
    $postulant = new Postulants();
    switch ($this->router->getMethod()) {
      case 'add':
      if (array_key_exists($this->router->getId(), Gauchadas())) {
        $postulant->add();
      } else {
        Func::redirect();
      }
      case 'edit':
      if (array_key_exists($this->router->elements()[0], Gauchadas())) {
        $postulant->edit();
      } else {
        Func::redirect();
      }
    }
  }
}

?>
