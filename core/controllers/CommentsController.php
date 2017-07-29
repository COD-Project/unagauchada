<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class CommentsController extends Controller {
  public function __construct() {
    parent::__construct(true);
    if($this->sessions->isLoggedIn()) {
      if ($_POST && in_array($this->router->getMethod(), ['add'])) {
          call_user_func([
            new Comments,
            $this->router
                 ->getMethod()
          ]);
      }
    }
  }
}

?>
