<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class creditosController extends Controller {
  public function __construct() {
    parent::__construct(true);
    $this->render('creditos/compra');
  }
}

?>
