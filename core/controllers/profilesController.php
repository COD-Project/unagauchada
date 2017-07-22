<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class profilesController extends Controller {
  public function __construct() {
    parent::__construct(true);
    $this->initialize();
    if ($this->sessions->isLoggedIn() && !Func::emp($this->router->getMethod()) && OPTIONS['profiles'][$this->router->getMethod()]) {
      if($this->router->getId() == '1' || $this->router->getId() == $this->sessions->connectedUser()['idUser']) {
        Func::redirect();
      }
      $this->render('profiles/' . OPTIONS['profiles'][$this->router->getMethod()]['path']);
    } else {
      Func::redirect();
    }
  }

  private function initialize() {
    $this->models = array(
      'gauchadas' => new Gauchadas
    );
    $where = !$this->router->getId() ?
          array('user' => $this->sessions->connectedUser()['idUser']) :
          array('all' => true);
    $this->gauchadas = $this->models['gauchadas']->get($where);
  }
}

?>
