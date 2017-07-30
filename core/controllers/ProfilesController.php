<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class ProfilesController extends Controller {
  public function __construct() {
    parent::__construct(true);
    if ($this->sessions->isLoggedIn() && !Func::emp($this->router->getMethod()) && OPTIONS['profiles'][$this->router->getMethod()]) {
      if ($this->user['role'] == 'admin') {
        Func::redirect();
      } else if ($this->router->getId() && $this->router->getId() == $this->sessions->connectedUser()['idUser']) {
        Func::redirect(URL . 'profiles/myprofile');
      }
      $this->render('profiles/' . OPTIONS['profiles'][$this->router->getMethod()]['path']);
    } else {
      Func::redirect();
    }
  }

  protected function init() {
    $this->setModels([
      'gauchadas',
      'users',
      'postulants'
    ]);

    $this->user = !$this->router->getId() ?
                      $this->sessions->connectedUser() :
                      $this->models['users']
                           ->get()[
                              $this->router
                                   ->getId()
                            ];

    $where = !$this->router->getId() ?
                  ['user' => $this->user['idUser']] :
                  ['all' => true];

    $this->gauchadas = $this->models['gauchadas']
                            ->get($where);

    $this->postulants = $this->models['postulants']
                             ->get([
                                 "user" => $this->user['idUser']
                               ]);
  }

  protected function news() {
    $db = new Connection();
    $data = $db->select('g.idGauchada, g.idUser, g.title, g.body', 'Gauchadas g INNER JOIN Postulants p ON (g.idGauchada=p.idGauchada)', 'g.validate=1 AND p.idUser=' . (Sessions::getInstance())->connectedUser()['idUser']);
    if(!$data) return false;

    for($i = 0; $i < count($data); $i++) {
      $news[$data[$i]['idGauchada']] = [
        'idGauchada' => $data[$i]['idGauchada'],
        'idUser' => $data[$i]['idUser'],
        'title' => $data[$i]['title'],
        'body' => $data[$i]['body'],
        'user' => $this->models['users']
                       ->get()[
                         $data[$i]['idUser']
                       ],
      ];
    }
    return $news;
  }

  protected function access() {
    $selected_user = $this->models['postulants']->get([
      "user" => $this->router->getId(),
      "owner" => $this->sessions->connectedUser()['idUser'],
      "selected" => "1",
      "ranked" => "1"
    ]);
    $selected_owner = $this->models['postulants']->get([
      "user" => $this->sessions->connectedUser()['idUser'],
      "owner" => $this->router->getId(),
      "selected" => "1",
      "ranked" => "1"
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
