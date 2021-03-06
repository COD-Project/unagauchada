<?php

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------

class RatingsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->sessions->isLoggedIn()) {
            if ($_POST && in_array($this->router->getMethod(), ['add'])) {
                call_user_func([
                  $this->models["ratings"],
                  $this->router
                       ->getMethod()
                ]);
            }
        }
    }

    protected function init()
    {
        $this->setModels([
          "ratings"
        ]);
    }
}
