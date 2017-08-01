<?php

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------

class AdministrationController extends Controller
{
    public function __construct()
    {
        parent::__construct(true);
        if ($this->sessions->isGranted()) {
            if ($this->component && !in_array($this->component, ['settings', 'analytics', 'gauchadas', 'users'])) {
                Func::redirect(URL . 'administration');
            }
            $this->render('administration/admin');
        } else {
            Func::redirect();
        }
    }

    protected function init()
    {
        $this->setModels([
          'users',
          'gauchadas',
          'categories',
          'postulants',
          'purchases',
          'reputations'
        ]);

        $this->admin = $this->sessions
                            ->connectedUser();

        $this->component = $this->router
                                ->getMethod();

        $options['ranking'] = $_GET['ranking'] ?? null;
        $options['criteria'] = $_GET['criteria'] ?? null;

        $this->users = array_filter($this->models['users']->get($options), function ($user) {
            return $user['role'] != 'admin';
        });

        $this->gauchadas = $this->models['gauchadas']
                                ->get([
                                  'all'
                                ]);

        $this->postulants = $this->models['postulants']
                                 ->get();

        $this->categories = $this->models['categories']
                                 ->get();

        $this->purchases = $this->models['purchases']
                                ->get();

        $this->reputations = $this->models['reputations']
                                  ->get();

        $id = $this->router->getId();

        $this->reputation = $this->router->getId() ? array_filter($this->reputations, function($reputation) use($id) {
          return $reputation['idReputation'] == $id;
        })[0] : null;

        echo json_encode($this->reputation);
    }

    protected function renderComponent()
    {
        $this->component = $this->component ?? 'analytics';
        $this->render(COMPONENTS[$this->component]["path"]);
    }
}
