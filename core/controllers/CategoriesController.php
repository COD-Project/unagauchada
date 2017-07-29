<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class CategoriesController extends Controller {

  public function __construct() {
    parent::__construct(true);
    if($this->sessions->isLoggedIn()) {

      if (($_POST && in_array($this->router->getMethod(), ['add', 'edit'])) || ($_GET && $this->router->getId() != 1 && in_array($this->router->getMethod(), ['delete'])) {
          call_user_func([
            new Categories,
            $this->router
                 ->getMethod()
          ]);
      }
    }
  }

}

?>
