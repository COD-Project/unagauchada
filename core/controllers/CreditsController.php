<?php

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------

class CreditsController extends Controller
{
    public function __construct()
    {
        parent::__construct(true);
        if ($this->router->getMethod() && in_array($this->router->getMethod(), ['add'])) {
            call_user_func([
              $this->models["credits"],
              $this->router
                   ->getMethod()
            ]);
        } else {
          $this->render('creditos/compra');
        }
    }

    protected function init()
    {
        $this->setModels([
          'credits'
        ]);

        $this->credits = $this->models['credits']
                              ->get();

        $this->current = $this->credits[0];
    }
}
