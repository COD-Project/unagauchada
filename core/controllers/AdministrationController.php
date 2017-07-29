<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class AdministrationController extends Controller {

  public function __construct() {
    parent::__construct(true);
    if ($this->sessions->isGranted()) {
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

      $this->users = array_filter($this->models['users']->get(), function($user) {
        return $user['role'] != 'admin';
      });
  }
}

?>
