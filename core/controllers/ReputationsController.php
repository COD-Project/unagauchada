<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class ReputationsController extends Controller {

  public function __construct() {
    parent::__construct(true);
    if($this->sessions->isGranted()) {

      if (($_POST && in_array($this->router->getMethod(), ['add', 'edit'])) || ($this->router->getId() && in_array($this->router->getMethod(), ['delete']))) {
          call_user_func([
            $this->models["reputations"],
            $this->router
                 ->getMethod()
          ]);
      }
    }
  }

  protected function init() {
    $this->setModels([
      "reputations"
    ]);
  }

}

?>
