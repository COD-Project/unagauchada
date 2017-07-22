<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class categoriesController extends Controller {
  public function __construct() {
    parent::__construct(true);
    if($this->sessions->isLoggedIn()) {
      $categories = new Categories();
      if($this->sessions->isGranted()){
        switch ($this->router->getMethod()) {
        case 'add':
          if ($_POST) {
            $categories->add();
          }
          break;
        case 'edit':
          if ($_POST) {
            $categories->edit();
          }
          break;
        case 'delete':
          if($this->router->getId() != 1){
            $categories->delete();
          }
          break;
        case 'main':
          $this->categories = $categories->get();
          $this->render('categories/main');
          break;
        }
      }
    }
  }
}

?>
