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

  protected function initialize() {
    $this->setModels(array(
      'gauchadas',
      'users',
      'postulants'
    ));
    $this->user = !$this->router->getId() ?
        $this->sessions->connectedUser() :
        $this->models['users']->get()[$this->router->getId()];
    $where = !$this->router->getId() ?
      array('user' => $this->user) :
      array('all' => true);
    $this->gauchadas = $this->models['gauchadas']->get($where);
    $this->postulants = $this->models['postulants']->get([
      "user" => $this->user['idUser']
    ]);
   }

  protected function news() {
    $db = new Connection();
    $data = $db->select('g.idGauchada, g.idUser, g.title, g.body', 'Gauchadas g INNER JOIN Postulants p ON (g.idGauchada=p.idGauchada)', 'g.validate=1 AND p.idUser=' . (Sessions::getInstance())->connectedUser()['idUser']);
    if(!$data) return false;

    for($i = 0; $i < count($data); $i++) {
      $news[$data[$i]['idGauchada']] = array(
        'idGauchada' => $data[$i]['idGauchada'],
        'idUser' => $data[$i]['idUser'],
        'title' => $data[$i]['title'],
        'body' => $data[$i]['body'],
        'user' => Users()[$data[$i]['idUser']],
      );
    }
    return $news;
  }

  protected function access() {
    $selected_user = $this->models['postulants']->get([
      "user" => $this->router->getId(),
      "owner" => $this->sessions->connectedUser()['idUser']
    ]);
    $selected_owner = $this->models['postulants']->get([
      "user" => $this->sessions->connectedUser()['idUser'],
      "owner" => $this->router->getId()
    ]);
    return $selected_user || $selected_owner;

  }

  protected function selected($idGauchada) {
    $this->selected = $this->models["postulants"]->get([
      "user" => $this->router->getId(),
      "gauchada" => $idGauchada,
      "selected" => "1"
    ]);
    return $this->selected;
  }
}

?>
