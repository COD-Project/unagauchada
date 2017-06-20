<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class perfilesController extends Controller {
  public function __construct() {
    parent::__construct(true);
    if ($this->sessions->isLoggedIn()) {
      if (!Func::emp($this->router->getMethod()) && OPTIONS['profiles'][$this->router->getMethod()]) {
        $this->render('profiles/' . OPTIONS['profiles'][$this->router->getMethod()]['path']);
      } else {
        Func::redirect();
      }
    } else {
      Func::redirect();
    }
  }
}

?>
