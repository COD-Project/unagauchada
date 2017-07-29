<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class AdministrationController extends Controller {

  public function __construct() {
    parent::__construct(true);
    if ($this->sessions->isGranted()) {
      if ($this->component && !in_array($this->component, ['categories', 'analytics'])) {
        Func::redirect(URL . 'administration');
      }
      $this->render('administration/admin');
    } else {
      Func::redirect();
    }
  }

  protected function init() {
      $this->setModels([
        'users',
        'gauchadas'
      ]);

      $this->admin = $this->sessions->connectedUser();

      $this->component = $this->router->getMethod();

      $this->users = array_filter($this->models['users']->get(), function($user) {
        return $user['role'] != 'admin';
      });

      $this->gauchadas = $this->models['gauchadas']->get([
        'all'
      ]);
  }
}

?>
