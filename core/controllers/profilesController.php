<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class profilesController extends Controller {
  public function __construct() {
    parent::__construct(true);
    $this->model = new Gauchadas;
    $this->gauchadas = $this->model->get(array(
      'user' => $this->sessions->connectedUser()['idUser']
    ));
    if ($this->sessions->isLoggedIn() && !Func::emp($this->router->getMethod()) && OPTIONS['profiles'][$this->router->getMethod()]) {
      if($this->router->getId() == '1' || $this->router->getId() == $this->sessions->connectedUser()['idUser']) {
        Func::redirect();
      }
      $this->render('profiles/' . OPTIONS['profiles'][$this->router->getMethod()]['path']);
    } else {
      Func::redirect();
    }
  }
}

?>
