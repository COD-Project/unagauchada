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
      if (array_key_exists($this->router->getId(), $this->gauchadas)) {
        $postulants->add();
      } else {
        Func::redirect();
      }
      break;
    case 'edit':
      if (array_key_exists($this->router->getId(), $this->gauchadas)) {
        $postulants->edit();
      } else {
        Func::redirect();
      }
      break;
    case 'delete':
      if (array_key_exists($this->router->getId(), $this->gauchadas)) {
        $postulants->delete();
      } else {
        Func::redirect();
      }
    }
  }

  protected function initialize() {
    $this->setModels(array(
      "users",
      "postulants",
      "gauchadas"
    ));
    $this->user = $this->models["users"]->get()[$this->router->getId()];
    $this->postulants = $this->models["postulants"]->get([
      "gauchada" => $this->router->getId(),
      "user" => $this->sessions->connectedUser()['idUser']
    ]);
    $this->gauchadas = $this->models["gauchadas"]->get();
  }

}

?>
