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
        call_user_func([
          $this->models["postulants"],
          $this->router
               ->getMethod()
        ]);
    }
  }

  protected function init() {
     $this->setModels([
       "gauchadas",
       "postulants"
     ]);

     $this->gauchadas = $this->models["gauchadas"]
                             ->get();
  }

}

?>
