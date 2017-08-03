<?php

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------

class GauchadasController extends Controller
{
    public function __construct()
    {
        parent::__construct(true);
        if ($this->sessions->isLoggedIn()) {
            switch ($this->router->getMethod()) {
              case 'add':
                if (!$this->sessions->isGranted()) {
                    if ($_POST) {
                        $this->models['gauchadas']->add();
                    } elseif (!$this->debit()) {
                        $this->render('gauchadas/add');
                    } else {
                        Func::redirect(URL.'?success=Usted tiene calificaciones pendientes.');
                    }
                }
                break;
              case 'edit':
                if (!$this->sessions->isGranted()) {
                    if (array_key_exists($this->router->getId(), $this->gauchadas)) {
                        if ($_POST) {
                            $this->models['gauchadas']->edit();
                        } else {
                            $this->render("gauchadas/edit");
                        }
                    } else {
                        Func::redirect();
                    }
                }
                break;
              case 'view':
                if (array_key_exists($this->router->getId(), $this->gauchadas)) {
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
        } elseif ($this->router->getMethod() == 'view') {
            Func::redirect(URL . '?error=Debes estar logueado para ver una gauchada');
        }
    }

    protected function init()
    {
        $this->setModels([
          "gauchadas",
          "postulants",
          "users",
          "categories"
        ]);

        $this->categories = (new Categories)->get();

        $this->gauchadas = $this->models['gauchadas']
                                ->get([
                                  'all' => true
                                ]);

        $this->gauchada = $this->router->getId() && array_key_exists($this->router->getId(), $this->gauchadas) ?
                          $this->gauchadas[$this->router->getId()] : null;

        $this->postulants = $this->models['postulants']
                                 ->get($this->gauchada ? [
                                   "gauchada" => $this->gauchada['idGauchada']
                                 ] : null);

        $this->users = $this->models["users"]
                            ->get();

        $this->user = $this->sessions->connectedUser();

        $this->selected = $this->gauchada ? $this->models["postulants"]
                                                 ->get([
                                                     "gauchada" => $this->gauchada['idGauchada'],
                                                     "selected" => "1"
                                                   ]) : null;

        $this->ranked = $this->gauchada ? $this->models["postulants"]
                                               ->get([
                                                   "gauchada" => $this->gauchada['idGauchada'],
                                                   "ranked" => true
                                                 ]) : null;

        $this->category = $this->models['categories']
                               ->get([
                                 "category" => $this->gauchada['idCategory']
                               ])[0];
    }

    private function debit()
    {
        $db = new Connection();
        $idUser = $this->sessions->connectedUser()['idUser'];
        $from = 'Gauchadas g INNER JOIN Postulants p ON (g.idGauchada=p.idGauchada)';
        $subquery = '(SELECT idGauchada FROM Ratings)';
        $where = 'g.idUser=' . $idUser . ' AND p.selected=1 AND g.validate IS NULL AND g.idGauchada NOT IN ' . $subquery;
        $data = $db->select('*', $from, $where);
        return !($data == false);
    }

    protected function is_postulated()
    {
        return $this->models['postulants']->get([
          "gauchada" => $this->router->getId(),
          "user" => $this->user['idUser']
        ]);
    }
}
