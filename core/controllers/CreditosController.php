<?php

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------

class CreditosController extends Controller
{
    public function __construct()
    {
        parent::__construct(true);
        return $this->render('creditos/compra');
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
