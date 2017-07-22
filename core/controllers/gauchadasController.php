<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class gauchadasController extends Controller {
  public function __construct() {
    parent::__construct(true);
    if($this->sessions->isLoggedIn()) {
      switch ($this->router->getMethod()) {
      case 'add':
        if(!$this->sessions->isGranted()) {
          $this->categories = (new Categories)->get();
          if ($_POST) {
            $this->models['gauchadas']->add();
          } else if(!$this->debit()){
            $this->render('gauchadas/add');
          } else {
            Func::redirect(URL.'?success=Usted tiene calificaciones pendientes.');
          }
        }
        break;
      case 'view':
        if (array_key_exists($this->router->getId(), $this->gauchadas)) {
          $this->gauchada = $this->gauchadas[$this->router->getId()];
          $this->render("gauchadas/view");
        } else {
          Func::redirect();
        }
        break;
      case 'delete':
        if (array_key_exists($this->router->getId(), $this->gauchadas)) {
          $this->models['gauchadas']->delete();
        } else {
          Func::redirect();
        }
        break;
      default:
        Func::redirect();
      }
    } else if ($this->router->getMethod() == 'view') {
      Func::redirect(URL . '?error=Debes estar logueado para ver una gauchada');
    }
  }

  protected function initialize() {
    $this->setModels(array(
      "gauchadas",
      "postulants",
      "users"
    ));
    $this->gauchadas = $this->models['gauchadas']->get(['all']);
    $this->postulantes = $this->models['postulants']->get(["gauchada" => $this->router->getId()]);
    $this->users = $this->models["users"]->get();
    $this->selected = $this->models["postulants"]->get([
      "gauchada" => $this->router->getId()
    ]);
  }

  private function debit() {
    $db = new Connection();
    $idUser = (Sessions::getInstance())->connectedUser()['idUser'];
    $from = 'Gauchadas g INNER JOIN Postulants p ON (g.idGauchada=p.idGauchada)';
    $subquery = '(SELECT idGauchada FROM Ratings)';
    $where = 'g.idUser='.$idUser.' AND p.selected=1 AND g.validate IS NULL AND g.idGauchada NOT IN '. $subquery;
    $data = $db->select('*', $from, $where);
    if(!$data) return false;
    return true;
  }
}

?>
