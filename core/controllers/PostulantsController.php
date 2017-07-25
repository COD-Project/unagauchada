<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class PostulantsController extends Controller {
  public function __construct() {
    parent::__construct(true);
    if (!array_key_exists($this->router->getId(), $this->gauchadas)) {
      Func::redirect();
    } else if (in_array($this->router->getMethod(), ['add', 'edit', 'delete'])) {
        $method = $this->router->getMethod();
        eval("(new Postulants())->$method();");
    }
  }

  protected function init() {
    $this->setModels([
      "users",
      "postulants",
      "gauchadas"
    ]);

    $this->user = $this->models["users"]
                       ->get()[
                           $this->router
                                ->getId()
                         ];

    $this->postulants = $this->models["postulants"]
                             ->get([
                                 "gauchada" => $this->router->getId(),
                                 "user" => $this->sessions->connectedUser()['idUser']
                               ]);

    $this->gauchadas = $this->models["gauchadas"]
                            ->get();
  }

}

?>
