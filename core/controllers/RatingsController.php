<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class RatingsController extends Controller {
  public function __construct() {
    parent::__construct();
    if($this->sessions->isLoggedIn()) {
      if ($_POST && in_array($this->router->getMethod(), ['add'])) {
          call_user_func([
            new Ratings,
            $this->router
                 ->getMethod()
          ]);
      }
    }
  }
}

?>
