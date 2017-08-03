<?php

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->sessions->isGranted()) {
            Func::redirect(URL . 'administration');
        }
        $this->render('index/index');
    }

    protected function init()
    {
        $this->setModels([
          'gauchadas',
          'categories',
          'postulants'
        ]);

        $this->gauchadas = $this->models['gauchadas']
                                ->get();

        $this->categories = $this->models['categories']
                                 ->get();

    }

    protected function selected($idGauchada)
    {
        $this->selected = $this->models["postulants"]->get([
                            "gauchada" => $idGauchada,
                            "selected" => "1",
                            "validate" => "1"
                          ]);
        return $this->selected;
    }
}
